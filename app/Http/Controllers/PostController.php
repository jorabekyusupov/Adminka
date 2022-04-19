<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreUpdateRequest;
use App\Services\Category\CategoryService;
use App\Services\File\FileService;
use App\Services\Language\LanguageService;
use App\Services\Post\PostService;
use App\Services\PostCategory\PostCategoryService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected CategoryService $categoryService;
    protected LanguageService $languageService;
    protected PostCategoryService $postCategoryService;
    protected FileService $fileService;

    public function __construct(
        PostService         $service,
        CategoryService     $categoryService,
        LanguageService     $languageService,
        PostCategoryService $postCategoryService,
        FileService         $fileService
    )
    {
        $this->service = $service;
        $this->categoryService = $categoryService;
        $this->languageService = $languageService;
        $this->postCategoryService = $postCategoryService;
        $this->fileService = $fileService;
    }

    public function index()
    {
        $rows = request()->input('rows') ?? 6;
        $category_id = request()->input('category_id') ?? null;
        $search = request()->input('search') ?? null;
        $language_code = request()->input('language_code') ?? auth()->user()->language_code;
        $posts = $this->service->getView(['categories', 'files']);

        if (isset($category_id) && $category_id != 0) {
            $posts = $posts->whereHas('categories', function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
            if ($category_id && isset($language_code)) {
                $posts = $posts->where('language_code', $language_code);
                if ( isset($search)) {
                    $posts = $posts->where('title', 'like', '%' . $search . '%')
                        ->orWhere('sub_title', 'like', '%' . $search . '%');
                }
            }
            if (isset($search)) {
                $posts = $posts->where('title', 'like', '%' . $search . '%')
                    ->orWhere('sub_title', 'like', '%' . $search . '%');
            }
        }
        if (isset($language_code)) {
            $posts = $posts->where('language_code', $language_code);
            if ( isset($search)) {
                $posts = $posts->where('title', 'like', '%' . $search . '%')
                    ->orWhere('sub_title', 'like', '%' . $search . '%');
            }
        }
        if (isset($search)) {
            $posts = $posts->where('title', 'like', '%' . $search . '%')
                ->orWhere('sub_title', 'like', '%' . $search . '%');
        }
        $posts = $posts->paginate($rows);

        $languages = $this->languageService->get()->get();
        $categories = $this->categoryService->getView()->where('language_code', auth()->user()->language_code)->get();
        return view('pages.admin.Post.index', compact(['posts', 'categories', 'languages']));
    }


    public function create()
    {
        $languages = $this->languageService->get()->get();
        $categories = $this->categoryService->getView()->where('language_code', auth()->user()->language_code)->get();
        return view('pages.admin.Post.create', compact(['categories', 'languages']));

    }


    public function store(PostStoreUpdateRequest $request)
    {
        $data = $request->validated();
        $object = $this->service->store($data);
        $param['post_id'] = $object->id;
        $this->fileService->storeFile($data, '/app/public/files/posts/', $object->id, 'posts');
        $this->service->storeTranslation($object->id, $data['translations']);
        if ($object) {
            foreach ($data['category_id'] as $category) {
                $param['category_id'] = $category;
                $this->postCategoryService->store($param);
            }
        }
        return redirect()->route('post.index');
    }

    public function show($id)
    {

    }


    public function edit(int $id)
    {

        $posts = $this->service->show($id, ['translations', 'categories']);
        $languages = $this->languageService->get()->get();
        $categories = $this->categoryService->getView()->where('language_code', auth()->user()->language_code)->get();
        return view('pages.admin.Post.update', compact(['posts', 'categories', 'languages']));
    }


    public function update(PostStoreUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->service->edit($id, $data);
        $this->service->editTranslation($id, $data['translations']);
        $files = $this->fileService->get()->where('object_id', $id)->where('object_type', 'posts')->get();
        if ($files) {
            if ($data['files']) {
                foreach ($files as $item) {
                    if (file_exists(storage_path('/app/public/files/posts/') . $item->full_size_path) && file_exists(storage_path('/app/public/files/posts/') . $item->thumbnail_path)) {
                        unlink(storage_path('/app/public/files/posts/') . $item->full_size_path);
                        unlink(storage_path('/app/public/files/posts/') . $item->thumbnail_path);
                        $this->fileService->delete($item->id);
                    }
                }
                $this->fileService->storeFile($data, '/app/public/files/posts/', $id, 'posts');
            }
        }
        $postCategories = $this->postCategoryService->get()->where('post_id', $id);
        foreach ($postCategories as $item) {
            $this->postCategoryService->edit($item->id, $data);
        }
        return redirect()->route('post.index');

    }


    public function destroy($id)
    {

        $this->service->getTranslation()->where('object_id', $id)->each(function ($item) {
            $this->service->delete($item->id);
        });
        $this->postCategoryService->get()->where('post_id', $id)->each(function ($item) {
            $this->postCategoryService->delete($item->id);
        });
        $this->service->delete($id);
        return redirect()->route('post.index');
    }

    public function destroyTranslations($id)
    {
        return $this->service->destroyTranslation($id);
    }
}

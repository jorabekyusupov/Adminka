<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCategory\PostCatStoreUpdateRequest;
use App\Services\Category\CategoryService;
use App\Services\File\FileService;
use App\Services\Language\LanguageService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected LanguageService $languageService;
    protected FileService $fileService;

    public function __construct(CategoryService $service, LanguageService $languageService, FileService $fileService)
    {
        $this->service = $service;
        $this->languageService = $languageService;
        $this->fileService = $fileService;
    }


    public function index()
    {
        $categories = $this->service->getView()->where('language_code', 'uz')->paginate(10);
        $languages = $this->languageService->get()->get();
        return view('pages.admin.PostCategory.index', compact(['categories', 'languages']));
    }


    public function create()
    {
        $languages = $this->languageService->get()->get();
        $categories = $this->service->getView()->where('language_code', 'uz')->get();
        return view('pages.admin.PostCategory.create', compact(['languages', 'categories']));
    }


    public function store(PostCatStoreUpdateRequest $request)
    {
        $data = $request->validated();
        $object = $this->service->store($data);
        $this->service->storeTranslation($object->id, $data['translations']);
        $this->fileService->storeFile($data, '/app/public/files/categories/', $object->id, 'category');
        return redirect()->route('post-categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category  = $this->service->show($id, ['translations']);
        $languages = $this->languageService->get()->get();
        $categories = $this->service->getView()->where('language_code', 'uz')->get();
        return view('pages.admin.PostCategory.update', compact(['languages', 'categories', 'category']));

    }


    public function update(PostCatStoreUpdateRequest $request, $id)
    {
        $data =  $request->validated();
        $file =$data['file'] ?? null;
        $this->service->edit($id,$data);
        $this->service->editTranslation($id, $data['translations']);
        $files = $this->fileService->get()->where('object_id', $id)->where('object_type', 'category')->get();
        if (count($files) > 0) {
            if ($file) {
                    if (file_exists(storage_path('/app/public/files/categories/') . $file->full_size_path) && file_exists(storage_path('/app/public/files/categories/') . $file->thumbnail_path)) {
                        unlink(storage_path('/app/public/files/categories/') . $file->full_size_path);
                        unlink(storage_path('/app/public/files/categories/') . $file->thumbnail_path);
                        $this->fileService->delete($file->id);
                    }

                $this->fileService->storeFile($data, '/app/public/files/categories/', $id, 'category');
            }
        }
        else{
            $this->fileService->storeFile($data, '/app/public/files/categories/', $id, 'category');
        }
        return redirect()->route('post-categories.index');
    }


    public function destroy($id)
    {
        //
    }

    public function destroyTranslations($id)
    {
        $this->service->destroyTranslation($id);
        return redirect()->route('post-categories.index');
    }
}

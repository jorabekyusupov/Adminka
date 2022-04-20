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
        $row_item = [10, 20, 50, 100];
        $language_code = request()->input('language_code') ?? auth()->user()->language_code;
//        dd($language_code);
        $rows = request()->input('rows') ?? 10;
        $search = request()->input('search') ?? null;
        $categories = $this->service->getView();
        if (isset($language_code)){
            if (isset($search)){
                $categories = $categories->where('title', 'like', '%'.$search.'%');
            }
            $categories = $categories->where('language_code', $language_code);
        }
        if (isset($search)){
            $categories = $categories->where('title', 'like', '%'.$search.'%');
        }
        $categories = $categories->paginate($rows);


        $languages = $this->languageService->get()->get();
        return view('pages.admin.PostCategory.index', compact(['categories', 'languages', 'row_item']));
    }


    public function create()
    {
        $languages = $this->languageService->get()->get();
        $categories = $this->service->getView()->where('language_code', auth()->user()->language_code)->get();
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
        $categories = $this->service->getView()->where('language_code', auth()->user()->language_code)->get();
        return view('pages.admin.PostCategory.update', compact(['languages', 'categories', 'category']));

    }


    public function update(PostCatStoreUpdateRequest $request, $id)
    {
        $data =  $request->validated();
        $file =$data['file'] ?? null;
        $this->service->edit($id,$data);
        $this->service->editTranslation($id, $data['translations']);
        $files = $this->fileService->get()->where('object_id', $id)->where('object_type', 'category')->first();
//        dd($files);
        if (isset($files)) {
            if ($file) {
                    if (file_exists(storage_path('/app/public/files/categories/') . $files->full_size_path) && file_exists(storage_path('/app/public/files/categories/') . $files->thumbnail_path)) {
                        unlink(storage_path('/app/public/files/categories/') . $files->full_size_path);
                        unlink(storage_path('/app/public/files/categories/') . $files->thumbnail_path);
                        $this->fileService->delete($files->id);
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
        $this->service->delete($id);
        $this->service->getTranslation()->where('object_id', $id)->each(function ($item) {
            $this->service->destroyTranslation($item->id);
        });
        return redirect()->route('post-categories.index');
    }


}

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
        $categories = $this->service->getView()->paginate(10    );
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
        dd($request->all());
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

    }


    public function update(Request $request, $id)
    {
        $data =  $request->validated();
        $this->service->edit($id,$data);
        $this->service->editTranslation($id, $data['translations']);
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

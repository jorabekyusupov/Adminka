<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreUpdateRequest;
use App\Services\Category\CategoryService;
use App\Services\Language\LanguageService;
use App\Services\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected CategoryService $categoryService;
    protected LanguageService $languageService;

    public function __construct(PostService $service, CategoryService $categoryService, LanguageService $languageService)
    {
        $this->service = $service;
        $this->categoryService = $categoryService;
        $this->languageService = $languageService;
    }

    public function index()
    {
        $posts = $this->service->getView()->get();
        return view('pages.admin.Post.index', compact('posts'));
    }


    public function create()
    {
        $languages = $this->languageService->get()->get();
        $categories = $this->categoryService->getView()->where('language_code', 'eng')->get();
        return view('pages.admin.Post.create', compact(['categories', 'languages']));

    }


    public function store(PostStoreUpdateRequest $request)
    {
        return view('pages.admin.Post.create');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

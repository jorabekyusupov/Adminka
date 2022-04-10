<?php

namespace App\Http\Controllers;

use App\Http\Requests\Language\LangStoreRequest;
use App\Http\Requests\Language\LangUpdateRequest;
use App\Services\Language\LanguageService;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct(LanguageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $languages = $this->service->get()->get();
        return view('pages.Admin.Languages.index', compact('languages'));
    }


    public function create()
    {
        return view('pages.Admin.Languages.create');
    }


    public function store(LangStoreRequest $request)
    {
        $this->service->store($request->validated());
        return  redirect()->route('language.index');
    }


    public function edit($id)
    {
        $language = $this->service->show($id);
        return view('pages.Admin.Languages.update', compact('language'));
    }

    public function update(LangUpdateRequest $langUpdateRequest, $id)
    {
        $this->service->edit($id,$langUpdateRequest->validated());
        return  redirect()->route('language.index');

    }


    public function destroy($id)
    {
        $this->service->delete($id);
        return  redirect()->route('language.index');

    }
}

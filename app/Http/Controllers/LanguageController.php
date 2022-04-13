<?php

namespace App\Http\Controllers;

use App\Http\Requests\Language\LangStoreRequest;
use App\Http\Requests\Language\LangStoreUpdateRequest;
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
        return view('pages.admin.settings.language.index', compact('languages'));
    }


    public function create()
    {
        return view('pages.admin.settings.language.create');
    }


    public function store(LangStoreUpdateRequest $request)
    {
        $this->service->store($request->validated());
        return  redirect()->route('language.index');
    }


    public function edit($id)
    {
        $language = $this->service->show($id);
        return view('pages.admin.settings.language.update', compact('language'));
    }

    public function update(LangStoreUpdateRequest $langUpdateRequest, $id)
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

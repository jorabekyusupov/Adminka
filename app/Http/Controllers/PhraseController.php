<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phrase\PhraseStoreRequest;
use App\Http\Requests\Phrase\PhraseUpdateRequest;
use App\Services\Language\LanguageService;
use App\Services\Page\PageService;
use App\Services\Phrase\PhraseService;
use Illuminate\Http\Request;

class PhraseController extends Controller
{

    protected PageService $pageService;
    private LanguageService $languageService;

    public function __construct(PhraseService $service, PageService $pageService, LanguageService $languageService)
    {
        $this->service = $service;
        $this->pageService = $pageService;
        $this->languageService = $languageService;
    }


    public function index()
    {
        $phrases = $this->service->get(['page'])->get();
        return view('pages.admin.translations.Phrase.index', compact('phrases'));
    }


    public function create()
    {
        $pages = $this->pageService->get()->get();
        $languages = $this->languageService->get()->get();
        return view('pages.admin.translations.phrase.create', compact(['pages', 'languages']));
    }


    public function store(Request $request)
    {
        dd($request->all());
        $this->service->store($request->validated());
        return  redirect()->route('phrase.index');
    }


    public function edit($id)
    {
        $phrases = $this->service->show($id);
        return view('pages.Admin.phrase.update', compact('phrases'));
    }


    public function update(PhraseUpdateRequest $request, $id)
    {
        $this->service->edit($id,$request->validated());
        return  redirect()->route('phrase.index');

    }


    public function destroy($id)
    {
        $this->service->delete($id);
        return  redirect()->route('phrase.index');

    }

}

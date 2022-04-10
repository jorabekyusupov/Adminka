<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhraseTranslation\PhraseTranslationStoreRequest;
use App\Http\Requests\PhraseTranslation\PhraseTranslationUpdateRequest;
use App\Services\Language\LanguageService;
use App\Services\Phrase\PhraseService;
use Illuminate\Http\Request;

class PhraseTranslationController extends Controller
{
    protected LanguageService $languageService;

    public function __construct(PhraseService $service, LanguageService $languageService)
    {
        $this->service = $service;
        $this->languageService = $languageService;
    }

    public function index()
    {
        $translations = $this->service->getTranslation()->get();
        return view('pages.Admin.PhraseTranslation.index', compact('translations'));
    }

    public function create()
    {
        $languages = $this->languageService->get()->get();
        $phrases = $this->service->get()->get();
        return view('pages.Admin.PhraseTranslation.create', compact(['languages', 'phrases']));
    }


    public function store(PhraseTranslationStoreRequest $request)
    {
        $this->service->storeTranslation($request->validated());
        return redirect()->route('phrase-translation.index');
    }



    public function edit($id)
    {
        $languages = $this->languageService->get()->get();
        $phrases = $this->service->get()->get();
        $translation = $this->service->showTranslation($id);
        return view('pages.Admin.PhraseTranslation.update', compact(['translation', 'languages', 'phrases']));
    }


    public function update(PhraseTranslationUpdateRequest $request, $id)
    {
        $this->service->editTranslation($id, $request->validated());
        return redirect()->route('phrase-translation.index');
    }


    public function destroy($id)
    {
        $this->service->deleteTranslation($id);
        return redirect()->route('phrase-translation.index');
    }
}

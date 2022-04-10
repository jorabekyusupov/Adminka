<?php

namespace App\Http\Controllers;

use App\Services\Language\LanguageService;
use App\Services\Page\PageService;
use App\Services\Phrase\PhraseService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected PageService $pageService;
    protected LanguageService $languageService;

    public function __construct(PageService $pageService, LanguageService $languageService)
    {
        $this->pageService = $pageService;
        $this->languageService = $languageService;
    }

    public function index()
    {
        $lang = \request('lang') ?? 'ru';
        $languages = $this->languageService->get()->get();
        $phrase = $this->pageService->get()->with('phrase.translations', function ($query) use ($lang) {
            $query->where('language_code', $lang);
        })->where('id', 1)->get();
        return view('welcome', compact(['phrase', 'lang', 'languages']));
    }
}

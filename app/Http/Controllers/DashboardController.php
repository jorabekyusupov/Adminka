<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use App\Services\Language\LanguageService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected LanguageService $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index()
    {

        return view('pages.admin.home.dashboard');
    }

    public function layouts()
    {
        $languages = $this->languageService->get()->get();
        return view('layouts.admin', compact('languages'));
    }
}

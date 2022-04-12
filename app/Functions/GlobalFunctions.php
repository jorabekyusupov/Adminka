<?php

use App\Models\Phrase;

function getPhrase($page, $phrase)
{

}

function showPhrase($page, $phrase)
{
    $lang = request()->input('language') ?? 'ru';
    $data = Phrase::where('word', $phrase)->with('translations', function ($query) use ($lang) {
        $query->where('language_code', $lang)->select('object_id', 'translation');
    })->with('page', function ($query) use ($page) {
        $query->where('name', $page)->select('id', 'name', 'page_link');
    })->get();

    $data = $data[0]->translations[0]->translation;
    return $data;
}

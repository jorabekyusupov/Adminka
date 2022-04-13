<?php

use App\Models\Phrase;
use App\Models\ViewPhrase;


function getPhrase($page, $phrase)
{

}

function showPhrase($page, $phrase)
{
    $lang = app()->getLocale() ?? 'ru';
    $data = ViewPhrase::where('word', $phrase)->where('language_code', $lang)->where('page', $page)->first();
    $data = $data->translation;
    return $data;
}

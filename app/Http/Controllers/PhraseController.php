<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\Phrase\PhraseStoreUpdateRequest;
use App\Http\Requests\Phrase\PhraseTranslationRequest;
use App\Http\Requests\Phrase\PhraseUpdateRequest;
use App\Services\Language\LanguageService;
use App\Services\Page\PageService;
use App\Services\Phrase\PhraseService;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class PhraseController extends Controller
{

    protected PageService $pageService;
    protected LanguageService $languageService;


    public function __construct(PhraseService $service, PageService $pageService, LanguageService $languageService)
    {
        $this->service = $service;
        $this->pageService = $pageService;
        $this->languageService = $languageService;
    }


    public function index(IndexRequest $request)
    {
        $rows = [10,25,50,100];
        $data = $request->validated();
        $filter = $data['filter'] ?? null;
        $search = $filter['search'] ?? null ;
        $row =  $filter['row'] ?? 10;
        $language_code = $filter['language_code'] ?? null;
        $page_id = $filter['page_id'] ?? null;

        $phrasesTranslations = $this->service->getView();
        if (isset($filter)){
                if ($search){
                    $phrasesTranslations =   $phrasesTranslations
                        ->where('word', 'like', '%'.$search.'%')
                        ->orWhere('page', 'like', '%'.$search.'%')
                        ->orWhere('translation', 'like', '%'.$search.'%')
                        ->orWhere('word', 'like', '%'.$search.'%');
                }
                if ($language_code){
                    $phrasesTranslations =   $phrasesTranslations->where('language_code', $language_code);
                }
                if ($page_id){
                    $phrasesTranslations =  $phrasesTranslations->where('page_id', $page_id);
                }
            $phrasesTranslations =  $phrasesTranslations->orderby('id', 'DESC')->paginate($row);
        } else {
            $phrasesTranslations=$phrasesTranslations->orderby('id', 'DESC')->paginate($row);
        }

//        dd($phrasesTranslations);
        $phrases = $this->service->get(['page'])->get();
        $pages = $this->pageService->get()->get();
        $languages = $this->languageService->get()->get();
        return view('pages.admin.translations.phrase.index', ['rows'=>$rows], compact(['phrases','phrasesTranslations', 'pages', 'languages']));
    }


    public function create()
    {
        $pages = $this->pageService->get()->get();
        $languages = $this->languageService->get()->get();
        return view('pages.admin.translations.phrase.create', compact(['pages', 'languages']));
    }


    public function store(PhraseStoreUpdateRequest $request)
    {
        $data = $request->validated();
        $object = $this->service->store($data);
        $this->service->storeTranslation($object->id, $data['translations']);
        return  redirect()->route('phrase.index');
    }


    public function edit($id)
    {
        $pages = $this->pageService->get()->get();
        $languages = $this->languageService->get()->get();
        $phrase = $this->service->show($id, ['translations', 'page']);
        return view('pages.admin.translations.phrase.update', compact(['phrase','languages', 'pages']));
    }


    public function update(PhraseStoreUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $object = $this->service->edit($id,$data);
        $this->service->editTranslation($object->id, $data['translations']);
        return  redirect()->route('phrase.index');

    }


    public function destroy($id)
    {
        $this->service->delete($id);
        return  redirect()->route('phrase.index');

    }
    public function destroyTranslation($id)
    {
        $this->service->destroyTranslation($id);
        return  redirect()->route('phrase.index');

    }

}

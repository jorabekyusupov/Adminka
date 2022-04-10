<?php

namespace App\Http\Controllers;

use App\Http\Requests\Page\PageStoreRequest;
use App\Http\Requests\Page\PageUpdateRequest;
use App\Services\Page\PageService;

class PageController extends Controller
{
    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $pages = $this->service->get()->get();
        return view('pages.Admin.Page.index', compact('pages'));
    }


    public function create()
    {
        return view('pages.Admin.Page.create');
    }


    public function store(PageStoreRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('page.index');
    }


    public function edit($id)
    {
        $page = $this->service->show($id);
        return view('pages.Admin.page.update', compact('page'));
    }


    public function update(PageUpdateRequest $request, $id)
    {
        $this->service->edit($id, $request->validated());
        return redirect()->route('page.index');

    }


    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('page.index');

    }
}

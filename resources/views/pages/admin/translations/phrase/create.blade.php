@extends('layouts.admin')
@section('content-header')
@endsection
@section('content-body')



                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vertical Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{route('phrase.store')}}" method="post">
                                @method('post')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="word" class="mb-2">Word</label>
                                                <input type="text" id="word" class="form-control" name="word" placeholder="Word">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="page_id" class="mb-2">Pages</label>
                                                @if(isset($pages))
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($pages as $page)
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <div class="vs-radio-con">
                                                                <input type="radio" name="page_id"  value="{{$page->id}}">
                                                                <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                                <span class="">{{$page->name}}</span>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @else
                                                    <span class="d-block">not found pages</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="word" class="mb-2">Translations</label>
                                            <div class="card-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">

                                                    @if(isset($languages))
                                                        @foreach($languages as $language)
                                                                 <li class="nav-item">
                                                                      <a class="nav-link " id="{{$language->code}}" data-toggle="tab" href="#{{$language->code}}-id" role="tab" aria-controls="{{$language->code}}" aria-selected="true">{{$language->name}}</a>
                                                                 </li>
                                                        @endforeach
                                                    @endif
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content pt-1">
                                                    @if(isset($languages))
                                                        @foreach($languages as $language)
                                                                <div class="tab-pane " id="{{$language->code}}-id" role="tabpanel" aria-labelledby="{{$language->code}}">
                                                                    <div class="col-12">
                                                                        <fieldset class="form-group">
                                                                            <input type="text" class="form-control mb-1 d-none"  name="language_code_{{$language->code}}"  value="{{$language->code}}">
                                                                            <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Translations" name="translation_{{$language->code}}"></textarea>
                                                                        </fieldset>
                                                                    </div>
                                                                   </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


@endsection

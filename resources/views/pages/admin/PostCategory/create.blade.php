@extends('layouts.admin')
@section('content-header')
@endsection
@section('content-body')
    <form class="form form-vertical" method="post" action="{{route('post-categories.store')}}" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Vertical Form</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            @if (isset($languages))
                                @foreach ($languages as $language)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $language->code === 'en' ? 'active' : '' }} "
                                           id="{{ $language->code }}" data-toggle="tab" href="#{{ $language->code }}-id"
                                           role="tab" aria-controls="{{ $language->code }}"
                                           aria-selected="true">{{ $language->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="tab-content pt-1">
                            @if (isset($languages))
                                @foreach ($languages as $key => $language)
                                    <div class="tab-pane {{ $language->code === 'en' ? 'active' : '' }}"
                                         id="{{ $language->code }}-id" role="tabpanel"
                                         aria-labelledby="{{ $language->code }}">
                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control mb-1 d-none"
                                                       name="translations[{{ $key }}][language_code]"
                                                       value="{{ $language->code }}">
                                                <input type="text" class="form-control mb-1"
                                                       name="translations[{{ $key }}][title]"
                                                       placeholder="Category Name ({{ $language->code }})">
                                            </fieldset>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card">

            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <fieldset class="form-group">
                            <label for="" class="label-control">Parent Category</label>
                            <select name="parent_id" id="" class="form-control">
                                <option value="" selected disabled>Categories</option>

                                @if(isset($categories))
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach

                                @endif

                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="basicInputFile">Image</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </fieldset>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

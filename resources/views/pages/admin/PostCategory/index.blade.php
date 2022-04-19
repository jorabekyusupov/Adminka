@extends('layouts.admin')
@section('content-header')

@endsection
@section('content-body')
    @php
        $language_code = request()->input('language_code');
         $rows = request()->input('rows') ;
        $search = request()->input('search') ?? null;
    @endphp
    <div class="card-content">
        <div class="card-body d-flex align-items-center justify-content-between">
            <a href="{{ route('post-categories.create') }}" class="btn btn-outline-primary">Create</a>
            <form action="{{route('post-categories.index')}}" method="get" class="d-flex align-items-center col-8 justify-content-end" >
                @method('GET')
                <fieldset class="form-group position-relative col-auto m-0 p-0 mr-1" >
                    <select onchange="this.form.submit()" name="rows" id="" class="form-control" style="background:#10163a;">
                            @foreach($row_item as $row)
                            <option value="{{$row}}" {{$rows && $rows === intval($row) ? 'selected' : ''}}>{{$row}}</option>
                            @endforeach
                    </select>
                </fieldset>
                <fieldset class="form-group position-relative col-2 m-0 p-0 mr-1" >
                    <select onchange="this.form.submit()" name="language_code" id="" class="form-control" style="background:#10163a;">
                        <option selected disabled>Languages</option>
                        @if(isset($languages))
                            @foreach($languages as $language)
                                <option value="{{$language->code}}" {{$language_code && $language_code===$language->code ? 'selected' : ''}}>{{$language->name}}</option>
                            @endforeach

                        @endif
                    </select>
                </fieldset>
                <fieldset class="form-group position-relative col-3 m-0 p-0 mr-1">
                    <input  onchange="this.form.submit()" style="background-color: #10163a;" type="text" value="{{$search ?? ''}}" class="form-control search-product" id="iconLeft5" name="search" placeholder="Search here">
                    <div class="form-control-position p-0">
                        <i class="feather icon-search"></i>
                    </div>
                </fieldset>

            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Language</th>
                    <th>Main</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($categories))
                    @foreach($categories as $key=>$category)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$category->title}}</td>
                            <td>{{$category->language_code}}</td>
                            <td>{{$category->parent_id ?? 'Main'}}</td>
                            <td>
                                <a class="badge bg-info" href="{{ route('post-categories.edit', ['post_category' => $category->id]) }}"><i class="feather icon-edit"></i></a>
                                <form action="{{ route('ct.translation.destroy', ['id' => $category->category_translation_id ?? 0]) }}" class="d-inline-block" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>

            </table>
            <div class="mt-1">
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection

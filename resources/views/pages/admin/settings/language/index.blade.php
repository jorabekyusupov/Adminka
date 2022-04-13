
@extends('layouts.admin')
@section('content-header')
@endsection
@section('content-body')


            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <a href="{{route('language.create')}}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($languages as $key=>$language)

                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$language->name}}</td>
                                <td>{{$language->code}}</td>
                                <td>
                                    <a class="badge bg-info" href="{{ route('language.edit', ['language' => $language->id]) }}">Edit</a>
                                    <form action="{{ route('language.destroy', ['language' => $language->id]) }}" class="d-inline-block" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endsection

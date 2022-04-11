@extends('layouts.admin')
@section('content-header')
    <nav aria-label="row breadcrumbs-top">
        <ol class="breadcrumb breadcrumb-dots">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Phrase</li>

        </ol>
    </nav>
@endsection
@section('content-body')
    <section id="nav-filled">
        <div class="row">
            <div class="col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-header">


                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">Phrase</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false">Translations</a>
                                </li>

                            </ul>


                            <div class="tab-content pt-1">
                                <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
                                    <div class="card-body p-1">
                                        <a class="btn btn-primary" href="{{route('phrase.create')}}">Create</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr >
                                                <th>№</th>
                                                <th>Word</th>
                                                <th>Page</th>
                                                <th>Action</th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @if(isset($phrases))
                                                @foreach($phrases as $key=>$phrase)
                                                    <tr >
                                                        <th scope="row" >{{++$key}}</th>
                                                        <td>{{$phrase->word}}</td>
                                                        <td>{{$phrase->page->name}}</td>
                                                        <td >
                                                            <a class="badge bg-info"
                                                               href="{{route('phrase.edit', ['phrase' => $phrase->id])}}">Edit</a>
                                                            <form action="{{ route('phrase.destroy', ['phrase'=>$phrase->id]) }}"
                                                                  class="d-inline-block" method="post">
                                                                @method("delete")
                                                                @csrf
                                                                <button type="submit" class="badge bg-danger border-0">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
                                    <div class="card-body p-1">
                                        <button class="btn btn-primary">Create</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr >
                                                <th>№</th>
                                                <th>Word</th>
                                                <th>Page</th>
                                                <th>Language</th>
                                                <th>translation</th>
                                                <th>Action</th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @if(isset($phrasesTranslations))
                                                @foreach($phrasesTranslations as $key=>$phrase)
                                                    <tr >
                                                        <th scope="row" >{{++$key}}</th>
                                                        <td>{{$phrase->word}}</td>
                                                        <td>{{$phrase->page}}</td>
                                                        <td>{{$phrase->language_code}}</td>
                                                        <td>{{$phrase->translation}}</td>
                                                        <td >
                                                            <a class="badge bg-info"
                                                               href="{{route('phrase.edit', ['phrase' => $phrase->id])}}">Edit</a>
                                                            <form action="{{ route('translation.destroy', ['id'=> $phrase->phrase_translation_id?? 0 ]) }}"
                                                                  class="d-inline-block" method="post">
                                                                @method("delete")
                                                                @csrf
                                                                <button type="submit" class="badge bg-danger border-0">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


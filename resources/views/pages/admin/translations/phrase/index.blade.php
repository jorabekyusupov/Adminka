@extends('layouts.admin')
@section('content-header')
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
         <a class="nav-link {{request()->input('filter') || request()->input('page') ? '' : 'active'}}" id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">Phrase</a>
        </li>
        <li class="nav-item">
         <a class="nav-link {{request()->input('filter') || request()->input('page') ? 'active' : ''}}" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false">Translations</a>
        </li>

       </ul>


       <div class="tab-content pt-1">
        <div class="tab-pane {{request()->input('filter') || request()->input('page') ? '' : 'active'}}" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
         <div class="card-body p-1">
          <a class="btn btn-primary" href="{{ route('phrase.create') }}">Create</a>
         </div>
         <div class="table-responsive">
          <table class="table table-hover mb-0">
           <thead>
            <tr>
             <th>№</th>
             <th>Word</th>
             <th>Page</th>
             <th>Action</th>
            </tr>

           </thead>
           <tbody>
            @if (isset($phrases))
             @foreach ($phrases as $key => $phrase)
              <tr>
               <th scope="row">{{ ++$key }}</th>
               <td>{{ $phrase->word }}</td>
               <td>{{ $phrase->page->name }}</td>
               <td>
                <a class="badge bg-info" href="{{ route('phrase.edit', ['phrase' => $phrase->id]) }}">Edit</a>
                <form action="{{ route('phrase.destroy', ['phrase' => $phrase->id]) }}" class="d-inline-block" method="post">
                 @method("delete")
                 @csrf
                 <button type="submit" class="badge bg-danger border-0">
                  Delete
                 </button>
                </form>
               </td>
              </tr>
             @endforeach
            @endif
           </tbody>
          </table>
         </div>
        </div>
        <div class="tab-pane {{request()->input('filter') || request()->input('page') ? 'active' : ''}}" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
         <div class="card-body p-1">
          <div class="col-12 p-0">
           <form action="{{ route('phrase.index') }}" method="get" class="d-flex align-items-center justify-content-between">


               <input type="text" class="d-none" name="active" value="a">
            <div class="form-group d-flex align-items-center col-9 m-0 p-0">
             <div class="form-group col-2 m-0">
              <select onchange="this.form.submit()" name="filter[row]" id="" class="form-control">
               <option selected disabled class="d-none">10</option>

                  @foreach($rows as $item)
                       <option value="{{$item}}" {{request()->input('filter.row') && intval(request()->input('filter.row')) === $item ? 'selected' : ''}}>{{$item}}</option>
                  @endforeach
              </select>
             </div>
             <div class="form-group col-2 m-0">
              <select onchange="this.form.submit()" name="filter[page_id]" id="" class="form-control">
               @if (isset($pages))
                <option selected disabled>Page</option>
                @foreach ($pages as $page)
                 <option value="{{ $page->id }}" {{request()->input('filter.page_id') && intval(request()->input('filter.page_id')) === $page->id ? 'selected' : ''}}>{{ $page->name }}</option>
                @endforeach
               @else
                <option selected disabled>Not Found</option>
               @endif
              </select>
             </div>
             <div class="form-group col-2 m-0">
              <select onchange="this.form.submit()"  name="filter[language_code]" id="" class="form-control">
               @if (isset($languages))
                <option selected disabled>Languages</option>

                @foreach ($languages as $language)
                 <option value="{{ $language->code }}"  {{ request()->input('filter.language_code') && request()->input('filter.language_code') === $language->code ? 'selected' : ''}} >{{ $language->name }}</option>
                @endforeach
               @else
                <option selected disabled>not found lang</option>
               @endif
              </select>
             </div>
            </div>
            <div class="form-group col-3 m-0">
             <div  class=" position-relative input-divider-right">
              <input onchange="this.form.submit()" type="text" class="form-control" name="filter[search]" id="iconLeft4" placeholder="Search" value="{{request()->input('filter.search') ?? '' }}">
              <div class="form-control-position">
               <i class="feather icon-search"></i>
              </div>
             </div>
            </div>
           </form>
          </div>

         </div>
         <div class="table-responsive">
          <table class="table table-hover mb-0">
           <thead>
            <tr>
             <th>№</th>
             <th>Word</th>
             <th>Page</th>
             <th>Language</th>
             <th>translation</th>
             <th>Action</th>
            </tr>

           </thead>
           <tbody>
            @if (isset($phrasesTranslations))
             @foreach ($phrasesTranslations as $key => $phrase)
              <tr>
               <th scope="row">{{ ++$key }}</th>
               <td>{{ $phrase->word }}</td>
               <td>{{ $phrase->page }}</td>
               <td>{{ $phrase->language_code }}</td>
               <td>{{ $phrase->translation }}</td>
               <td>
                <a class="badge bg-info" href="{{ route('phrase.edit', ['phrase' => $phrase->id]) }}">Edit</a>
                <form action="{{ route('translation.destroy', ['id' => $phrase->phrase_translation_id ?? 0]) }}" class="d-inline-block" method="post">
                 @method("delete")
                 @csrf
                 <button type="submit" class="badge bg-danger border-0">
                  Delete
                 </button>
                </form>
               </td>
              </tr>
             @endforeach
            @endif
           </tbody>

          </table>
          <div class="mt-2">
              {{$phrasesTranslations->links()}}
           {{--<nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-2">
             <li class="page-item prev-item"><a class="page-link" href="#"></a>
             </li>
             <li class="page-item"><a class="page-link" href="#">1</a></li>
             <li class="page-item"><a class="page-link" href="#">2</a></li>
             <li class="page-item"><a class="page-link" href="#">3</a></li>
             <li class="page-item active" aria-current="page"><a class="page-link" href="#">4</a></li>
             <li class="page-item"><a class="page-link" href="#">5</a></li>
             <li class="page-item"><a class="page-link" href="#">6</a></li>
             <li class="page-item"><a class="page-link" href="#">7</a></li>
             <li class="page-item next-item"><a class="page-link" href="#"></a>
             </li>
            </ul>
           </nav>--}}
          </div>
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

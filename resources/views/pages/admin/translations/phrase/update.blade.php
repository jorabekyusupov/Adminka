@extends('layouts.admin')
@section('content-header')
@endsection
@section('content-body')



 <div class="card">
  <div class="card-header">
   <h4 class="card-title">Create</h4>
  </div>
  <div class="card-content">
   <div class="card-body">
    <form class="form form-vertical" action="{{ route('phrase.update', ['phrase' => $phrase->id]) }}" method="post">
     @method('put')
     @csrf
     <div class="form-body">
      <div class="row">
       <div class="col-12">
        <div class="form-group">
         <label for="word" class="mb-2">Word</label>
         <input type="text" id="word" class="form-control  @error('word') is-invalid @enderror" name="word" placeholder="Word" value="{{ $phrase->word }}">
         @error('word')
          <div class="invalid-feedback ">{{ $message }}</div>
         @enderror
        </div>
       </div>
       <div class="col-12">
        <div class="form-group">
         <label for="page_id" class="mb-2">Pages</label>
         @if (isset($pages))
          <ul class="list-unstyled mb-0">
           @foreach ($pages as $page)
            <li class="d-inline-block mr-2">
             <fieldset>
              <div class="vs-radio-con">
               <input type="radio" name="page_id" {{ $phrase->page->id === $page->id ? 'checked' : '' }} value="{{ $page->id }}">
               <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
               </span>
               <span class="">{{ $page->name }}</span>
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

          @if (isset($languages))
           @foreach ($languages as $language)
            <li class="nav-item">
             <a class="nav-link {{ $language->code === 'en' ? 'active' : '' }} " id="{{ $language->code }}" data-toggle="tab" href="#{{ $language->code }}-id" role="tab" aria-controls="{{ $language->code }}" aria-selected="true">{{ $language->name }}</a>
            </li>
           @endforeach
          @endif
         </ul>
         @php
          $translations = $phrase->translations;
          $n = 0;
          $code = $translations->pluck('language_code');

          $data = $languages->whereNotIn('code', $code);

         @endphp
         <!-- Tab panes -->
         <div class="tab-content pt-1">
          @if (isset($languages))
           @foreach ($languages as $key => $language)
            <div class="tab-pane {{ $language->code === 'en' ? 'active' : '' }}" id="{{ $language->code }}-id" role="tabpanel" aria-labelledby="{{ $language->code }}">
             <div class="col-12">
              @foreach ($translations as $key => $translation)
               @if ($translation->language_code === $language->code)
                <fieldset class="form-group">
                 <input type="text" class="form-control mb-1 d-none" {{ $translation->id ?? 'disabled' }} name="translations[{{ $key }}][id]" value="{{ $translation->id }}">
                 <input type="text" class="form-control mb-1 d-none" name="translations[{{ $key }}][language_code]" value="{{ $translation->language_code }}">
                 <textarea class="form-control" id="basicTextarea" rows="5" placeholder="Translations" name="translations[{{ $key }}][translation]">{{ $translation->translation }}</textarea>
                </fieldset>
               @endif
              @endforeach
              @foreach ($data as $item)
               @if ($item->code === $language->code)
                @php
                 $random = random_int(100, 1000);
                @endphp

                <fieldset class="form-group">
                 <input type="text" class="form-control mb-1 d-none" name="translations[{{ $random }}][language_code]" value="{{ $language->code }}">
                 <textarea class="form-control" id="basicTextarea" rows="5" placeholder="Translations" name="translations[{{ $random }}][translation]"></textarea>
                </fieldset>
               @endif
              @endforeach
             </div>
            </div>
           @endforeach
          @endif
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

@extends('layouts.admin')

@section('content-body')
 @php
 $req = request()->input('category_id');
 @endphp
 <div class="d-flex">
  <div class="col-3 d-flex align-items-center">
   <div class=" ">
    <h3>Filter</h3>
   </div>
  </div>
  <div class="col-9 d-flex justify-content-between align-items-center">
   <div class="card-body ">
    <h5 class="m-0">Total: {{ count($posts) }}</h5>
   </div>
   <div class="card-body d-flex justify-content-end"><a class="btn btn-primary" href="{{ route('post.create') }}">Create</a></div>

  </div>
 </div>

 <div class="d-flex justify-content-between align-items-center">
  <div class="card col-3 full-height-vh mr-1">
   <div class="card-header">
    <h3>Categories</h3>
   </div>
   <div class="card-body">
    <form action="{{ route('post.index') }}" method="get">
     @method('get')
     <div class="form-group">

      <ul class="list-unstyled mb-0 d-flex flex-column justify-content-between">
       <li class="d-inline-block mr-2">
        <fieldset>
         <div class="vs-radio-con">
          <input onchange="this.form.submit()" {{ !request()->input('category_id') ? 'checked' : '' }} type="radio" name="category_id" value="">
          <span class="vs-radio">
           <span class="vs-radio--border"></span>
           <span class="vs-radio--circle"></span>
          </span>
          <span class="">All</span>
         </div>
        </fieldset>
       </li>
       @if (isset($categories))
        @foreach ($categories as $category)
         <li class="d-inline-block mr-2">
          <fieldset>
           <div class="vs-radio-con">
            <input onchange="this.form.submit()" type="radio" name="category_id" {{ request()->input('category_id') && intval(request()->input('category_id')) === $category->id? 'checked': '' }} value="{{ $category->id }}">
            <span class="vs-radio">
             <span class="vs-radio--border"></span>
             <span class="vs-radio--circle"></span>
            </span>
            <span class="">{{ $category->title }}</span>
           </div>
          </fieldset>
         </li>
        @endforeach
       @endif
      </ul>
     </div>
     <div class="form-group">
         <h3 >Language</h3>
      <ul class="list-unstyled mb-0 d-flex flex-column justify-content-between">

       @if (isset($languages))
        @foreach ($languages as $language)
         <li class="d-inline-block mr-2">
          <fieldset>
           <div class="vs-radio-con">
            <input onchange="this.form.submit()" type="radio" name="language_code" {{ request()->input('language_code') && request()->input('language_code')     === $language->code ? 'checked': '' }} value="{{ $language->code }}">
            <span class="vs-radio">
             <span class="vs-radio--border"></span>
             <span class="vs-radio--circle"></span>
            </span>
            <span class="">{{ $language->name }}</span>
           </div>
          </fieldset>
         </li>
        @endforeach
       @endif
      </ul>
     </div>

    </form>
   </div>
  </div>
  <div class=" col-9 full-height-vh" style="overflow-y: scroll">
   <form action="{{ route('post.index') }}" method="get">
    @method('get')
    <fieldset class="form-group position-relative">
     <input style="background-color: #10163a;" type="text" class="form-control search-product" id="iconLeft5" name="search" placeholder="Search here">
     <div class="form-control-position">
      <i class="feather icon-search"></i>
     </div>
    </fieldset>
   </form>

   <div class="row match-height">
    @if (isset($posts))
     @foreach ($posts as $post)
      <div class="col-xl-4 col-md-6 col-sm-12">
       <div class="card">
        <div class="card-content">
         <img class="card-img-top img-fluid" src="../../../app-assets/images/pages/content-img-1.jpg" alt="Card image cap">
         <div class="card-body">
          <h5>{{ $post->title }}</h5>
          <p class="card-text  mb-0">{{ $post->sub_title }}</p>
          <span class="card-text">{{ $post->category_title }}</span>
          <div class="card-btns d-flex justify-content-between mt-1">
           <span class="card-text col-5 p-0">{{ $post->created_date }}</span>
           <div class="card-btns d-flex justify-content-between col-3">
            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class=" "><i class="feather icon-edit light"></i></a>
            <form action="{{ route('post.destroy', ['post' => $post->id]) }}" class="d-inline-block" method="post">
             @method("delete")
             @csrf
             <button type="submit" class="bg-transparent p-0 m-0 border-0">
              <i class="feather icon-trash-2 light"></i>
             </button>
            </form>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     @endforeach
    @endif
   </div>
   @if (isset($posts))
    {{ $posts->links() }}
   @endif
  </div>
 </div>

@endsection

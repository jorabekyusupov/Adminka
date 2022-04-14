@extends('layouts.admin')
@section('content-body')
 <form class="form form-vertical d-flex justify-content-between position-relative">
  <ul class="nav nav-tabs position-absolute bg-transparent post-tabs" role="tablist">
   @foreach ($languages as $language)
    <li class="nav-item  ">
     <a class="nav-link bg-transparent" id="{{ $language->code }}-tab" data-toggle="tab" href="#{{ $language->code }}" aria-controls="{{ $language->code }}" role="tab" aria-selected="true">{{ $language->name }}</a>
    </li>
   @endforeach
  </ul>
  <div class="col-3 position-absolute top-0 right-0 d-flex align-items-center justify-content-end" style="right: 0;">
   <button type="submit" class="btn btn-primary mr-1 ">Submit</button>
   <button type="reset" class="btn btn-outline-warning mr-1 ">Reset</button>
  </div>
  <div class="tab-content col-8 mr-1 mb-0 full-height-vh mt-5">
   @foreach ($languages as $language)
    <div class="tab-pane full-height-vh bg-transparent active" id="{{ $language->code }}" aria-labelledby="{{ $language->code }}-tab" role="tabpanel">

     <div class="card full-height-vh ">
      <div class="card-header">
       <h4 class="card-title">Vertical Form</h4>
      </div>
      <div class="card-content">
       <div class="card-body">
        <div class="form-body">
         <div class="row">
          <div class="col-12">
           <div class="form-group">
            <label for="title-vertical">Title</label>
            <input type="text" id="title-vertical" class="form-control mt-1" name="title" placeholder="Title">
           </div>
          </div>
          <div class="col-12">
           <div class="form-group">
            <label for="sub_title-vertical">Sub title</label>
            <input type="text" id="sub_title-vertical" class="form-control mt-1" name="sub_title" placeholder="Sub title">
           </div>
          </div>
          <div class="col-12 ">
           <label for="">Description</label>
           <div id="full-wrapper" class="mt-1 mb-2">
            <div id="full-container">
             <div class="editor height-300  {{ $language->code }}">

             </div>
            </div>
           </div>
          </div>


         </div>
        </div>
       </div>
      </div>
     </div>
    </div>

   @endforeach
  </div>
  <div class="card col-4 mr-1 mb-0 full-height-vh mt-5">
   <div class="card-content">
    <div class="card-body">
     <div class="form-body">
      <div class="row">
       <div class="col-12">
        <div class="form-group">
         <label for="title-vertical">Title</label>
         <input type="text" id="title-vertical" class="form-control mt-1" name="title" placeholder="Title">
        </div>
       </div>
       <div class="col-12">
        <div class="form-group">
         <label for="sub_title-vertical">Sub title</label>
         <input type="text" id="sub_title-vertical" class="form-control mt-1" name="sub_title" placeholder="Sub title">
        </div>
       </div>
       <div class="col-12">
        <label for="">Description</label>
        <div id="full-wrapper" class="mt-1 mb-2">
         <div id="full-container">
{{--          <div class="editor">--}}

{{--          </div>--}}
         </div>
        </div>
       </div>

       <div class="col-12">
        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  </div>
 </form>

@endsection

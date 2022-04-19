@extends('layouts.admin')
@section('content-body')
 <form id="identifier" class="form form-vertical " action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
  @method('post')
  @csrf
  <div class="d-flex justify-content-between position-relative">


   <ul class="nav nav-tabs position-absolute bg-transparent post-tabs" role="tablist">
    @foreach ($languages as $language)
     <li class="nav-item  ">
      <a class=" {{ $language->code === auth()->user()->language_code ? 'active' : '' }} nav-link bg-transparent" id="{{ $language->code }}-tab" data-toggle="tab" href="#{{ $language->code }}" aria-controls="{{ $language->code }}" role="tab" aria-selected="true">{{ $language->name }}</a>
     </li>
    @endforeach
   </ul>
   <div class="col-3 position-absolute top-0 right-0 d-flex align-items-center justify-content-end" style="right: 0;">
    <button type="submit" class="btn btn-primary mr-1 ">Submit</button>
    <button type="reset" class="btn btn-outline-warning mr-1 ">Reset</button>
   </div>
   <div class="tab-content col-8 mr-1 mb-0 full-height-vh mt-5">
    @foreach ($languages as $key => $language)
     <div class="tab-pane full-height-vh bg-transparent {{ $language->code === auth()->user()->language_code ? 'active' : '' }}" id="{{ $language->code }}" aria-labelledby="{{ $language->code }}-tab" role="tabpanel">

      <div class="card full-height-vh ">
       <div class="card-header">
        <h4 class="card-title">Vertical Form</h4>
       </div>
       <div class="card-content">
        <div class="card-body">
         <div class="form-body">
          <div class="row">
           <div class="col-12">
            <input type="text" class="d-none" name="translations[{{ $key }}][language_code]" value="{{ $language->code }}">
            <div class="form-group">
             <label for="title-vertical">Title ({{ $language->name }})</label>
             <input type="text" id="title-vertical" {{ $language->code === auth()->user()->language_code ? 'required' : '' }} class="form-control mt-1" name="translations[{{ $key }}][title]" placeholder="Title">
            </div>
           </div>
           <div class="col-12">
            <div class="form-group">
             <label for="sub_title-vertical">Sub title ({{ $language->name }})</label>
             <input {{ $language->code === auth()->user()->language_code ? 'required' : '' }} type="text" id="sub_title-vertical" class="form-control mt-1" name="translations[{{ $key }}][sub_title]" placeholder="Sub title">
            </div>
           </div>
           <div class="col-12">
            <div class="form-group">
             <label for="summernote " class="mb-1">Description ({{ $language->name }})</label>
             <textarea id="summernote" class="form-control summernote  mt-2" name="translations[{{ $key }}][description]"></textarea>
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
       <div class="col-12">
        <div class="custom-control custom-switch custom-switch-success mr-2 mb-1 d-flex">
         <ul class="list-unstyled mb-0">
          <li class="d-inline-block mr-2">
           <fieldset>
            <div class="vs-radio-con">
             <input type="radio" name="is_active" checked value="true">
             <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
             </span>
             <span class="">Active</span>
            </div>
           </fieldset>
          </li>
          <li class="d-inline-block mr-2">
           <fieldset>
            <div class="vs-radio-con">
             <input type="radio" name="is_active" value="false">
             <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
             </span>
             <span class="">Inactive</span>
            </div>
           </fieldset>
          </li>
         </ul>
        </div>
       </div>

       <div class="col-12">
        <fieldset class="form-group">
         <label for="basicInputFile" class="mb-1">Images Upload</label>
         <div class="custom-file">
          <input type="file" class="custom-file-input @error('files.*') is-invalid @enderror" id="inputGroupFile01" name="files[]" multiple>
          @error('files.*')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
          @enderror
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
         </div>
        </fieldset>
       </div>
       <div class="col-12">
        <div class="form-group">
         <label for="" class="mb-1">post date</label>
         <input type='text' name="created_date" class="form-control pickadate" value="{{ date('Y-m-d') }}" />
        </div>
       </div>
       <div class="col-12">
        <div class="form-group">
         <label for="" class="mb-1">Categories</label>

         <select class="select2 form-control" multiple="multiple" name="category_id[]">
          @foreach ($categories as $category)
           <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
         </select>

        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="card col-12 mt-2 ml-1">
   <div class="card-content">
    <div class="card-body">
     <p>Tags</p>
     <div class="col-12">
      <fieldset class="form-group">
       <textarea name="keywords" class="form-control" id="basicTextarea" rows="3" placeholder="Textarea"></textarea>
      </fieldset>
     </div>


    </div>
   </div>
  </div>
 </form>
@endsection

@extends('layouts.admin')
@section('content-header')
@endsection
@section('content-body')
 <div class="card">
  <div class="card-header">
   <h2 class="card-title">Create</h2>
  </div>
  <div class="card-content">
   <div class="card-body">
    <form class="form" action="{{ route('language.update', ['language' => $language->id]) }}" method="post">
     @method('put')
     @csrf
     <div class="form-body">
      <div class="row">
       <div class="col-12">
        <div class="form-label-group">
         <input type="text" id="name-floating" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ $language->name }}">
         <label for="name-floating">Name</label>
         @error('name')
          <div class="invalid-feedback ">{{ $message }}</div>
         @enderror
        </div>
       </div>
       <div class="col-12">
        <div class="form-label-group">
         <input type="text" id="code-floating" class="form-control @error('code') is-invalid @enderror" placeholder="Code" name="code" value="{{ $language->code }}">
         <label for="code-floating">Code</label>
         @error('code')
          <div class="invalid-feedback ">{{ $message }}</div>
         @enderror
        </div>
       </div>
       <div class="col-12">
        <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
         <p class="mb-1">Active</p>
         <input type="checkbox" class="custom-control-input" name="is_active" {{ $language->is_active === 1 ? 'checked' : '' }} value="{{ $language->is_active === 1 ? 0 : 1 }}" id="customSwitch4">
         <label class="custom-control-label" for="customSwitch4"></label>
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

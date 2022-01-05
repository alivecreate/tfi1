@extends('adm.layout.admin-index')
@section('title','Video Page Editor')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
<script>


$(".page").addClass( "menu-is-opening menu-open");
$(".page a").addClass( "active-menu");

</script>
@endsection

@section('content')
@include('adm.widget.table-search-draggable')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">


      <div class="row">
      
      <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Video Page Editor</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>

    </div>

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Video Page Manage</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">


        <div class="card card-default">
          <div class="card-body">
            <div class="form-horizontal row">
            
            <div class="col-md-12 card card-info">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Video Page Editor</h3>
                  <div id="example1_wrapper">

                  </div>
                </div>
             
                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('admin.page-editor.store')}}">
                  @csrf

                  <div class="card-body p-2 pt-4">

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="description">Video Desctiption</label>
                          <textarea id="summernote" name="description" placeholder="Video Descriptions">
                          {{$pageData->description}}</textarea>
                          <span class="text-danger">@error('description') {{$message}} @enderror</span>
                          
                          @include('adm.widget.seo-content')
                      
                        </div>

                        @include('adm.widget.seo-content-2')
                      
                    <input type="hidden" name="type" value="video_page">               
                    </div>
                  </div>

                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save Video Page</button>
                  </div>
                </form>
            </div>

        </div>


      </div>
    </section>
  </div>

  @endsection
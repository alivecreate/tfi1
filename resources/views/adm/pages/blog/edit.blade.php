@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')


<script>

    $( document ).ready(function() {
    $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    var data_image = $(this).attr('data-image');
    
    $('.delete-form').attr('action','/admin/blog/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});

$(".blog").addClass( "menu-is-opening menu-open");
$(".blog a").addClass( "active-menu");

</script>

@endsection
@section('content')



<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD: New Blog </h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">New Blog</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
        
          <div class="card-body">
            <div class="form-horizontal row">
            
            <div class="col-md-12">
                 
              <form enctype="multipart/form-data" method="post" class="form-horizontal"  
                action="{{route('blog.update', $blog->id)}}">
                @csrf
                @method('PUT')

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Blog Name" value="@if(old('title')){{old('title')}}@else{{$blog->title}}@endif">
                         
                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="short_description">Short Desctiption</label>
                      <input type="text" class="form-control" name="short_description" 
                         placeholder="Blog Short Desctiption" value="@if(old('short_description')){{old('short_description')}}@else{{$blog->short_description}}@endif">
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="full_description">Full Desctiption</label>
                        <textarea id="summernote" name="full_description" placeholder="Blog Descriptions">@if(old('full_description')){{old('full_description')}}@else{{$blog->full_description}}@endif</textarea>
                                  
                    <span class="text-danger">@error('full_description') {{$message}} @enderror</span>
                    </div>
                    </div>
                    

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="slug">Slug</label>
                      <input type="text" class="form-control" name="slug" 
                         placeholder="Blog Slug" value="@if(old('short_description')){{old('short_description')}}@else{{$blog->short_description}}@endif">
                         
                    <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                    </div>
                  </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-4">
                        <label for="image_alt">Image</label><br>
                        <input type="file" name="image" class="image " id="image"><br>
                        <input type="hidden" name="old_image" value="{{$blog->image}}"><br>


                        <img class="mt-2" width="100" src="{{asset('web')}}/media/xs/{{$blog->image}}">

                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                      </div>
                    </div>
                    
                  <div class="form-group row">
                    <h5 class="bg-dark pl-4 pr-4">SEO CONTENTS</h5>
                    <div class="col-sm-12">
                      <label  class="text-danger" class="text-danger" for="meta_title">SEO Title</label>
                      <input type="text" class="form-control" name="meta_title" 
                        placeholder="Seo Friendly Title" value="@if(old('meta_title')){{old('meta_title')}}@else{{$blog->meta_title}}@endif">
                      <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_keyword">Keyword</label>
                      <input type="text" class="form-control" name="meta_keyword" 
                        placeholder="Seo Keywords with ," value="@if(old('meta_keyword')){{old('meta_keyword')}}@else{{$blog->meta_keyword}}@endif">
                      <span class="text-danger">@error('meta_keyword') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_description">Description</label>
                      <textarea type="text" class="form-control" name="meta_description" 
                        placeholder="Seo Friendly Title">@if(old('meta_description')){{old('meta_description')}}@else{{$blog->meta_description}}@endif</textarea>
                      <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
                    </div>
                  </div>


                    <div class="form-group">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input status-switch" 
                          name="status" value="0" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Status</label>
                      </div>
                    </div>
                  

                  
                <div class="card-footer">
                  <button type="submit" class="float-right btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save Blog</button>
                </div>

              </div>
              </form>
              </div>



          </div>
        </div>


      </div>
    </section>
  </div>

  @endsection

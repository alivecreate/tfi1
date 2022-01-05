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

      <div class="row">
      
      <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Blog</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right"><a href="{{route('blog.create')}}?type=main_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Add New Blog </a>

              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Edit Blog</h1>
          </div>
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
                    <div class="col-sm-6">
                    <div class="col-sm-12">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Blog Name" 
                         value="@if(old('title')){{old('title')}}@else{{$blog->title}}@endif">
                         
                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
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
                        <textarea id="summernote" style="height: 400px;"
                        name="full_description" placeholder="Blog Descriptions">@if(old('full_description')){{old('full_description')}}@else{{$blog->full_description}}@endif</textarea>
                                  
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
                    
                  </div>
                  <div class="col-sm-6">
                        <div class="col-sm-12 row">
                          <div class="col-4">
                            <label for="image">Image</label><br>
                            <input type="file" name="image" class="image " id="image" require  
                              accept="image/png,image/jpeg" />
                              <br>
  
                            <span class="text-danger">@error('image') {{$message}} @enderror</span>
                            <p class="text-danger">
                              Image size for should be( 464Px   X   320Px ).<br>
                              Supportable Format: JPG,JPEG,PNG
                            </p>
                          </div>

                        <div class="col-8">
                          <input type="hidden" name="old_image" value="{{$blog->image}}">
                          @if($blog->image)
                            <img class="mt-2"  height="120"
                              src="{{asset('web')}}/media/xs/{{$blog->image}}">
                              @else
                              <img class=""  height="120"
                            src="{{asset('adm')}}/img/no-item.jpeg">
                          @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="image_alt">Image Alt</label>
                        <input type="text" class="form-control" name="image_alt" 
                          placeholder="Image Alter Text (SEO)" 
                          value="@if(old('image_alt')){{old('image_alt')}}@else{{$blog->image_alt}}@endif">
                          
                        <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                      </div>
                      
                      <div class="col-sm-12">
                        <label for="image_title">Image Title</label>
                        <input type="text" class="form-control" name="image_title" 
                          placeholder="Blog Image Title (SEO)" 
                          value="@if(old('image_title')){{old('image_title')}}@else{{$blog->image_title}}@endif">
                          
                        <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
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


                  
                  
                  <div class="col-sm-12 row mt-4">
                      <div class="col-sm-6">
                        <label  class="text-danger" class="text-danger" for="search_index">Allow search engines to show this Page in search results?</label>
                        <select class="form-control" name="search_index">
                            <option value="1"
                              @if($blog->search_index == 1)
                                  selected
                              @endif
                            >Yes</option>
                            <option value="0"
                            
                              @if($blog->search_index == 0)
                                  selected
                              @endif
                            >No</option>
                        </select>
                      </div>
                      
                      <div class="col-sm-6">
                        <label  class="text-danger" class="text-danger" for="search_follow">Follow links on this Page?</label>
                        <select class="form-control" name="search_follow">
                            <option value="1"

                              @if($blog->search_follow == 1)
                                    selected
                                @endif
                            >Yes</option>
                            <option value="0"
                            
                              @if($blog->search_follow == 0)
                                  selected
                              @endif                            
                            >No</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <label  class="text-danger" for="canonical_url">Canonical URL</label>
                      <input type="text" class="form-control" name="canonical_url" 
                        placeholder="Canonical URL" 
                        value="@if(old('canonical_url')){{old('canonical_url')}}@else{{$blog->canonical_url}}@endif">
                      <span class="text-danger"></span>
                    </div>


                  

                    <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                        
                          onClick="updateStatus({{$blog->id}})"
                          @if($blog->status == 1)checked
                          @endif 
                          @if(old('status'))checked
                          @endif
                          />
                          
                        @if($blog->status == 0)
                        <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
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

  <script>
    
$(function () {
      $('#summernote').summernote({
        placeholder: 'Write Description Here...',
        tabsize: 2,
        height: 400
      });
  })  

  </script>
  @endsection

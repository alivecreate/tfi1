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
    
    $('.delete-form').attr('action','/admin/Blog/'+ delete_id);
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
              <li class="breadcrumb-item active">ADD New Blog</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('blog.index')}}?type=main_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Manage Blog </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>ADD New Blog</h1>
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
                action="{{route('blog.store')}}">
                @csrf

                  <div class="form-group row">
                    <div class="col-sm-6">
                    <div class="col-sm-12">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Blog Name" value="{{old('title')}}">
                         
                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div> 
                  
                      
                    <div class="col-sm-12">
                      <label for="short_description">Short Desctiption</label>
                      <input type="text" class="form-control" name="short_description" 
                         placeholder="Blog Short Desctiption" value="{{old('short_description')}}">
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div> 

                    <div class="col-sm-12">
                        <label for="full_description">Full Desctiption</label>
                          <textarea id="summernote" name="full_description" placeholder="Blog Descriptions">{{old('full_description')}}</textarea>
                                    
                      <span class="text-danger">@error('full_description') {{$message}} @enderror</span>

                      <label for="slug">Url Label</label>
                      <input type="text" class="form-control" name="slug" 
                         placeholder="Url Label" value="{{old('slug')}}">
                         
                      <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                    
                    </div>
                    </div>

                    <div class="col-sm-6">

                    <div class="form-group row">
                

                    <div class="col-sm-12">
                            <label for="image_alt">Image</label><br>
                          <input type="file" name="image" class="image " id="image" require
                            accept="image/png,image/jpeg" />
                            <br>
                          <span class="text-danger">@error('image') {{$message}} @enderror</span>
                        </div>
                      </div>

                      
                  <div class="form-group row">
                    <h5 class="bg-dark pl-4 pr-4">SEO CONTENTS</h5>
                    <div class="col-sm-12">
                      <label  class="text-danger" class="text-danger" for="meta_title">SEO Title</label>
                      <input type="text" class="form-control" name="meta_title" 
                        placeholder="Seo Friendly Title" value="{{old('meta_title')}}">
                      <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_keyword">Keyword</label>
                      <input type="text" class="form-control" name="meta_keyword" 
                        placeholder="Seo Keywords with ," value="{{old('meta_keyword')}}">
                      <span class="text-danger">@error('meta_keyword') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_description">Description</label>
                      <textarea type="text" class="form-control" name="meta_description" 
                        placeholder="Seo Friendly Title">{{old('meta_description')}}</textarea>
                      <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-sm-12 row mt-4">
                      <div class="col-sm-6">
                        <label  class="text-danger" class="text-danger" for="search_index">Allow search engines ?</label>
                        <select class="form-control" name="search_index">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                      </div>
                      
                      <div class="col-sm-6">
                        <label  class="text-danger" class="text-danger" for="search_follow">Follow links on this Page?</label>
                        <select class="form-control" name="search_follow">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <label  class="text-danger" for="canonical_url">Canonical URL</label>
                      <input type="text" class="form-control" name="canonical_url" 
                        placeholder="Canonical URL" >
                      <span class="text-danger"></span>
                    </div>


                    <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input  pull-right" name="status" 
                      id="exampleCheck1"
                    checked
                      />
                      
                    <h5> <span class="badge badge-success">Active</span></h5></td>
                </div>	
                </div>	
                </div>	

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save Blog</button>
                </div>

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

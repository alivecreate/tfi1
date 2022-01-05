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
    
    $('.delete-form').attr('action','/admin/testimonial/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});

$(".testimonial").addClass( "menu-is-opening menu-open");
$(".testimonial a").addClass( "active-menu");

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
              <li class="breadcrumb-item active">ADD New Testimonial</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('testimonials.index')}}?type=main_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Manage Testimonial </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>ADD New Testimonial</h1>
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
                action="{{route('testimonials.store')}}">
                @csrf
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                      <label for="client_name">Client Name</label>
                      <input type="text" class="form-control" name="client_name" 
                         placeholder="Client Name" value="{{old('client_name')}}">
                         
                    <span class="text-danger">@error('client_name') {{$message}} @enderror</span>
                    </div>

                    <!-- <div class="col-sm-6">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Testimonial Title" value="{{old('title')}}">
                      <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div> -->
                  
                  <div class="form-group">
                    <div class="form-group">
                      <label for="short_description">Short Desctiption</label>
                      <textarea type="text" class="form-control mb-3" name="short_description" 
                          style="min-height: 200px;"
                         placeholder="Testimonial Short Desctiption">{{old('short_description')}}</textarea>
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
<!--                   
                      <label for="full_description">Full Desctiption</label>
                        <textarea id="summernote" name="full_description" placeholder="Testimonial Descriptions">{{old('full_description')}}</textarea>
                                  
                      <span class="text-danger">@error('full_description') {{$message}} @enderror</span> -->
                    </div> 
                    
                  </div>
                  </div>

                  <div class="col-sm-6">
                      
                  <div class="form-group row">
                        <div class="form-group">
                        <label for="image_alt">Image</label><br>
                        <input type="file" name="image" class="image " id="image" require
                          accept="image/png,image/jpeg" />

                        <p class="text-danger">
                        <span class="text-danger">@error('image') {{$message}} @enderror</span><br>
                              Image size for should be( 700Px   X   700Px ).<br>
                              Supportable Format: JPG,JPEG,PNG
                        </p>
                      </div>

                    </div>
                        <div class="row">
                          <div class="col-sm-6">
                              <label for="image_alt">Image Alt</label>
                              <input type="text" class="form-control" name="image_alt" 
                                placeholder="Image Alter Text (SEO)" value="{{old('image_alt')}}">
                                
                              <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                            </div>
                            
                            <div class="col-sm-6">
                              <label for="image_title">Image Title</label>
                              <input type="text" class="form-control" name="image_title" 
                                placeholder="Product Image Title (SEO)" value="{{old('image_title')}}">
                                
                              <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                            </div>
                        </div>
                        

                        <div class="row">
                          <div class="col-sm-12">
                              <label for="youtube_embed">Youtube Embed</label>
                                <textarea  class="form-control" name="youtube_embed" placeholder="Testimonial Descriptions"></textarea>
                                          
                              <span class="text-danger">@error('youtube_embed') {{$message}} @enderror</span>
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
                    </div>
                    </div>
                  </div>
                    

              </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save Testimonial</button>
                </div>
              </form>
              </div>



          </div>
        </div>


      </div>
    </section>
  </div>

  @endsection

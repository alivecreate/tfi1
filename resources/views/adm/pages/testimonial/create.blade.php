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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD: New Testimonial </h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">New Testimonial</li>
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
                action="{{route('testimonials.store')}}">
                @csrf

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="client_name">Client Name</label>
                      <input type="text" class="form-control" name="client_name" 
                         placeholder="Client Name" value="{{old('client_name')}}">
                         
                    <span class="text-danger">@error('client_name') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Testimonial Title" value="{{old('title')}}">
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="short_description">Short Desctiption</label>
                      <input type="text" class="form-control" name="short_description" 
                         placeholder="Testimonial Short Desctiption" value="{{old('short_description')}}">
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="full_description">Full Desctiption</label>
                        <textarea id="summernote" name="full_description" placeholder="Testimonial Descriptions">{{old('full_description')}}</textarea>
                                  
                    <span class="text-danger">@error('full_description') {{$message}} @enderror</span>
                    </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-4">
                        <label for="image_alt">Image</label><br>
                        <input type="file" name="image" class="image " id="image" require>
                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                      </div>


                      <div class="col-sm-8">
                        <label for="youtube_embed">Youtube Embed</label>
                          <textarea  class="form-control" name="youtube_embed" placeholder="Testimonial Descriptions"></textarea>
                                    
                      <span class="text-danger">@error('youtube_embed') {{$message}} @enderror</span>
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
                    Save Testimonial</button>
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

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
    
    $('.delete-form').attr('action','/admin/video/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});

$(".video").addClass( "menu-is-opening menu-open");
$(".video a").addClass( "active-menu");

</script>

@endsection
@section('content')



<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD: New Video </h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">New Video</li>
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
                action="{{route('video.store')}}">
                @csrf

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="title">Video Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Video Title" value="{{old('title')}}">
                         
                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="short_description">Short Desctiption</label>
                      <textarea type="text" class="form-control" name="short_description" 
                         placeholder="Video Short Desctiption">{{old('short_description')}}</textarea>
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                    
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="youtube_embed">Youtube Embed Code</label>
                      <textarea type="text" class="form-control" name="youtube_embed" 
                         placeholder="Video Short Desctiption">{{old('youtube_embed')}}</textarea>
                         
                    <span class="text-danger">@error('youtube_embed') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                    
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="video_date">Video Date</label>
                      <input type="date" class="form-control" name="video_date" 
                         placeholder="Video Date" value="{{old('video_date')}}">
                         
                      <span class="text-danger">@error('slug') {{$message}} @enderror</span>
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
                    Save Video</button>
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

@extends('adm.layout.admin-index')
@section('title','Video Manage')

@section('toast')
  @include('adm.widget.toast')
@endsection
<style>

.width-150{
    max-width: 150px !important;
    width: 150 !important;
    height: auto !important;
}
.youtube_embed1 > iframe{
    max-width: 300px !important;
    width: 300 !important;
    height: auto !important;
}

</style>
@section('custom-js')
<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action','/admin/video/'+ delete_id);
    $('.delete-title').html(data_title);
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
            <h1>Video List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Video List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover bg-nowrap" p-1>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Youtube Video</th>
                      <th>Title</th>
                      <th>Short Description</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($videos as $i => $video)
                      <tr> 
                        <td>{{++$i}}</td>
                       

                        <td class="youtube_embed1">{!! html_entity_decode($video->youtube_embed) !!}</td>
                        <td>{{$video->title}}</td>
                        <td  class="width-150">{{$video->short_description}}</td>
                        <td  class="width-150">{{$video->video_date}}</td>
                        
							
                        <td>@if($video->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                        
                        <td>
                        
                          <a href="{{route('video.edit',$video->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit Blogs"><i class="far fa-edit"></i></a>
                           <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete product"  data-id="{{ $video->id}}" data-title="{{ $video->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                          </button>
                      
                      
                      </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>


      </div>
    </section>
  </div>
  
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Blog Video</label>
            <h5 class="modal-title delete-title">Delete Video</h5>
            </div>
            <div class="modal-footer justify-content-between d-block ">
              
            <form class="delete-form float-right" action="" method="POST">
                    @method('DELETE')
                    @csrf
              <button type="button" class="btn btn-default mr-4" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger float-right" title="Delete Record"><i class="fas fa-trash-alt"></i> Delete</button>
              

            </form>
            </div>
          </div>
        </div>
      </div>

  @endsection

  
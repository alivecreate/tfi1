@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

@section('toast')
  @include('adm.widget.toast')
@endsection
<style>

.youtube_embed1 > iframe{
    max-width: 200px !important;
    width: 178px !important;
    height: auto !important;
}
</style>
@section('custom-js')
<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action','/admin/testimonials/'+ delete_id);
    $('.delete-title').html(data_title);
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
            <h1>Testimonial List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Testimonial List</li>
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
                      <th>Image</th>
                      <th>Client Name</th>
                      <th>Title</th>
                      <th>Short Description</th>
                      <th>Full Description</th>
                      <th>Youtube Embed</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($testimonials as $i => $testimonial)
                      <tr> 
                        <td>{{++$i}}</td>
                        @if(isset($testimonial->image))
                        <td><img class="img-circle elevation-2 object-fit"  height="30" width="30"
                          src="{{asset('web')}}/media/xs/{{$testimonial->image}}"></td>
                          @else

                        <td><img class="img-circle elevation-2"  height="30" width="30"
                          src="{{asset('adm')}}/img/no-item.jpeg"></td>
                          @endif

                        <td>{{$testimonial->client_name}}</td>
                        <td>{{$testimonial->title}}</td>
                        <td>{{$testimonial->short_description}}</td>
                        <td>{!! html_entity_decode($testimonial->full_description) !!}</td>
                        <td class="youtube_embed1">{!! html_entity_decode($testimonial->youtube_embed) !!}</td>
                        
							
                        <td>@if($testimonial->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                        
                        <td>
                        
                          <a href="{{route('testimonials.edit',$testimonial->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit Testimonials"><i class="far fa-edit"></i></a>
                           <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete product"  data-id="{{ $testimonial->id}}" data-title="{{ $testimonial->client_name}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
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
            <label>Testimonial Client</label>
            <h5 class="modal-title delete-title">Delete Testimonial</h5>
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

  
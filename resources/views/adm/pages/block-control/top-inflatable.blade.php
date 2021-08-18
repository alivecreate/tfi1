@extends('adm.layout.admin-index')
@section('title','Top Inflatables')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action', delete_id);
    $('.delete-title').html(data_title);
  });  
});
$(".block-control").addClass( "menu-is-opening menu-open");
$(".block-control a").addClass( "active-menu");


$( ".row_position" ).sortable({
      stop: function() {
			var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            console.log(selectedData);
            updateOrder(selectedData);
        }
  });

  function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'top_inflitable'},
      success:function(result){
        console.log(result);
      }
  })
}


</script>
@endsection


@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Top Inflatable List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Inflatable</li>
            
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      
        <div class="row">

          <div class="col-md-5 card card-dark">
              <div class="card-header">
                      <h3 class="card-title">Add Top Inflatable</h3>
                </div>
                

                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('topInflatable.store')}}">

                  @csrf

                  <div class="card-body p-2 pt-4">

                   <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="name">Inflatable Name</label>
                            <select class="form-control" name="product_id" required>
                              <option value="">Select Product</option>
                              @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">@error('product_id') {{$message}} @enderror</span>
                          </div>

                      </div>
                      
                  <div class="form-check">
                    
                  <input type="checkbox" class="form-check-input" name="status" value="1" id="exampleCheck1"/>

                    <label class="form-check-label"  for="exampleCheck1">Publish</label>
                  </div>	


                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-info">Save Client</button>
                  </div>
                </form>

              </div>
           
           <div class="col-md-7 card card-info">
              <div class="card-header">
                      <h3 class="card-title">Top Inflatables Lists</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="row_position">
                      @foreach($topInflatables as $i => $topInflatable)
                        <tr id="{{$topInflatable->id}}">
                          <td>{{$topInflatable->item_no}}</td>
                          <td>{{$topInflatable->name}}</td>
                          <td>

                          @if($topInflatable->product_image)
                          <img class="img-circle elevation-2 object-fit-sm" 
                              src="{{asset('web')}}/media/lg/{{$topInflatable->product_image}}"></td>
                          @endif
                          </td>
                          <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status" value="1" id="exampleCheck1"
                              @if($topInflatable->status == 1)checked
                              @endif 
                              @if(old('status'))checked
                              @endif
                              />
                              <label class="form-check-label"  for="exampleCheck1">Publish</label>
                          </div>	
                          
                          
                        
                        </td>
                          <td>
                            <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete topInflatable" 
                             data-id="{{url('admin')}}/block-control/{{ $topInflatable->id}}" data-title="{{ $topInflatable->name}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
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
              <h4 class="modal-title">Delete Top Inflatables</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Inflatable Name</label>
            <h5 class="modal-title delete-title">Delete Top Inflatable</h5>
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

  
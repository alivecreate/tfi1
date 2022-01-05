@extends('adm.layout.admin-index')
@section('title','Add: Client')

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


function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'client'},
      success:function(result){
        console.log(result);
        location.reload();

      }
  })
}

$( ".row_position" ).sortable({
      stop: function() {
			var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
  });

function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'client'},
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
        
      
    <div class="row">
      
      <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Add New Client</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add New Client</h1>
          </div>
        </div>
    </div>


      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      
        <div class="row">

          <div class="col-md-5 card card-info">
              <div class="card-header">
                      <h3 class="card-title">Edit Client</h3>
                </div>
                

                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('client.update', $client->id)}}">
                @csrf
                @method('PUT')

                  <div class="card-body p-2 pt-4">

                  <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="name">Client Name</label>
                          <input class="form-control" type="text" name="name" placeholder="Client name"
                          value="@if(old('name')){{old('name')}}@else{{$client->name}}@endif">
                          <span class="text-danger">@error('name') {{$message}} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="note">Client Note</label>
                          <textarea class="form-control" type="text" name="note" placeholder="Alt Text / Client Note">@if(old('note')){{old('note')}}@else{{$client->note}}@endif</textarea>
                          <span class="text-danger">@error('note') {{$message}} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-12">
                        <label for="image_alt">Logo</label><br>
                        <input type="file" name="image" class="image " id="image"
                        accept="image/png,image/jpeg"
                        >
                          <input type="hidden" name="old_image" value="{{$client->logo}}">

                          @if($client->logo)
                            <img class="mt-2"  height="120"
                              src="{{asset('web')}}/media/xs/{{$client->logo}}">
                              @else
                              <img class=""  height="120"
                            src="{{asset('adm')}}/img/no-item.jpeg">
                          @endif

                        <span class="text-danger">@error('logo') {{$message}} @enderror</span>
                      </div>



                      <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                        
                          @if($client->status == 1)checked
                          @endif 
                          @if(old('status'))checked
                          @endif
                          />
                          
                        @if($client->status == 0)
                        <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                    </div>	

                    </div>
                  </div>



                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Save Client</button>
                  </div>
                </form>

              </div>
           
           <div class="col-md-7 card card-info">
              <div class="card-header">
                      <h3 class="card-title">Client Lists</h3>
                </div>
                
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="example2">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                  <tbody class="row_position">
                      @foreach($clients as $i => $client)
                      <tr id="{{$client->id}}"> 
                        <td>{{$client->item_no}}</td>

                          <td>{{$client->name}}</td>
                          @if($client->logo)
                          <td><img class="img-circle elevation-2 object-fit-sm" 
                              src="{{asset('web')}}/media/lg/{{$client->logo}}"></td>
                              @else
                              
                          <td><img class="img-circle elevation-2 object-fit-sm" 
                              src="{{asset('adm')}}/img/no-user.jpeg"></td>
                          @endif

                          <td>{{$client->note}}</td>
                          <td>
                          
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input  pull-right" name="status" 
                                id="exampleCheck1"
                                
                                  onClick="updateStatus({{$client->id}})"
                                  @if($client->status == 1)checked
                                  @endif 
                                  @if(old('status'))checked
                                  @endif
                                  />
                                  
                                @if($client->status == 0)
                                <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                            </div>	
                            
                          </td>
                          <td>
                          <a href="{{route('client.edit',$client->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit client"><i class="far fa-edit"></i></a>
                            
                            <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete client" 
                             data-id="{{route('admin.index')}}/client/{{ $client->id}}" data-title="{{ $client->name}}" 
                              data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
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
              <h4 class="modal-title">Delete Client</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Client Name</label>
            <h5 class="modal-title delete-title">Delete Category</h5>
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

  
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
    
    $('.delete-form').attr('action','/admin/product/'+ delete_id);
    $('.delete-title').html(data_title);
  });  
});


$(".product").addClass( "menu-is-opening menu-open");
$(".product a").addClass( "active-menu");

</script>
@endsection


@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">product</li>
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
                      <th>Name</th>
                      <th>Short Description</th>
                      <th>Full Description</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $i => $product)
                      <tr> 
                        <td>{{++$i}}</td>
                        @if(isset($product->image))
                        <td><img class="img-circle elevation-2 object-fit"  height="30" width="30"
                          src="{{asset('web')}}/media/xs/{{$product->image}}"></td>
                          @else

                        <td><img class="img-circle elevation-2"  height="30" width="30"
                          src="{{asset('adm')}}/img/no-item.jpeg"></td>
                          @endif
                        <td>{{$product->name}}</td>
                        <td>{{$product->short_description}}</td>
                        <td>{{$product->full_description}}</td>
                        

                        <td>
                        @if(getParentCategory($product->category_id)['category'])
                          <span class='bg-primary p-1'>{{getParentCategory($product->category_id)['category']->name}}</span>
                        @endif

                        
                        @if(getParentCategory($product->category_id)['subcategory'])
                          <span class='bg-danger p-1'>{{getParentCategory($product->category_id)['subcategory']->name}}</span>
                        @endif

                        
                        @if(getParentCategory($product->category_id)['subcategory2'])
                          <span class='bg-warning p-1'>{{getParentCategory($product->category_id)['subcategory2']->name}}</span>
                        @endif
                                                
                        
                        </td>
                        
                        <td>
                        
                          <a href="{{route('product.edit',$product->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit product"><i class="far fa-edit"></i></a>
                          {{-- <a href="{{route('product-image.edit',$product->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Upload product Images"><i class="far fa-edit"></i></a> --}}
                          <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete product"  data-id="{{ $product->id}}" data-title="{{ $product->name}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
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
            <label>Product Name</label>
            <h5 class="modal-title delete-title">Delete Product</h5>
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

  
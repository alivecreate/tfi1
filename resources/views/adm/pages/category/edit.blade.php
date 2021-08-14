@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')



<script>
$('.category_parent_id').on('change', function() {
        var parent = $(this).find(':selected').val();

        $.get( `{{url('api')}}/get/getPetaKacheri/`+parent, { category_parent_id: parent })
        .done(function( data ) {
          // alert(JSON.stringify(data));

        if(JSON.stringify(data.length) == 0){
            $('.subcategory_parent_id').html('<option value="">Select Sub Category</option>');
        }
        else{
                $('.subcategory_parent_id').empty();     
            $('.subcategory_parent_id').html('<option value="">Select Sub Category</option>');
            for(var i = 0 ; i < JSON.stringify(data.length); i++){  
                $('.subcategory_parent_id').append('<option value='+JSON.stringify(data[i].id)+'>'+ data[i].name +'</option>')
            }
        }
    });
        
    });
$(".category").addClass( "menu-is-opening menu-open");
$(".category a").addClass( "active-menu");

</script>
@endsection
@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h3>Edit : Category / Sub Category / Sub Category2  </h3>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active"> Category / Sub Category / Sub Category2</li>
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
            
            @if($type == 'category')
            <div class="col-md-4 card card-info">
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
             
              <form method="post" class="form-horizontal" action="{{route('admin.category.update', $data->id)}}">
                @csrf
                <div class="card-body p-2 pt-4">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="hidden" name="type" value="category">
                      <input type="text" class="form-control" name="name" 
                         placeholder="Category Name" 
                         
                         value="@if(old('name')){{old('name')}}@else{{$data->name}}@endif">
                         
                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <textarea class="form-control" name="slug"
                         placeholder="slug">@if(old('slug')){{old('slug')}}@else{{$data->description}}@endif</textarea>
                    <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">                      
                      <span class="text-danger">@error('category_parent_id1') {{$message}} @enderror</span>
                    
                    </div>
                  </div>
                  
                  

                  </div>
                </div>
                <input type="hidden" name='parent_id' value="{{$data->parent_id}}">

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save Data</button>
                </div>
              </form>

            </div>
            @endif


            @if($type == 'subcategory')
            <div class="col-md-4 card card-info">
              <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Edit Sub Category</h3>
              </div>
             
              <form method="post" class="form-horizontal"  action="{{route('admin.category.update',$data->id)}}">
              
              @csrf
              <input type="hidden" name="type" value="subcategory">
                <div class="card-body p-2 pt-4">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      
                      <input type="text" class="form-control" name="name"
                         placeholder="Sub Category Name" 
                         value="@if(old('name')){{old('name')}}@else{{$data->name}}@endif">
                         <span class="text-danger">@error('subcategory_name') {{$message}} @enderror</span>
                    
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <textarea class="form-control" name="slug"
                         placeholder="slug">@if(old('slug')){{old('slug')}}@else{{$data->description}}@endif</textarea>
                         <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                    
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      
                      <select name="category_parent_id1" class="form-control" disabled>
                        <option value="">Select Category</option>
                          @foreach($categories as $category)
                              <option value="{{$category->id}}" 
                                
                             @if($category->id == $data->parent_id )
                             selected
                              @endif    

                              >{{$category->name}}</option>
                          @endforeach
                      </select>

                      <span class="text-danger">@error('category_parent_id1') {{$message}} @enderror</span>
                    
                    </div>
                  </div>

                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Save Data</button>
                </div>
              </form>
            </div>
            @endif

            @if($type == 'subcategory2')
            <div class="col-md-4 card card-info">
             <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Sub Category2</h3>
              </div>
             
              <form method="post" class="form-horizontal" action="{{route('admin.category.update',$data->id)}}">
              <input type="hidden" name="type" value="subcategory2">
              @csrf
                <div class="card-body p-2 pt-4">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      
                      <input type="text" class="form-control" name="name"
                         placeholder="Sub Category Name" value="@if(old('name')){{old('name')}}@else{{$data->name}}@endif">
                         <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <textarea class="form-control" name="slug"
                         placeholder="slug">@if(old('slug')){{old('slug')}}@else{{$data->description}}@endif</textarea>

                         <span class="text-danger">@error('slug') {{$message}} @enderror</span>

                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <select name="category_parent_id" class="form-control category_parent_id" disabled>
                        <option value="">Select Category</option>
                          

                        
                          @foreach($categories as $category)

                              <option value="{{$category->id}}"

                              @if($category->id == $category->parentCategories2($data->parent_id)[0]->id )
                             selected
                              @endif    
                              
                          
                              >{{$category->name}}</option>

                          @endforeach
                      </select>
                      
                      <span class="text-danger">@error('category_parent_id') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <select name="subcategory_parent_id"  class="form-control subcategory_parent_id" disabled>

                      @foreach(getSubCategories($category->parentCategories2($data->parent_id)[0]->id) as $subCategory)
                        
                        <option value="{{$data->parent_id}}"
                        
                          @if($subCategory->id == $category->parentCategories2($data->parent_id)[0]->id )
                              selected
                          @endif    
                        >{{$subCategory->name}}</option>
                        
                        @endforeach

                      </select>

                      <span class="text-danger">@error('subcategory_parent_id') {{$message}} @enderror</span>
                    </div>
                  </div>

                  </div>
                </div>
                <input type="hidden" name='parent_id' value="{{$data->parent_id}}">
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Save Data</button>
                </div>
              </form>
            </div>


            @endif

            <div class="col-md-8">
            
            <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="bg-gray">ID</th>
                      <th class="bg-info">Category</th>
                      <th class="bg-danger">Sub Category</th>
                      <th class="bg-warning">Sub Category2</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $i => $parent_category)                 
                    <tr>
                      <td>{{++$i}}</td>
                      <td><a  class="badge badge-info"  href="{{route('admin.category.edit',$parent_category->id)}}?type=category">{{$parent_category->name}}</a></td>
                      <td>
                      
                        @if($parent_category->subCategories1($parent_category->id)->count() > 0)
                        <table class="table-border-none">
                          @foreach($parent_category->subCategories1($parent_category->id) as $subCategory1)
                          <tr>
                            <td>
                            
                            <a  class="badge badge-danger"  href="{{route('admin.category.edit',$subCategory1->id)}}?type=subcategory">{{$subCategory1->name}}</a>
                              
                                 @if($parent_category->subCategories2($subCategory1->id)->count() > 0)
                                  @foreach($parent_category->subCategories2($subCategory1->id) as $subCategory2)
                                  
                                  <tr>
                                      <td></td>
                                  </tr>        
                                  @endforeach
                              @endif        
                            </td>
                          </tr>
                          @endforeach
                          </table>
                        @endif
                        </td>
                      <td>
                        @if($parent_category->subCategories1($parent_category->id)->count() > 0)
                              <table>
                          @foreach($parent_category->subCategories1($parent_category->id) as $subCategory1)
                            @if($parent_category->subCategories2($subCategory1->id)->count() > 0)
                              @foreach($parent_category->subCategories2($subCategory1->id) as $subCategory2)
                              
                              <tr>
                                <td>
                                  <a class="badge badge-warning" href="{{route('admin.category.edit',$subCategory2->id)}}?type=subcategory2">{{$subCategory2->name}}</a>
                              </td>
 
                              </tr>        
                              @endforeach
                              @endif                   
                            @endforeach
                              </table>
                        @endif

                      </td>
                        
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                
                </div>

                </div>
        </div>

      </div>
    </section>
  </div>

  @endsection

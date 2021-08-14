@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')

<script>
$('.category_parent_id').on('change', function() {
        var parent = $(this).find(':selected').val();
        
        $('.parent_id').val(parent);

        $.get( `{{url('api')}}/get/getPetaKacheri/`+parent, { category_parent_id: parent })
        .done(function( data ) {
        if(JSON.stringify(data.length) == 0){
            $('.subcategory_parent_id').html('<option>Select Sub Category</option>');
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

  $('.subcategory_parent_id').on('change', function() {
        var parent = $(this).find(':selected').val();
        if(parent == ''){
          var mainCat = $('.category_parent_id').find(':selected').val();
          
          $('.parent_id').val(mainCat);

        }else{
          $('.parent_id').val(parent);
        }

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
            <h1>ADD New : Caegory / Sub Category / Sub Category 2  </h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
            
            <div class="col-md-12 card card-info">
                 
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
             
              <form method="post" enctype="multipart/form-data" class="form-horizontal" 
              action="{{route('admin.category.update', $data->id)}}">
                @csrf
                <div class="card-body p-2 pt-4">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="hidden" name="type" value="name">
                      <input type="text" class="form-control" name="name" 
                         placeholder="Category Name" 
                          value="@if(old('name')){{old('name')}}@else{{$data->name}}@endif">
                         
                    <span class="text-danger">@error('category') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <textarea class="form-control" name="description"
                         placeholder="Description">@if(old('description')){{old('description')}}@else{{$data->description}}@endif</textarea>
                    <span class="text-danger">@error('description') {{$message}} @enderror</span>
                    </div>

                    <div class="col-sm-6">
                      <textarea class="form-control" name="slug"
                         placeholder="slug">@if(old('slug')){{old('slug')}}@else{{$data->slug}}@endif</textarea>
                    <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <select name="category_parent_id" class="form-control category_parent_id">
                      

                        <option value="0">Select Category</option>

                          @foreach($categories as $parent_category)
                              <option value="{{$parent_category->id}}"
                           
                              
                        @if(getParentCategory($data->category_id)['category'])
                          @if(getParentCategory($data->parent_id)['category']->id == $parent_category->id ))
                            selected
                          @endif
                        @endif

                              >{{$parent_category->name}}</option>
                          @endforeach
                      </select>
                      <span class="text-danger">@error('category_parent_id') {{$message}} @enderror</span>
                    </div>

                    <div class="col-sm-6">
                      <select name="subcategory_parent_id"  class="form-control subcategory_parent_id">
                        <option value="0">Select Sub Category</option>

                        
                      </select>
                      <span class="text-danger">@error('subcategory_parent_id') {{$message}} @enderror</span>
                    </div>
                  </div>

                  
                  <input type="hidden" name="parent_id" class="parent_id" value="0">
                  

                  <div class="form-group row">
                        <div class="col-sm-12">
                        <label for="image">Image</label><br>
                        <input type="file" name="image" class="image " id="image" require><br>
                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                      </div>

                      <img class="mt-2" width="100" src="{{asset('web')}}/media/xs/{{$data->image}}">
                    </div>

                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="image_alt">Image Alt</label>
                        <input type="text" class="form-control" name="image_alt" 
                          placeholder="Image Alter Text (SEO)" 
                          value="@if(old('image_alt')){{old('image_alt')}}@else{{$data->image_alt}}@endif">
                          
                        <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                      </div>
                      
                      <div class="col-sm-12">
                        <label for="image_title">Image Title</label>
                        <input type="text" class="form-control" name="image_title" 
                          placeholder="Product Image Title (SEO)" 
                          value="@if(old('image_title')){{old('image_title')}}@else{{$data->image_title}}@endif">
                          
                        <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                      </div>
                    </div>
                    
                    
                  <div class="form-group row">
                    <h5 class="bg-dark pl-4 pr-4">SEO CONTENTS</h5>
                    <div class="col-sm-12">
                      <label  class="text-danger" class="text-danger" for="meta_title">SEO Title</label>
                      <input type="text" class="form-control" name="meta_title" 
                        placeholder="Seo Friendly Title" 
                          value="@if(old('meta_title')){{old('meta_title')}}@else{{$data->meta_title}}@endif">
                      <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_keyword">Keyword</label>
                      <input type="text" class="form-control" name="meta_keyword" 
                        placeholder="Seo Keywords with ," 
                          value="@if(old('meta_keyword')){{old('meta_keyword')}}@else{{$data->meta_keyword}}@endif">

                      <span class="text-danger">@error('meta_keyword') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_description">Description</label>
                      <textarea type="text" class="form-control" name="meta_description" 
                        placeholder="Seo Friendly Title">@if(old('meta_description')){{old('meta_description')}}@else{{$data->meta_description}}@endif</textarea>
                      <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
                    </div>
                  </div>



                <div class="form-group">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input status-switch" 
                      name="status" value="0" id="customSwitch1">
                    <label class="custom-control-label float-right" for="customSwitch1">Status</label>
                  </div>
                </div>

                  
                  </div>
                </div>


                <div class="card-footer">
                  <button type="submit" class="float-right btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save Data</button>
                </div>
              </form>
            </div>

          </div>
        </div>


      </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection

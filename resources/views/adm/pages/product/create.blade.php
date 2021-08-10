@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')


<script>
$('.category_parent_id').on('change', function() {
        var parent = $(this).find(':selected').val();
    // alert(parent);

        $.get( `{{url('api')}}/get/getPetaKacheri/`+parent, { category_parent_id: parent })
        .done(function( data ) {
          // alert(JSON.stringify(data));

        if(JSON.stringify(data.length) == 0){
            $('.sub_category_parent_id').html('<option>Sub Category</option>');
        }
        else{
                $('.sub_category_parent_id').empty();     
            $('.sub_category_parent_id').html('<option value="">Sub Category</option>');
            for(var i = 0 ; i < JSON.stringify(data.length); i++){  
                $('.sub_category_parent_id').append('<option value='+JSON.stringify(data[i].id)+'>'+ data[i].name +'</option>')
            }
        }
    });
    $('.category_id').val(parent);

    });


    $('.sub_category_parent_id').on('change', function() {
        var parent = $(this).find(':selected').val();
    // alert(parent);

        $.get( `{{url('api')}}/get/getDepartment/`+parent, { sub_category_parent_id: parent })
        .done(function( data ) {
          // alert(JSON.stringify(data));

        if(JSON.stringify(data.length) == 0){
            $('.department_id').html('<option>Select Sub Category2</option>');
        }
        else{
                $('.department_id').empty();     
            $('.department_id').html('<option value="">Select Sub Category2</option>');
            for(var i = 0 ; i < JSON.stringify(data.length); i++){  
                $('.department_id').append('<option value='+JSON.stringify(data[i].id)+'>'+ data[i].name +'</option>')
            }
        }
    });
    
    $('.category_id').val(parent);
       
    });
    
    $('.department_id').on('change', function() {
        var parent = $(this).find(':selected').val();
        $('.category_id').val(parent);
       
    });

    
    
$(".task").addClass( "menu-is-opening menu-open");
$(".task a").addClass( "active-menu");



</script>
@endsection
@section('content')



<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD: New Product </h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                action="{{route('product.store')}}">
                @csrf
                  <div class="form-group row">
                    <div class="col-sm-4">
                    <label for="client_id">Category</label>
                      <select name="category_parent_id" class="form-control category_parent_id">
                        <option value="">Select Category</option>
                          @foreach($parent_categories as $parent_category)
                              <option value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                          @endforeach
                      </select>
                      <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
                    </div>

                    
                    <div class="col-sm-4">
                    <label for="client_id">Sub Category</label>
                      <select name="sub_category_parent_id"  class="form-control sub_category_parent_id">
                        <option value="">Select Sub Category</option>
                      </select>
                      <span class="text-danger">@error('sub_category_parent_id') {{$message}} @enderror</span>
                    </div>
    
                    
                    <div class="col-sm-4">
                     <label for="client_id">Sub Category 2</label>
                      <select name="department_id"  class="form-control department_id">
                        <option value="">Select Sub Category2</option>
                      </select>
                      <span class="text-danger">@error('department_id') {{$message}} @enderror</span>
                      <input type="hidden" name="category_id" class="category_id">
                      <input type="hidden" name="admin_id" value="{{session('LoggedUser')->id}}">
                    </div>                 
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" 
                         placeholder="Product Name" value="{{old('name')}}">
                         
                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="short_description">Short Desctiption</label>
                      <input type="text" class="form-control" name="short_description" 
                         placeholder="Product Short Desctiption" value="{{old('short_description')}}">
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="full_description">Full Desctiption</label>
                        <textarea id="summernote" name="full_description" placeholder="Product Descriptions">
                        </textarea>
                                  
                    <span class="text-danger">@error('full_description') {{$message}} @enderror</span>
                    </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-3">
                        <label for="image_alt">Featured Image</label><br>
                        <input type="file" name="image" class="image " id="image">
                      </div>

                      <div class="col-sm-4">
                        <label for="image_alt">Image Alt</label>
                        <input type="text" class="form-control" name="image_alt" 
                          placeholder="Image Alter Text (SEO)" value="{{old('image_alt')}}">
                          
                        <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                      </div>
                      
                      <div class="col-sm-5">
                        <label for="image_title">Image Title</label>
                        <input type="text" class="form-control" name="image_title" 
                          placeholder="Product Image Title (SEO)" value="{{old('image_title')}}">
                          
                        <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                      </div>
                    </div>
                    
                  <div class="form-group row">
                    <h5 class="bg-dark pl-4 pr-4">SEO CONTENTS</h5>
                    <div class="col-sm-12">
                      <label  class="text-danger" class="text-danger" for="meta_title">SEO Title</label>
                      <input type="text" class="form-control" name="meta_title" 
                        placeholder="Seo Friendly Title" value="{{old('meta_title')}}">
                      <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_keyword">Keyword</label>
                      <input type="text" class="form-control" name="meta_keyword" 
                        placeholder="Seo Keywords with ," value="{{old('meta_keyword')}}">
                      <span class="text-danger">@error('meta_keyword') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_description">Description</label>
                      <textarea type="text" class="form-control" name="meta_description" 
                        placeholder="Seo Friendly Title">{{old('meta_description')}}</textarea>
                      <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
                    </div>
                  </div>

                  
                <div class="card-footer">
                  <button type="submit" class="float-right btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save Product</button>
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

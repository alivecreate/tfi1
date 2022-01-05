@extends('adm.layout.admin-index')
@section('title','Create Category')

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

    
$(".listing").addClass( "menu-is-opening menu-open");
$(".listing a").addClass( "active-menu");

$('.category_option').on('change', function() {
        var category_option = $(this).find(':selected').val();

        if(category_option == 'main_category'){
          // alert(category_option);
          
          $('.hidden-block').show();
          $('.name-lable').text('Main Category');
          $('.name-input').attr('placeholder', 'Main Category Name');
          
          $('.sub-category select').attr('required', false);
          $('.sub-category').hide();
          $('.product-range').hide();
          $('.category-block').hide();
          
        }
        else if(category_option == 'sub_category'){
          // alert(category_option);
          $('.hidden-block').show();
          $('.name-lable').text('Sub Category');
          $('.name-input').attr('placeholder', 'Sub Category Name');

          $('.category-block').show();
          $('.sub-category').show();
          $('.sub-category select').attr('required', true);
          $('.product-range').hide();
        }else{
          
          $('.hidden-block').hide();
        }

    });


</script>
@endsection
@section('content')
<?php
  $pageType = $_GET['type'];
  if($_GET['type'] == 'main_category'){
    
    $pageTitle = "Main Category";
  }elseif($_GET['type'] == 'sub_category'){
    $pageTitle = "Sub Category";
  }

$cat_type = '';
$cat_level = [];
  $parent_id = old('parent_id');


if($parent_id == 0){
  $cat_type = 'category';
  $cat_type = 'subcategory';
  $cat_level = ['category_name' => null, 'type' => 'main_category', 'category' => null, 'subcategory' => null, 'subcategory2' => null, 'parent_id' =>0];
 
}
else{
  if($mainCategory = getParent($parent_id)->parent_id == 0){
    $cat_type = 'subcategory'.'sub cat';
    $cat_level = ['category_name' => getParent($parent_id)->name, 'type' => 'sub_category', 'category' => getParent($parent_id)->id, 'subcategory' => null, 'subcategory2' => null, 'parent_id' =>getParent($parent_id)->id];

  }
  else{
      $cat_type = 'subcategory2';
      if($subCategory = (getParent(getParent($parent_id)->parent_id)->parent_id) == 0){
      $cat_level = ['category_name' => getParent(getParent($parent_id)->parent_id)->name, 'type' => 'product_range', 'category' => getParent(getParent($parent_id)->parent_id)->id, 'subcategory' => getParent($parent_id)->id, 'subcategory_name' => getParent($parent_id)->name, 'subcategory2' => null, 'parent_id' => getParent($parent_id)->id];
    
      }
  }

}


?>

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        
      <div class="row">
      
      <div class="col-sm-6"> 
        <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit {{$pageTitle}}</li>

              </ol>

          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              @if($pageType == 'main_category')
                <a href="{{route('admin.category.create')}}?type=sub_category&id={{$category->id}}" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Create Sub Category </a>

                @elseif($pageType == 'sub_category')
                  <a href="{{route('photo.manage')}}?page=list&main_category={{$_REQUEST['id']}}&sub_category={{$category->id}}" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                    &nbsp;&nbsp;Manage Photos </a>
                @else

                <a href="{{route('admin.category.create')}}?type=sub_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                    &nbsp;&nbsp;Add Main Category </a>
                @endif
                <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
                

              </ol>
          </div>
          </div>

        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Edit {{$pageTitle}} </h1>
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
                 
             
              <form method="post"  enctype="multipart/form-data" class="form-horizontal" 
              action="{{route('admin.category.list.update', $category->id)}}">
              
                @csrf
                <div class="card-body p-0">

                
                <!-- <div class="form-group row">

                      <div class="col-sm-6">
                            <select name="category_option" class="form-control category_option border-2" 
                            >

                                <option value="main_category"
                                    @if($cat_level['type'] == 'main_category') selected @endif
                                >Create Main Category</option>
                              
                                <option value="sub_category"
                                  @if($cat_level['type'] == 'sub_category') selected @endif
                                >Create Sub Category</option>
                                

                            </select>
                      </div>
                  </div>
                   -->
              <div class="hidden-block">
                  @if($pageType == 'sub_category')

                  <input type="hidden" name="pageType" class="parent_id" 
                      value="sub_category"> 

              <div class="form-group row category-block" >
                    <div class="col-sm-3 pull-left sub-category "  >
                      <select name="category_parent_id" class="form-control category_parent_id" required>
                        <option value="">Select Main Category</option>
                          @foreach($parent_categories as $parent_category)
                              <option value="{{$parent_category->id}}"
                              
                          @if($_REQUEST['id'] == $parent_category->id )
                              selected
                            @endif

                              {{--@if(old('category_parent_id') == $parent_category->id) selected @endif --}}
                              >{{$parent_category->name}}</option>
                          @endforeach

                      </select>
                      <span class="text-danger">@error('category_parent_id') {{$message}} @enderror</span>
                    </div>
                
                    <input type="hidden" name="parent_id" class="parent_id" 
                    value="{{$_REQUEST['id']}}"/>

                    <input type="hidden" name="page_type" value="sub_category"/>

                  </div>

                    @else
                  <input type="hidden" name="pageType" class="parent_id" 
                      value="main_category"> 

                      <input type="hidden" name="parent_id" class="parent_id" 
                      value="0"> 
                    @endif

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="hidden" name="type" value="name">
                      <input type="text" class="form-control name-input" name="name" 
                         placeholder="{{$pageTitle}} Name" 
                          value="@if(old('name')){{old('name')}}@else{{$category->name}}@endif" required>
                         
                      <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-sm-6">
                          <textarea id="summernote" name="description" placeholder="Category Descriptions" 
                          >@if(old('description')){{old('description')}}@else{{$category->description}}@endif</textarea>
                                    
                        <span class="text-danger">@error('description') {{$message}} @enderror</span>
                      </div>
                    

                    <div class="col-sm-6">
                      <div class="row">

                      <div class="col-sm-12 mb-3">
                        <input class="form-control" name="slug" placeholder="URL label" 
                        
                        value="@if(old('slug')){{old('slug')}}@else{{$category->slug}}@endif"
                         required>

                        <span class="text-danger">@error('slug') {{$message}} @enderror</span>

                      </div>

                        <div class="col-sm-5 pull-left">
                    <label for="image">Og Image</label><br>
                        <input type="file" name="image" class="image " id="image"
                        accept="image/png,image/jpeg" />
                        <br> 
                        </div>


                        <div class="col-sm-5 pull-left">
                          <input type="hidden" name="old_image" value="{{$category->image}}">
                          @if($category->image)
                            <img class="mt-2"  height="64"
                              src="{{asset('web')}}/media/xs/{{$category->image}}">
                              @else
                              <img class=""  height="64"
                            src="{{asset('adm')}}/img/no-item.jpeg">
                          @endif
                        </div>

                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                        </div>

                      <!-- <div class="col-sm-12 mb-3">
                        <input type="text" class="form-control" name="image_alt" 
                          placeholder="Image Alter Text (SEO)" 
                          value="@if(old('image_alt')){{old('image_alt')}}@else{{$category->image_alt}}@endif">
                          
                        <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                      </div>
                      
                      <div class="col-sm-12 mb-3">
                        <input type="text" class="form-control" name="image_title" 
                          placeholder="Image Title (SEO)" 
                          value="@if(old('image_title')){{old('image_title')}}@else{{$category->image_title}}@endif">
                        <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                      </div> -->

                    </div>
                    
                  <div class="col-sm-6">
                      <div class="col-sm-12 mb-2  p-0">
                        <h5 class="bg-dark pl-4 pr-4">SEO CONTENTS</h5>
                          <input type="text" class="form-control" name="meta_title" 
                            placeholder="Seo Title" 
                          value="@if(old('meta_title')){{old('meta_title')}}@else{{$category->meta_title}}@endif">
                          <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
                        </div>
                          <div class="col-sm-12 mb-2  p-0">
                            <input type="text" class="form-control" name="meta_keyword" 
                              placeholder="Seo Keywords with ," 
                              value="@if(old('meta_keyword')){{old('meta_keyword')}}@else{{$category->meta_keyword}}@endif">
                            <span class="text-danger">@error('meta_keyword') {{$message}} @enderror</span>
                          </div>
                          <div class="col-sm-12 mb-2  p-0">
                            <textarea type="text" class="form-control" name="meta_description" 
                              placeholder="Seo Description">@if(old('meta_description')){{old('meta_description')}}@else{{$category->meta_description}}@endif</textarea>
                            <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
                          </div>
                        
                    </div>

                          
                      <div class="col-sm-6">
                        <div class="row col-sm-12">
                          <div class="col-sm-6">
                            <label  class="text-dark" class="text-dark" for="search_index">Allow search engines?</label>
                            <select class="form-control col-sm-5" name="search_index">
                                <option value="1"
                                  @if($category->search_index == 1)
                                      selected
                                  @endif
                                >Yes</option>
                                <option value="0"
                                
                                  @if($category->search_index == 0)
                                      selected
                                  @endif
                                >No</option>
                            </select>
                          </div>
                          
                          <div class="col-sm-6">
                            <label  class="text-dark" class="text-dark" for="search_follow">Follow links?</label>
                            <select class="form-control col-sm-5" name="search_follow">
                            <option value="1"

                              @if($category->search_follow == 1)
                                    selected
                                @endif
                              >Yes</option>
                              <option value="0"

                              @if($category->search_follow == 0)
                                  selected
                              @endif                            
                              >No</option>
                            </select>
                          </div>
                          </div>
                        <div class="col-sm-12">
                          <div class="col-sm-12 pl-0 mt-3">
                            <input type="text" class="form-control" name="canonical_url" 
                              placeholder="Canonical URL" 
                            value="@if(old('canonical_url')){{old('canonical_url')}}@else{{$category->canonical_url}}@endif">
                     
                            <span class="text-dark"></span>
                          </div>
  
                          </div>
                          <div class="col-sm-6 mt-4">
                             <div class="form-check mt-4">
                                <input type="checkbox" class="form-check-input  pull-right" name="status" 
                                id="exampleCheck1"
                                
                                  onClick="updateStatus({{$category->id}})"
                                  @if($category->status == 1)checked
                                  @endif 
                                  @if(old('status'))checked
                                  @endif
                                  />
                                  
                                @if($category->status == 0)
                                
                                <h5> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                            </div>	
                            
                          </div>

                          
                        </div>
                  
                @if($pageType == 'main_category')
                  <div class="col-sm-12 text-center mt-4">
                    <button type="submit" class="btn btn-info btn-save"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Save & Create Sub Category</button>
                    </div>
                  </div>

                  @elseif($pageType == 'sub_category')
                  <div class="col-sm-12 text-center mt-4">
                    <button type="submit" class="btn btn-info btn-save"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Save & Add Photos</button>
                    </div>
                  </div>
                @endif

                </div>


              </form>
            </div>


          </div>
        </div>


      </div>
      
    </section>
    
  </div>

  @endsection

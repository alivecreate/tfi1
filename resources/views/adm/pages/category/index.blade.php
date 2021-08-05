@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')
@section('content')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')



<script>
$(".category").addClass( "menu-is-opening menu-open");
$(".category a").addClass( "active-menu");

</script>
@endsection
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h3>Add New :- Product</h3>
          </div>
          <div class="col-sm-4">
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
      
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="bg-gray">ID</th>
                      <th class="bg-info">Image</th>
                      <th class="bg-info">Name</th>
                      <th class="bg-info">Title</th>
                      <th class="bg-danger">Description</th>
                      <th class="bg-warning">Sub Category 2</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($parent_categories as $i => $parent_category)                  
                    <tr>
                      <td>{{++$i}}</td>
                      <td><a  class="text-info"  href="{{route('admin.category.edit',$parent_category->id)}}?type=category">{{$parent_category->name}}</a></td>
                      <td>
                      
                        @if($parent_category->subCategories1($parent_category->id)->count() > 0)
                        <table class="table-border-none">
                          @foreach($parent_category->subCategories1($parent_category->id) as $subCategory1)
                          <tr>
                            <td>
                            
                            <a  class="text-danger"  href="{{route('admin.category.edit',$subCategory1->id)}}?type=subcategory">{{$subCategory1->name}}</a>
                              
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
                                  <a class="text-warning" href="{{route('admin.category.edit',$subCategory2->id)}}?type=subcategory2">{{$subCategory2->name}}</a>
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


      </div>
    </section>
  </div>

  @endsection
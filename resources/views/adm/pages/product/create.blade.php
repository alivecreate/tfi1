@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')


<script>
$('.kacheri_parent_id').on('change', function() {
        var parent = $(this).find(':selected').val();
    // alert(parent);

        $.get( `{{url('api')}}/get/getPetaKacheri/`+parent, { kacheri_parent_id: parent })
        .done(function( data ) {
          // alert(JSON.stringify(data));

        if(JSON.stringify(data.length) == 0){
            $('.petaKacheri_parent_id').html('<option>પેટાકચેરી સિલેક્ટ કરો</option>');
        }
        else{
                $('.petaKacheri_parent_id').empty();     
            $('.petaKacheri_parent_id').html('<option value="">પેટાકચેરી સિલેક્ટ કરો</option>');
            for(var i = 0 ; i < JSON.stringify(data.length); i++){  
                $('.petaKacheri_parent_id').append('<option value='+JSON.stringify(data[i].id)+'>'+ data[i].name +'</option>')
            }
        }
    });
    $('.category_id').val(parent);

    });


    $('.petaKacheri_parent_id').on('change', function() {
        var parent = $(this).find(':selected').val();
    // alert(parent);

        $.get( `{{url('api')}}/get/getDepartment/`+parent, { petaKacheri_parent_id: parent })
        .done(function( data ) {
          // alert(JSON.stringify(data));

        if(JSON.stringify(data.length) == 0){
            $('.department_id').html('<option>ડિપાર્ટમેન્ટ સિલેક્ટ કરો</option>');
        }
        else{
                $('.department_id').empty();     
            $('.department_id').html('<option value="">ડિપાર્ટમેન્ટ સિલેક્ટ કરો</option>');
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
                      <select name="kacheri_parent_id" class="form-control kacheri_parent_id">
                        <option value="">કચેરી સિલેક્ટ કરો</option>
                          @foreach($parent_categories as $parent_category)
                              <option value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                          @endforeach
                      </select>
                      <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
                    </div>

                    
                    <div class="col-sm-4">
                    <label for="client_id">Sub Category</label>
                      <select name="petaKacheri_parent_id"  class="form-control petaKacheri_parent_id">
                        <option value="">પેટાકચેરી સિલેક્ટ કરો</option>
                      </select>
                      <span class="text-danger">@error('petaKacheri_parent_id') {{$message}} @enderror</span>
                    </div>
    
                    
                    <div class="col-sm-4">
                     <label for="client_id">Sub Category 2</label>
                      <select name="department_id"  class="form-control department_id">
                        <option value="">ડિપાર્ટમેન્ટ સિલેક્ટ કરો</option>
                      </select>
                      <span class="text-danger">@error('department_id') {{$message}} @enderror</span>
                      <input type="hidden" name="category_id" class="category_id">
                      <input type="hidden" name="admin_id" value="{{session('LoggedUser')->id}}">
                    </div>
                    

                  </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Multiple</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Disabled Result</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>


                    <div class="card-footer container">
                       <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i>&nbsp;&nbsp;ટાસ્ક સેવ કરો</button>
                    </div>
                    
              </form>

              </div>



          </div>
        </div>


      </div>
    </section>
  </div>

  @endsection

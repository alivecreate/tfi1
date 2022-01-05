
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <ul class="navbar-nav ml-auto">        
          

      <li class="nav-item d-none d-sm-inline-block">

        <a target="_blank"  href="{{url('')}}" class="btn btn-sm btn-warning text-dark">
          <strong><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp; View Site</strong></a>
      </li>


      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link float-right">{{session('LoggedUser')->name}}</a>
      </li>


      <li class="nav-item d-none d-sm-inline-block">

          @if(session('LoggedUser')->image)
                <img src="{{url('web')}}/media/sm/{{session('LoggedUser')->image}}" 
                class="mt-1 img-circle elevation-2 object-fit-sm float-right" style="background:white;width:30px; height:30px">
          @else
            <img class="mt-1 img-circle elevation-2 object-fit-sm float-right" style="background:white;width:30px; height:30px"
             src="{{url('adm')}}/img/no-user.jpeg">
          @endif

      </li>
      
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

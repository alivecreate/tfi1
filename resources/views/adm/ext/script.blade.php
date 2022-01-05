
<script src="{{asset('js')}}/app.js"></script>
<!-- jQuery -->
<script src="{{asset('adm')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adm')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adm')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('adm')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('adm')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
{{-- <!-- <script src="{{asset('adm')}}/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="{{asset('adm')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --> --}}

<!-- jQuery Knob Chart -->
<script src="{{asset('adm')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('adm')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('adm')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adm')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('adm')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adm')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adm')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adm')}}/dist/js/demo.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <!-- <script src="{{asset('adm')}}/dist/js/pages/dashboard.js"></script> --> --}}

<script src="{{asset('adm')}}/plugins/chart.js/Chart.min.js"></script>

<script src="{{asset('adm')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{asset('adm')}}/plugins/toastr/toastr.min.js"></script>

<script src="{{asset('adm')}}/dist/js/custom.js"></script>

<script src="{{asset('adm')}}/dist/js/demo.js"></script>

{{-- <script src="{{asset('adm')}}/dist/js/pages/dashboard2.js"></script> --}}


<script src="{{asset('adm')}}/plugins/summernote/summernote-bs4.min.js"></script>

<link rel="stylesheet" href="{{asset('adm')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('adm')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <script src="{{asset('adm')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('adm')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('adm')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('adm')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script src="{{asset('adm')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{asset('adm')}}/plugins/toastr/toastr.min.js"></script>

<!-- Select2 -->
<script src="{{asset('adm')}}/plugins/select2/js/select2.full.min.js"></script>


<!-- jQuery -->
<script src="{{asset('adm')}}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('adm')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adm')}}/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="{{asset('adm')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="{{asset('adm')}}/plugins/codemirror/codemirror.js"></script>
<script src="{{asset('adm')}}/plugins/codemirror/mode/css/css.js"></script>
<script src="{{asset('adm')}}/plugins/codemirror/mode/xml/xml.js"></script>
<script src="{{asset('adm')}}/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

<script>
  $(function () {
      $('#summernote').summernote({
        tabsize: 2,
        height: 140
      });
  })  
  

  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
  
$('.btn-upload').click(function () { 
  $(this).children('i').addClass('bounce');
  $(this).addClass('color_black_red');
  
});

  // $(function() {
  //             var Toast = Swal.mixin({
  //               toast: true,
  //               position: 'top-end',
  //               showConfirmButton: false,
  //               timer: 3000
  //             });
              

  //             });
              
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  // $('body').hide();

</script>

<script>

$("body").on("click",".delField",function(){   
      $(this).parents(".image-block").remove();  
  });  

</script>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    @include('sardar.ext.head')
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php $current_page = ''; ?>

    @include('sardar.ext.header')

        

	@yield('content')


    @include('sardar.ext.footer')


    @include('sardar.ext.script')
	@yield('custom-js')

</body>

</html>
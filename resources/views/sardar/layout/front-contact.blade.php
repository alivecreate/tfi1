<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    @include('sardar.ext.head')
</head>
<body>
<?php $current_page = ''; ?>

    @include('sardar.ext.header')

        

	@yield('content')


    @include('sardar.ext.footer2')


    @include('sardar.ext.script')
	@yield('custom-js')

</body>

</html>
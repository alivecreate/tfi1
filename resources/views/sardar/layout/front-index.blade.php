<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    @include('sardar.ext.head')
</head>
<body>


    @include('sardar.ext.header')

        

	@yield('content')


    @include('sardar.ext.footer')
    @include('sardar.ext.script')
	
	@yield('custom-js')
</body>
</html>
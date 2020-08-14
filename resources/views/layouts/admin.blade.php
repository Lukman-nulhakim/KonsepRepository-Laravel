<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    @include('includes.admin.style')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('includes.admin.header')

  @include('includes.admin.sidebar')

  @yield('content')

  @include('includes.admin.footer')
</div>
<!-- ./wrapper -->

@include('includes.admin.script')
</body>
</html>

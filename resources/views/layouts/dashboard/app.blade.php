<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    @include('layouts.dashboard.header')

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
 @include('layouts.dashboard.head')
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  @include('layouts.dashboard.sidebar')

  @yield('content')


  <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('layouts.dashboard.footer')



    @include('layouts.dashboard.ascripts')

</body>
</html>

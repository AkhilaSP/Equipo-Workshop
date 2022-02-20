<!DOCTYPE html>
<html lang="en">
   <head>
   @include('includes.header')
   </head>
   <body data-topbar="light" data-layout="horizontal">
      <!-- Begin page -->
      <div id="layout-wrapper">
         <!-- ============================================================== -->
         <!-- Start Main Content here -->
         <!-- ============================================================== -->
         <div class="main-content">
            <div style="margin-top:50px">
                @yield('content')
            </div>
            <!-- END layout-wrapper -->
         </div>
      <!-- @include('includes.footer') -->
   </body>
</html>
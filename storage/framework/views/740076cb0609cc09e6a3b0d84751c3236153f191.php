<!DOCTYPE html>
<html lang="en">
   <head>
   <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </head>
   <body data-topbar="light" data-layout="horizontal">
      <!-- Begin page -->
      <div id="layout-wrapper">
         <!-- ============================================================== -->
         <!-- Start Main Content here -->
         <!-- ============================================================== -->
         <div class="main-content">
            <div style="margin-top:50px">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- END layout-wrapper -->
         </div>
      <!-- <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
   </body>
</html><?php /**PATH C:\xampp\htdocs\Workshop\resources\views/layout/layout.blade.php ENDPATH**/ ?>
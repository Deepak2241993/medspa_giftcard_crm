
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forever Medspa | Dashboard</title>



   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/fontawesome-free/css/all.min.css">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/daterangepicker/daterangepicker.css">
   <!-- iCheck for checkboxes and radio inputs -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- Bootstrap4 Duallistbox -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
   <!-- BS Stepper -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/bs-stepper/css/bs-stepper.min.css">
   <!-- dropzonejs -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/dropzone/min/dropzone.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/summernote/summernote-bs4.min.css">
     <!-- DataTables -->
     <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="<?php echo e(url('/')); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/dist/css/deepak.css">
  <link rel="stylesheet" href="<?php echo e(url('/')); ?>/dist/toastr/toastr.css">
<!-- for Font giftcardsale page -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.3.0/css/all.min.css" integrity="sha256-/4UQcSmErDzPCMAiuOiWPVVsNN2s3ZY/NsmXNcj0IFc=" crossorigin="anonymous">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php echo $__env->yieldPushContent('css'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php if (isset($component)) { $__componentOriginala1d1286e4cf0959506a555d2d7a5615acaf3f6a6 = $component; } ?>
<?php $component = App\View\Components\Topbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('topbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Topbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala1d1286e4cf0959506a555d2d7a5615acaf3f6a6)): ?>
<?php $component = $__componentOriginala1d1286e4cf0959506a555d2d7a5615acaf3f6a6; ?>
<?php unset($__componentOriginala1d1286e4cf0959506a555d2d7a5615acaf3f6a6); ?>
<?php endif; ?>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
       <?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="overflow-x: auto; overflow-y: auto; max-height: 100vh; max-width: 100%;">
 
         <?php echo $__env->yieldContent('body'); ?>
    </div>
      <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>

    <?php if (isset($component)) { $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf = $component; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf)): ?>
<?php $component = $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf; ?>
<?php unset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf); ?>
<?php endif; ?>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <?php if (isset($component)) { $__componentOriginal01aa29c467a714f2a675f33841df9680ff1af1ee = $component; } ?>
<?php $component = App\View\Components\Footerscript::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footerscript'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footerscript::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal01aa29c467a714f2a675f33841df9680ff1af1ee)): ?>
<?php $component = $__componentOriginal01aa29c467a714f2a675f33841df9680ff1af1ee; ?>
<?php unset($__componentOriginal01aa29c467a714f2a675f33841df9680ff1af1ee); ?>
<?php endif; ?>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
   
   
    <?php echo $__env->yieldPushContent('script'); ?>
    <!--end::Script-->
</body><!--end::Body-->

</html><?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/layouts/admin_layout.blade.php ENDPATH**/ ?>
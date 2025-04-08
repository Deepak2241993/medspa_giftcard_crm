
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


   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/dist/css/deepak.css">
  <link rel="stylesheet" href="<?php echo e(url('/')); ?>/dist/toastr/toastr.css">
<!-- for Font giftcardsale page -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.3.0/css/all.min.css" integrity="sha256-/4UQcSmErDzPCMAiuOiWPVVsNN2s3ZY/NsmXNcj0IFc=" crossorigin="anonymous">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.patient_top_bar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('patient_top_bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
       <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.patient_side_bar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('patient_side_bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="overflow-x: auto; overflow-y: auto; max-height: 100vh; max-width: 100%;">
 
         <?php echo $__env->yieldContent('body'); ?>
    </div>
      <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footerscript','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footerscript'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
   
   
    <?php echo $__env->yieldPushContent('script'); ?>
    <!--end::Script-->
</body><!--end::Body-->

</html><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/layouts/patient_layout.blade.php ENDPATH**/ ?>
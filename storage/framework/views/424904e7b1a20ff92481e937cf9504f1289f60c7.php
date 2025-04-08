<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title><?php echo $__env->yieldContent('title','Medspa'); ?></title>  
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords','Medspa'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('description','Medspa'); ?>">
    <meta name="Deepak Prasad" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo e(url('/medspa.png')); ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo e(url('/medspa.png')); ?>" />

       
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/giftcards/css/style.css"> 
       <!-- CSS here -->
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/meanmenu.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/animate.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/swiper.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/slick.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/magnific-popup.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/fontawesome-pro.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/spacing.css">
   <link rel="stylesheet" href="<?php echo e(url('/product_page')); ?>/css/main.css">

     <style>

         <?php echo $__env->yieldPushContent('css'); ?>;
     </style>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


</head>

<body>
 
    <!-- preloader start -->
    <div id="preloader">
       <div class="bd-loader-inner">
          <div class="bd-loader">
             <img src="<?php echo e(url('/uploads/FOREVER-MEDSPA/medspa_logo.gif')); ?>" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
          </div>
       </div>
    </div>

    <!-- END LOADER -->
	
	<!-- Start header -->
	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front_header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front_header'); ?>
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
	<!-- End header -->

	
	<!-- Start Banner -->
	<?php echo $__env->yieldContent('body'); ?>
	
	<!-- End Subscribe -->
	
	<!-- Start Footer -->
	<footer class="footer-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="footer-company-name">All Rights Reserved. &copy; <?php echo e(date('Y')); ?> <a href="#">FOREVER MEDSPA</a> Design By : <a href="https://www.thetemz.com/">TEMZ Solution Pvt.Ltd</a></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

	<!-- ALL JS FILES -->
    <script src="<?php echo e(url('/product_page')); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/waypoints.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/meanmenu.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/swiper.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/slick.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/magnific-popup.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/counterup.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/wow.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/ajax-form.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/beforeafter.jquery-1.0.0.min.js"></script>
    <script src="<?php echo e(url('/product_page')); ?>/js/main.js"></script>
    <script src="<?php echo e(url('/')); ?>/giftcards/js/custom.js"></script>
    

<?php echo $__env->yieldPushContent('footerscript'); ?>
</body>
</html><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/layouts/front_product.blade.php ENDPATH**/ ?>
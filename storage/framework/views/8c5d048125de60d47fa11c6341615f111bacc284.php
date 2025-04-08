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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/giftcards/css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/giftcards/css/pogo-slider.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/giftcards/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/giftcards/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/giftcards/css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('/medspa.png')); ?>">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<style>
@media (max-width: 767px) {
 .navbar-brand img {
  width: 180px;
  margin-left: 25px;
}
}

</style>

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
    
    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <div class="box"></div>
            <div class="box"></div>
        </div>
    </div><!-- end loader -->


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="<?php echo e(url('/')); ?>/giftcards/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
 <!--   <script src="<?php echo e(url('/')); ?>/giftcards/js/jquery.pogo-slider.min.js"></script> -->
	<!--<script src="<?php echo e(url('/')); ?>/giftcards/js/slider-index.js"></script>-->
    <script src="<?php echo e(url('/')); ?>/giftcards/js/custom.js"></script>

<?php echo $__env->yieldPushContent('footerscript'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/layouts/front-master.blade.php ENDPATH**/ ?>
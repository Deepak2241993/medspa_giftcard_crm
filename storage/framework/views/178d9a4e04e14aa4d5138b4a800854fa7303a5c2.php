<!-- JAVASCRIPT -->
<?php if(route('email-template.create')!=url()->current() && Request::segment(2)!='email-template'): ?>
{
<script src="<?php echo e(URL::asset('/assets/libs/jquery/jquery.min.js')); ?>"></script> 
}
<?php endif; ?>

<script src="<?php echo e(URL::asset('/assets/libs/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/metismenu/metismenu.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/node-waves/node-waves.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/feather-icons/feather-icons.min.js')); ?>"></script>
<!-- pace js -->
<script src="<?php echo e(URL::asset('assets/libs/pace-js/pace-js.min.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->yieldContent('script-bottom'); ?>

<?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>
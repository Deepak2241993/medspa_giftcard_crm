<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Error_404'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5 pt-5">
                        <h1 class="error-title mt-5"><span>404!</span></h1>
                        <h4 class="text-uppercase mt-5">Sorry, badge text-bg-success</h4>
                        <p class="font-size-15 mx-auto text-muted w-50 mt-4">It will be as simple as Occidental in fact, it will Occidental to an English person</p>
                        <div class="mt-5 text-center">
                            <a  class="btn btn-block btn-outline-primary waves-effect waves-light" href="index">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>
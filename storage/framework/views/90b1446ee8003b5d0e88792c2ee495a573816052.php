<?php $__env->startSection('body'); ?>
       <!-- Content Header (Page header) -->
       <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('root')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
            <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                        <a href="<?php echo e(route('cardgenerated-list')); ?>">
                            <div class="info-box-content">
                                <span class="info-box-text">All Giftcard Transaction</span>
                                <span class="info-box-number">
                                <?php echo e($alltransaction); ?>

                                
                                </span>
                            </div>
                        </a>
                        <!-- /.info-box-content -->
                    </div>
                        <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo e(route('cardgenerated-list')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Transaction Success</span>
                        <span class="info-box-number"><?php echo e($successTransaction); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('cardgenerated-list')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Failed Transaction</span>
                        <span class="info-box-number"><?php echo e($faildTransaction); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('cardgenerated-list')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa fa-refresh"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Under Process</span>
                        <span class="info-box-number"><?php echo e($processingTransaction); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('cardgenerated-list')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fas fa-file-invoice"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> Redeem & Check Balance</span>
                        <span class="info-box-number"><?php echo e($cardnumbers); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('coupon.index')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fa fa-barcode"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">  View Coupon</span>
                        <span class="info-box-number"><?php echo e($giftCoupon); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('category.index')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fas fa-file-invoice"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">  View Deals</span>
                        <span class="info-box-number"><?php echo e($ProductCategory); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('product.index')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fa fa-medkit"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">View service</span>
                        <span class="info-box-number"><?php echo e($Product); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                <a href="#">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="nav-icon fa fa-user" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">All User</span>
                        <span class="info-box-number"><?php echo e($user); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('keywords_reports')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><i class="fa fa-keyboard"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Keyword Search</span>
                        <span class="info-box-number"><?php echo e($search_keyword); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('service-order-history.index')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-user-md" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Service Purchases</span>
                        <span class="info-box-number"><?php echo e($TotalServiceSale); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php echo e(route('cancel-service')); ?>">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-times" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cancel Service</span>
                        <span class="info-box-number"><?php echo e($cancel_deals); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
                </div>
                
                <!-- /.col -->
                </div>
                
                <!-- /.col -->
                </div>
            </div>
        </section>

    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/admin/admin_dashboad.blade.php ENDPATH**/ ?>
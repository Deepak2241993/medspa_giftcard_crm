<?php $__env->startSection('body'); ?>
    <!-- Body main wrapper start -->
    <!-- Your existing content in invoice.blade.php -->
   
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-4">
                        <h3 class="mb-0">Invoice Details</h3>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                               Invoice
                            </li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
    <!-- Include the service_invoice.blade.php file here -->
    <?php echo $__env->make('invoice.service_invoice', ['transaction_data' => $transaction_data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
    <!-- Rest of your content in invoice.blade.php -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/admin/cart/invoice.blade.php ENDPATH**/ ?>
<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h3 class="mb-0">Email Template Design</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(url('admin-dashboard')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Email Template Design
                            </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content-header">

        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="card-body p-4">
                    <form method="post" action="<?php echo e(route('resendmail')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label for="title" class="form-label">Name</label>
                                <input class="form-control" type="text" name="recipient_name"
                                    value="<?php echo e(isset($mail_data) && $mail_data->recipient_name ? $mail_data->recipient_name : $mail_data->your_name); ?>"
                                    placeholder="To">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="title" class="form-label">To</label>
                                <input class="form-control" type="text" name="gift_send_to"
                                    value="<?php echo e(isset($mail_data) ? $mail_data->gift_send_to : ''); ?>" placeholder="To">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="title" class="form-label">CC</label>
                                <input class="form-control" type="text" name="cc"
                                    value="<?php echo e(isset($mail_data) && $mail_data->recipient_name != '' ? $mail_data->receipt_email : ''); ?>"
                                    placeholder="Cc">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="title" class="form-label">Bcc</label>
                                <input class="form-control" type="text" name="bcc"
                                    value="<?php echo e(isset($mail_data) ? $mail_data->title : ''); ?>" placeholder="Bcc">
                            </div>


                            <div class="mb-3 col-lg-12">
                                <label for="amount" class="form-label">Message</label>

                                <textarea readonly name="message" id="summernote" cols="30" rows="10" readonly><?php echo $__env->make('email.resedgiftcard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </textarea>

                            </div>
                            <div class="mb-3 col-lg-10">
                                <BUTTON  class="btn btn-block btn-outline-primary">Send</BUTTON>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 420,
            toolbar: false // Hide toolbar

        });
        $('#summernote').summernote('disable');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/email/email_template_view.blade.php ENDPATH**/ ?>
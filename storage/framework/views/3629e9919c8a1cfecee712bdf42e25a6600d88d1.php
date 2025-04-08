<?php $__env->startSection('body'); ?>
    <style>
        .scroll-container {
            width: 100%;
            /* Set the width of the container */
            overflow-x: auto;
            /* Enable horizontal scrolling */
            white-space: nowrap;
            /* Make sure all elements are in one line */
        }

        .scroll-content {
            display: inline-block;
            /* Make sure content stays in one line */
            /* Optionally set a min-width to prevent content from squishing */
            min-width: 100%;
            /* Set to the width of your content */
        }

        .swal-text {
            font-size: 21px;
            position: relative;
            float: none;
            line-height: normal;
            vertical-align: top;
            text-align: left;
            display: inline-block;
            margin: 0;
            padding: 0 10px;
            font-weight: 700;
            color: #0e0e0f;
            /* max-width: calc(100% - 20px); */
            /* overflow-wrap: break-word; */
            box-sizing: border-box;
        }
    </style>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="mb-0">My Giftcards</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('admin-dashboard')); ?>">Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Giftcards
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
            <section class="content">
                <div class="container-fluid">

                    <!--begin::Row-->
                    
                    <div class="card-header">
                        <?php if(session()->has('error')): ?>
                            <p class="text-danger"> <?php echo e(session()->get('error')); ?></p>
                        <?php endif; ?>
                        <?php if(session()->has('success')): ?>
                            <p class="text-success"> <?php echo e(session()->get('success')); ?></p>
                        <?php endif; ?>
                    </div>
                    <span class="text-success"id="response_msg"></span>


                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-received-tab" data-toggle="pill"
                                            href="#custom-tabs-three-home" role="tab"
                                            aria-controls="custom-tabs-three-home" aria-selected="true">My
                                            Giftcard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-send-tab" data-toggle="pill"
                                            href="#custom-tabs-three-profile" role="tab"
                                            aria-controls="custom-tabs-three-profile" aria-selected="false">Send</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="scroll-container">
                                    <div style="overflow: scroll">
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-three-home"
                                                role="tabpanel" aria-labelledby="custom-tabs-three-received-tab">
                                                <?php if($mygiftcards->count()): ?>
                                                    <table id="datatable-buttons"
                                                        class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Giftcard Number</th>
                                                                <th>Giftcard History</th>
                                                                <th>Generated Date & Time</th>
                                                                <th>Sender Name</th>
                                                                <th>Message</th>
                                                                
                                                                <th>Coupon Code</th>
                                                                <th>Qty</th>
                                                                <th>Giftcard Value</th>
                                                                <th>Discount</th>
                                                                <th>Paid Amount</th>
                                                                <th>Payment Status</th>
                                                                <th>Transaction Id</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="data-table-body">
                                                            <?php $__currentLoopData = $mygiftcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($loop->iteration); ?></td>
                                                                    <td>
                                                                        <a type="button"
                                                                            class="btn btn-block btn-outline-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop_<?php echo e($value['id']); ?>"
                                                                            onclick="cardview(<?php echo e($value['id']); ?>,'<?php echo e($value['transaction_id']); ?>')">
                                                                            View
                                                                        </a>

                                                                    </td>
                                                                    <td>
                                                                        <a type="button"
                                                                            class="btn btn-block btn-outline-dark"
                                                                            href="<?php echo e(route('giftcards-statement', $value['id'])); ?>">
                                                                            History
                                                                        </a>

                                                                    </td>
                                                                    <td><?php echo date('m-d-Y h:i:A', strtotime($value['created_at'])); ?></td>
                                                                   
                                                                    <td>
                                                                        <?php if($value['gift_send_to'] == $value['receipt_email']): ?>
                                                                           Self
                                                                        <?php elseif($value['gift_send_to'] != $value['receipt_email']): ?>
                                                                            <?php echo e($value['your_name']); ?>

                                                                        <?php else: ?>{
                                                                            {<?php echo "<span class='badge bg-primary'>".$value['your_name']."</span>"; ?>}
                                                                        }
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?php echo e($value['recipient_name'] ? $value['message'] : '---'); ?>

                                                                    </td>
                                                                    
                                                                    <td class="text-uppercase">
                                                                        <?php echo e($value['coupon_code'] ? $value['coupon_code'] : '----'); ?>

                                                                    </td>
                                                                    <td><?php echo e($value['qty'] ? $value['qty'] : '----'); ?></td>
                                                                    <td><?php echo e($value['amount'] ? '$' . $value['amount'] : '$ 0'); ?>

                                                                    </td>
                                                                    <td><?php echo e($value['discount'] ? '$' . $value['discount'] : '$ 0'); ?>

                                                                    </td>
                                                                    <td><?php echo e($value['transaction_amount'] ? '$' . $value['transaction_amount'] : '$ 0'); ?>

                                                                    </td>

                                                                    <td>
                                                                        <?php if($value['payment_status'] == 'succeeded'): ?>
                                                                            <span
                                                                                class="badge bg-success"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                        <?php elseif($value['payment_status'] == 'processing'): ?>
                                                                            <span
                                                                                class="badge bg-primary"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                        <?php elseif($value['payment_status'] == 'amount_capturable_updated'): ?>
                                                                            <span
                                                                                class="badge bg-warning"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                        <?php elseif($value['payment_status'] == 'payment_failed'): ?>
                                                                            <span
                                                                                class="badge bg-danger"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                        <?php else: ?>
                                                                            <span class="badge bg-danger">Incompleted</span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?php echo e($value['transaction_id']); ?></td>





                                                                    <!-- Button trigger modal -->
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <br>
                                                            <?php echo e($mygiftcards->links()); ?>

                                                        </tbody>
                                                    </table>
                                                    <?php echo e($mygiftcards->links()); ?>

                                                <?php else: ?>
                                                    <hr>
                                                    <p> No data found</p>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-send-tab">
                                                <?php if($sendgiftcards->count()): ?>
                                                <table id="datatable-buttons"
                                                    class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Giftcard Number</th>
                                                            <th>Giftcard History</th>
                                                            <th>Generated Date & Time</th>
                                                            <th>Sent to</th>
                                                            <th>Message</th>
                                                            
                                                            <th>Coupon Code</th>
                                                            <th>Qty</th>
                                                            <th>Giftcard Value</th>
                                                            <th>Discount</th>
                                                            <th>Paid Amount</th>
                                                            <th>Payment Status</th>
                                                            <th>Transaction Id</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="data-table-body">
                                                        <?php $__currentLoopData = $sendgiftcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($loop->iteration); ?></td>
                                                                <td>
                                                                    <a type="button"
                                                                        class="btn btn-block btn-outline-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#staticBackdrop_<?php echo e($value['id']); ?>"
                                                                        onclick="cardview(<?php echo e($value['id']); ?>,'<?php echo e($value['transaction_id']); ?>')">
                                                                        View
                                                                    </a>

                                                                </td>
                                                                <td>
                                                                    <a type="button"
                                                                        class="btn btn-block btn-outline-dark"
                                                                        href="<?php echo e(route('giftcards-statement', $value['id'])); ?>">
                                                                        History
                                                                    </a>

                                                                </td>
                                                                <td><?php echo date('m-d-Y h:i:A', strtotime($value['created_at'])); ?></td>
                                                                </td>
                                                                <td>
                                                                    
                                                                        <?php if($value['recipient_name'] != null && ($value['gift_send_to'] != $value['receipt_email'])): ?>
                                                                            <?php echo e($value['recipient_name']); ?>

                                                                        <?php else: ?>{
                                                                            {<?php echo "<span class='badge bg-primary'>".$value['your_name']."</span>"; ?>}
                                                                        }
                                                                        <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($value['recipient_name'] ? $value['message'] : '---'); ?>

                                                                </td>
                                                                
                                                                <td class="text-uppercase">
                                                                    <?php echo e($value['coupon_code'] ? $value['coupon_code'] : '----'); ?>

                                                                </td>
                                                                <td><?php echo e($value['qty'] ? $value['qty'] : '----'); ?></td>
                                                                <td><?php echo e($value['amount'] ? '$' . $value['amount'] : '$ 0'); ?>

                                                                </td>
                                                                <td><?php echo e($value['discount'] ? '$' . $value['discount'] : '$ 0'); ?>

                                                                </td>
                                                                <td><?php echo e($value['transaction_amount'] ? '$' . $value['transaction_amount'] : '$ 0'); ?>

                                                                </td>

                                                                <td>
                                                                    <?php if($value['payment_status'] == 'succeeded'): ?>
                                                                        <span
                                                                            class="badge bg-success"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                    <?php elseif($value['payment_status'] == 'processing'): ?>
                                                                        <span
                                                                            class="badge bg-primary"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                    <?php elseif($value['payment_status'] == 'amount_capturable_updated'): ?>
                                                                        <span
                                                                            class="badge bg-warning"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                    <?php elseif($value['payment_status'] == 'payment_failed'): ?>
                                                                        <span
                                                                            class="badge bg-danger"><?php echo e(ucFirst($value['payment_status'])); ?></span>
                                                                    <?php else: ?>
                                                                        <span class="badge bg-danger">Incompleted</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($value['transaction_id']); ?></td>





                                                                <!-- Button trigger modal -->
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <br>
                                                        <?php echo e($sendgiftcards->links()); ?>

                                                    </tbody>
                                                </table>
                                                <?php echo e($sendgiftcards->links()); ?>

                                            <?php else: ?>
                                                <hr>
                                                <p> No data found</p>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </section>
        </div>
        <!--end::Container-->
    </section>
    <!-- for Show Gift card Number Modal -->
    <div class="modal fade deepak" id="staticBackdrop_" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Gift Card Number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2 id="giftcardsshow"></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        //  Giftcard View Modal Code
        function cardview(id, tid) {
            $('.deepak').attr('id', 'staticBackdrop_' + id);
            $('#staticBackdrop_' + id).modal('show');

            $.ajax({
                url: '<?php echo e(route('cardview-route')); ?>',
                method: "post",
                dataType: "json",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    tid: tid,
                    user_token: '<?php echo e(Auth::guard('patient')->user()->user_token); ?>',
                },
                success: function(response) {
                    if (response.success) {
                        $('#giftcardsshow').empty();
                        $.each(response.result, function(index, element) {
                            // Create a new element with the giftnumber
                            var newElement = $('<div>').html(element.giftnumber);

                            // Append the new element to #giftcardsshow
                            $('#giftcardsshow').append(newElement);
                        });

                    }
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.patient_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/patient/giftcards/my-giftcards.blade.php ENDPATH**/ ?>
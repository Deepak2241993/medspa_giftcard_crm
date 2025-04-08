<?php $__env->startSection('body'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="mb-0">Service Order History</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Service Order History
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="app-main">

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">

            
            
            <!--begin::Row-->
            
            <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#">#</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order Number">Order Number</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Invoice">Invoice</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Full Name">Full Name</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Email">Email</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Phone">Phone</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="City">City</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Country">Country</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Transaction Id">Transaction Id</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Total Amount">Total Amount</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Transaction Amount">Transaction Amount</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Gift Card Use">Gift Card Use</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Payment Status">Payment Status</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Transaction Status">Transaction Status</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Created Date & Time">Created Date & Time</th>
                    </tr>
                </thead>

                <tbody id="data-table-body">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                               
                                <?php echo e($value->order_id); ?>

                               
                            </td>
                            <td>
                             
                                <?php if(!empty($value->payment_intent && $value->payment_status == 'paid')): ?>
                                <a  class="btn btn-block btn-outline-success"
                                    href="<?php echo e(route('service-invoice', ['transaction_data' => $value->id])); ?>">
                                    Invoice
                                </a>
                                <?php elseif($value->payment_status == 'under_process'): ?>
                                <a  class="btn btn-block btn-outline-primary"
                                    href="<?php echo e(route('service-invoice', ['transaction_data' => $value->id])); ?>">
                                    Invoice
                                </a>
                                <?php else: ?>
                                <span class="text-danger">No Payment</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($value->fname . " " . $value->lname); ?></td>
                            <td><?php echo e($value->email); ?></td>
                            <td><?php echo e($value->phone); ?></td>
                            <td><?php echo e($value->city); ?></td>
                            <td><?php echo e($value->country); ?></td>
                            <td><?php echo e($value->payment_intent); ?></td>
                            <td>$<?php echo e(number_format($value->final_amount, 2)); ?></td>
                            <td>$<?php echo e(number_format($value->transaction_amount, 2)); ?></td>
                            <td><?php echo e($value->gift_card_applyed ? 'Yes' : 'No'); ?>

                            </td>
                            <td>
                                <span
                                    class="badge bg-<?php echo e($value->payment_status == 'paid' ? 'success' : 'danger'); ?>">
                                    <?php echo e(ucfirst($value->payment_status)); ?>

                                </span>
                                <?php if($value->payment_status == 'under_process'): ?>
                                <a href="#">
                                    <span class="badge bg-warning" data-bs-toggle="modal"
                                        data-bs-target="#paymentUpdate_<?php echo e($value['id']); ?>"
                                        onclick="modalopen(<?php echo e($value['id']); ?>, '<?php echo e($value['order_id']); ?>')">Update
                                        Status</span>
                                </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span
                                    class="badge bg-<?php echo e($value->transaction_status == 'complete' ? 'success' : 'danger'); ?>">
                                    <?php echo e(ucfirst($value->transaction_status)); ?>

                                </span>
                            </td>
                            <td><?php echo e(date('m-d-Y h:i:s', strtotime($value->updated_at))); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

           
            <!--end::Row-->
            <!-- /.Start col -->
        </div>
        <!-- /.row (main row) -->
    </div>
    <!--end::Container-->
</section>

<!-- for Show Service Order Modal -->
<div class="modal fade deepak" id="staticBackdrop_" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">All Services </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h2 id="giftcardsshow"></h2>
            </div>
            <div class="modal-footer">
               <button type="button"  class="btn btn-block btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade paymentUpdate" id="paymentUpdate_" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="paymentstatus" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="paymentstatus">Payment Status Update</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?php echo e(route('service-order-update')); ?>">
                <?php echo csrf_field(); ?>
                <div style="display: flex; flex-direction: column;">
                    <label for="transaction_id_" style="margin-right: 10px;">Transaction id:</label>
                    <input class="transaction_id form-control" type="text" id="transaction_id_" name="order_id"
                        value="" style="margin-right: 20px;" readonly>

                    <label for="payment_status_" style="margin-right: 10px;">Update Status</label>
                    <select name="payment_status" class="form-control status_id" id="payment_status_">
                        <option value="">Select Status</option>
                        <option value="paid" selected>Success</option>
                        <option value="fail">Fail</option>
                    </select>

                    <label for="comments_" style="margin-right: 10px;">Comments</label>
                    <textarea class="form-control comments_" name="comments" id="comments_" style="margin-right: 20px;"></textarea>

                    <input type="hidden" class="user_token" name="user_token"
                        value="<?php echo e(Auth::user()->user_token); ?>">
                    <input type="hidden" class="gift_id" id="gift_id_" name="id" value="">

                    <button type="submit"  class="btn btn-block btn-outline-primary mt-3 paymentstatusbutton" id="paymentstatusbutton"
                        gift_id="gift_id_" onclick="updatestatus(event)"><span
                            class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                            style="display: none;"></span>Update</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
           <button type="button"  class="btn btn-block btn-default" data-dismiss="modal">Close</button>
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
// For Modal
        function modalopen(id, transaction_id) {
            $('#paymentUpdate_').attr('id', 'paymentUpdate_' + id);
            $('#transaction_id_').attr('id', 'transaction_id_' + id).val();
            $('#transaction_id_' + id).val(transaction_id);
            $('#payment_status_').attr('id', 'payment_status_' + id).val();
            $('.paymentstatusbutton').attr('id', 'paymentstatusbutton_' + id).val();
            $('.paymentstatusbutton').attr('gift_id', id).val();
            $('#comments_').attr('id', 'comments_' + id).val();
            $('#paymentUpdate_' + id).modal('show');
        }
        function OrderView(id, order_id) {
            $('.deepak').attr('id', 'staticBackdrop_' + id);
            $('#staticBackdrop_' + id).modal('show');

            $.ajax({
                url: '<?php echo e(route('order-search')); ?>',
                method: "post",
                dataType: "json",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    order_id: order_id,
                    email: "",
                    phone: "",
                    user_token: '<?php echo e(Auth::user()->user_token); ?>',
                },
                success: function (response) {
                    if (response.success) {
                        // Clear previous table content
                        $('#giftcardsshow').empty();

                        // Create table structure
                        var table = $('<table class="table table-bordered table-striped">');
                        var thead = $('<thead>').html(
                            '<tr>' +
                            '<th>#</th>' +
                            '<th>Product Name</th>' +
                            '<th>Total Session</th>' +
                            '</tr>'
                        );
                        var tbody = $('<tbody>');

                        // Append header to the table
                        table.append(thead);

                        // Loop through the response result array
                        $.each(response.result, function (index, element) {
                            // Create a new row for each element
                            var row = $('<tr>').html(
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + element.product_name + '</td>' +
                                '<td>' + element.number_of_session + '</td>'
                            );
                            // Append the row to the tbody
                            tbody.append(row);
                        });

                        // Append tbody to the table
                        table.append(tbody);

                        // Append the table to #giftcardsshow
                        $('#giftcardsshow').append(table);
                    } else {
                        // Handle the case when the response is not successful
                        $('#giftcardsshow').html('<p>No services found.</p>');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    $('#giftcardsshow').html('<p>An error occurred. Please try again later.</p>');
                }
            });


        }
//  For Seacrh Function 

    </script>

    
    <script>
        $(function () {
          $("#datatable-buttons").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/gift/order_history.blade.php ENDPATH**/ ?>
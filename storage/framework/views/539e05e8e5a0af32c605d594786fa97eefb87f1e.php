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

            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Search Data</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="fname" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                placeholder="First Name" onkeyup="SearchView()">
                        </div>
                        <div class="col-md-3">
                            <label for="lname" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="lname"
                                placeholder="Last Name" onkeyup="SearchView()">
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" 
                                placeholder="Enter Email" onkeyup="SearchView()">
                        </div>
                    </div>
                </div>
            </div>
            
            <!--begin::Row-->
            <?php echo e($data->onEachSide(5)->links()); ?>

            <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Invoice</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Transaction Id</th>
                        <th>Total Amount</th>
                        <th>Transaction Amount</th>
                        <th>Gift Card Use</th>
                        <th>Payment Status</th>
                        <th>Transaction Status</th>
                        <th>Created Date & Time</th>
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
                             
                                <?php if(!empty($value->payment_intent)): ?>
                                <a  class="btn btn-block btn-outline-warning"
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

            <?php echo e($data->onEachSide(5)->links()); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
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
function SearchView() {
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();

    $.ajax({
        url: '<?php echo e(route('search-order-api')); ?>', // API endpoint
        method: "GET",
        dataType: "json",
        data: {
            fname: fname,
            lname: lname,
            email: email,
        },
        success: function(response) {
            if (response.status === 'success') {
                var tableBody = $('#data-table-body'); // ID of your table body
                tableBody.empty(); // Clear existing rows

                // Loop through the response data and populate the table
                $.each(response.data.data, function(key, value) {
                    var updatedDate = new Date(value.updated_at).toLocaleString('en-US', {
                        month: '2-digit',
                        day: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    });

                    tableBody.append(`
                        <tr>
                            <td>${key + 1}</td>
                            <td>${value.order_id}</td>
                            <td>
                                ${
                                    value.payment_intent
                                        ? `<a class="btn btn-block btn-outline-warning" href="<?php echo e(url('service-invoice')); ?>/${value.id}">Invoice</a>`
                                        : `<span class="text-danger">No Payment</span>`
                                }
                            </td>
                            <td>${value.fname} ${value.lname}</td>
                            <td>${value.email}</td>
                            <td>${value.phone}</td>
                            <td>${value.city}</td>
                            <td>${value.country}</td>
                            <td>${value.payment_intent || ''}</td>
                            <td>$${parseFloat(value.final_amount).toFixed(2)}</td>
                            <td>$${parseFloat(value.transaction_amount).toFixed(2)}</td>
                            <td>${value.gift_card_applyed ? 'Yes' : 'No'}</td>
                            <td>
                                <span class="badge bg-${value.payment_status === 'paid' ? 'success' : 'danger'}">
                                    ${value.payment_status.charAt(0).toUpperCase() + value.payment_status.slice(1)}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-${value.transaction_status === 'complete' ? 'success' : 'danger'}">
                                    ${value.transaction_status.charAt(0).toUpperCase() + value.transaction_status.slice(1)}
                                </span>
                            </td>
                            <td>${updatedDate}</td>
                        </tr>
                    `);
                });
            } else {
                alert(response.message || 'No results found.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            alert('An error occurred while fetching data.');
        }
    });
}
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/gift/order_history.blade.php ENDPATH**/ ?>
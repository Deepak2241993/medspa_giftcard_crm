<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="mb-0">Giftcard Redeem History</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(url('admin-dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Giftcard Redeem History
                        </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content-header">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"> History By Card number</h4>
        </div>
        <div class="card-body">
            <div class="row align-items-end">
                <!-- Service Search Form -->
                <div class="col-md-8">
                        <div class="mb-0">
                            <label for="service_name" class="form-label">Search by Service Name:</label>
                            <select name="giftnumber" id="giftnumber" class="form-control" required onchange="Statment(this.value)">
                                <option value="">Select Giftcard Number</option>
                                <?php $__currentLoopData = $giftcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->giftnumber); ?>"><?php echo e($value->giftnumber); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                                 
                        </div>
                </div>               
            </div>
        </div>
    </div>
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <?php if($giftcards->count()): ?>
            <div class="table-responsive">
                <table class="statment_view table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Sl No.</th>
                            <th scope="col">Transaction Number</th>
                            <th scope="col">Card Number</th>
                            <th scope="col">Date</th>
                            <th scope="col">Message</th>
                            <th scope="col">Value Amount</th>
                            <th scope="col">Actual Paid Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($value->transaction_id); ?></td>
                            <td><?php echo e($value->giftnumber); ?></td>
                            <td><?php echo e(date('m-d-Y',strtotime($value->updated_at))); ?></td>
                            <td><?php echo e($value->comments ? $value->comments : 'Self'); ?></td>
                            <td>$<?php echo e($value->amount); ?></td>
                            <td>$<?php echo e($value->actual_paid_amount); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table-secondary">
                            <td colspan="5"></td>
                            <td><b><u>Available Amount</u></b></td>
                            <td><b><u>Refund</u></b></td>
                        </tr>
                        <tr class="table-primary">
                            <td colspan="5"></td>
                            <td><b><?php echo e("$".$totalAmount); ?></b></td>
                            <td><b><?php echo e("$".$actual_paid_amount); ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <hr>
            <p class="text-danger">No Data Found</p>
        <?php endif; ?>
        
            <!--end::Row-->               
                <!-- /.Start col -->
        </div>
</section>

  
    <div class="modal fade Statment" id="Statment_" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Gift Card History</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <table class="statment_view table table-striped"></table>
                    <b><span class="text-danger">*</span>Any Transaction Number starting with the prefix "CANCEL", denotes the particular Giftcard has been cancelled and is inactive henceforth</b>
                </div>
                <div class="modal-footer">
                   <button type="button"  class="btn btn-block btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  <?php $__env->stopSection(); ?>

  <?php $__env->startPush('script'); ?>
      
<script>
    function Statment(giftcardnumber){
       $.ajax({
        url: '<?php echo e(route('giftcardstatment')); ?>',
        method: "post",
        dataType: "json",
        data: {
            _token: '<?php echo e(csrf_token()); ?>',
            gift_card_number: giftcardnumber,
            user_token: '<?php echo e(Auth::guard('patient')->user()->user_token); ?>',
        },
        success: function(response) {
    console.log(response);
    if(response.status == 200) {
        $('.statment_view').empty();
        // Create the table header
        var tableHeader = `
            <tr style="background-color:#212529;color:#ffff">
                <th>Sl No.</th>
                <th>Transaction Number</th>
                <th>Card Number</th>
                <th>Date</th>
                <th>Message</th>
                <th>Value Amount</th>
                <th>Actual Paid Amount</th>
            </tr>
        `;
        // Append the table header to statment_view
        $('.statment_view').append(tableHeader);

        // Iterate over each element in the response.result array
        $.each(response.result, function(index, element) {
    // Parse the date string into a JavaScript Date object
    var date = new Date(element.updated_at);
    
    // Format the date components
    var formattedDate = (date.getMonth() + 1) + '-' + date.getDate() + '-' + date.getFullYear();

    // Create a new row for each element
    var newRow = `
        <tr>
            <td>${index + 1}</td>
            <td>${element.transaction_id}</td>
            <td>${element.giftnumber}</td>
            <td>${formattedDate}</td>
            <td>${element.comments ? element.comments : 'Self'}</td>
            <td>$${element.amount}</td>
            <td>$${element.actual_paid_amount}</td>
        </tr>
    `;

    // Append the new row to the element with class "statment_view"
    $('.statment_view').append(newRow);
});

        var totalamount = `
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b><u>Available Amount</u></b></td>
            <td><b><u>Refund</u></b></td>
        </tr>
                <tr style="border-color:#7abaff; background-color:#b8daff;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>$${response.TotalAmount}</b></td>
                    <td><b>$${response.actual_paid_amount}</b></td>
                </tr>
            `;
            $('.statment_view').append(totalamount);
    } else {
        $('#Statment_' + id).modal('show');
        $('.statment_view').html(response.error);
    }
}

    });
    }


    </script>
    
  <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.patient_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/patient/giftcards/redeem_statement.blade.php ENDPATH**/ ?>
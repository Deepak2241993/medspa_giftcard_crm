<?php $__env->startSection('body'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Program</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/root')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">All Program</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content-header">
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <section class="content">
            <div class="container-fluid">
                <!--begin::Row-->
                
                <div class="card-header">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = explode(' ', session('error')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                

                </div>
                <span class="text-success" id="response_msg"></span>
                <div class="scroll-container">
                    <div style="overflow: scroll">
                        

                        <table id="datatable-buttons" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Program Name</th>
                                    <th>Unit Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php if(count($data)>0): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a class="btn btn-block btn-outline-warning" onclick="addcart(<?php echo e($value['id']); ?>)">Buy</a>
                                        <a href="<?php echo e(route('program.edit',$value->id)); ?>"
                                             class="btn btn-block btn-outline-primary mb-2">Edit</a>
                                        <form
                                            action="<?php echo e(route('program.destroy',$value->id)); ?>"
                                            method="POST">
                                            <?php echo method_field('DELETE'); ?>
                                            
                                              <?php echo csrf_field(); ?>
                                            <button  class="btn btn-block btn-outline-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                    <td><?php echo e($value->program_name); ?></td>
                                    <td>
                                        <ul>
                                            <?php
                                                $unit_id = explode('|', $value->unit_id);
                                                foreach ($unit_id as $unit) {
                                                    $unit_data = \App\Models\ServiceUnit::find($unit);
                                                    if ($unit_data) {
                                                        echo "<li>" . ($unit_data->product_name) . "</li>";
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <?php if($value->status==1): ?>
                                        <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                        <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                      </td>
                                 
                                
                                    <!-- Button trigger modal -->
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="6"><h3>No Program Available</h3></td>
                                </tr>
                                
                                <?php endif; ?>
                                
                                <br>
                                <?php echo e($data->links()); ?>

                            </tbody>
                        </table>
                        <?php echo e($data->links()); ?>



                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
    </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    function addcart(id) {
        $.ajax({
            url: '<?php echo e(route('cart')); ?>',
            method: "post",
            dataType: "json",
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                program_id: id,
                quantity: 1,
                type: "program"
            },
            success: function(response) {
                if (response.success) {
                    location.href = "<?php echo e(route('service-cart')); ?>";
                } else {
                    $('.showbalance').html(response.error).show();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error here
                $('.showbalance').html('An error occurred. Please try again.').show();
            }
        });
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/admin/program/index.blade.php ENDPATH**/ ?>
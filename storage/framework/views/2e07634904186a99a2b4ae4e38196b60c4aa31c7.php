<?php $__env->startSection('body'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Program Create/Update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/root')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Program Create/Update</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">

        <!--begin::App Content Header-->
        <?php if($errors->has('image')): ?>
            <div class="alert alert-danger">
                <?php echo e($errors->first('image')); ?>

            </div>
        <?php endif; ?>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="card-body p-4">
                    <?php if(isset($program)): ?>
                        <form method="post" action="<?php echo e(route('program.update', $program->id)); ?>"
                            enctype="multipart/form-data">
                            <?php echo method_field('PUT'); ?>
                        <?php else: ?>
                            <form method="post" action="<?php echo e(route('program.store')); ?>" enctype="multipart/form-data">
                    <?php endif; ?>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <!-- Title -->
                        <div class="mb-3 col-lg-6">
                            <label for="title" class="form-label">Program Name</label>
                            <input class="form-control" type="text" name="program_name"
                                value="<?php echo e(isset($program) ? $program->program_name : ''); ?>" placeholder="Program Name">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label for="title" class="form-label">Program Description</label>
                            <textarea class="form-control summernote" name="description"> <?php echo e(isset($program) ? $program->description : ''); ?> </textarea>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Unit</label>
                                <select class="select2bs4" multiple="multiple" name="unit_id[]" data-placeholder="Select Multiple Units"
                                        style="width: 100%;" required>
                                    <?php if($units): ?>
                                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"
                                                
                                                <?php if(isset($selectedUnits) && in_array($value->id, $selectedUnits)): ?> selected <?php endif; ?>>
                                                <?php echo e($value->product_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <option>No Unit Found</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div class="mb-3 col-lg-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1"
                                    <?php echo e(isset($program->status) && $program->status == 1 ? 'selected' : ''); ?>>Active</option>
                                <option value="0"
                                    <?php echo e(isset($program->status) && $program->status == 0 ? 'selected' : ''); ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <button class="btn btn-block btn-outline-primary form_submit" type="submit"
                                name="submit">Submit</button>
                        </div>

                        </select>
                    </div>



                </div>
                </form>
            </div>
            <!--end::Row-->
            <!-- /.Start col -->
        </div>
        <!-- /.row (section row) -->
        </div>
        <!--end::Container-->
        </div>
        <!--end::App Content-->
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Set height of the editor
                width: 860, // Set width of the editor
                focus: true, // Focus the editor on load
                fontSizes: ['8', '9', '10', '11', '12', '14', '18', '22', '24', '36', '48', '64', '82',
                    '150'
                ], // Font sizes
                toolbar: [
                    ['undo', ['undo']],
                    ['redo', ['redo']],
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'paragraph']],
                    ['insert', ['picture', 'link']] // Add picture button for image upload
                    // ['para', ['ul','ol', 'paragraph']],
                ],
                popover: {
                    image: [
                        ['custom', ['examplePlugin']],
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ]
                }
            });
        });
    </script>
    <script>
        function toggleSelectOptions() {
            var dealsRadio = document.getElementById('dealsRadio');
            var servicesRadio = document.getElementById('servicesRadio');
            var dealsSelect = document.getElementById('dealsSelect');
            var servicesSelect = document.getElementById('servicesSelect');

            // Toggle visibility based on selected radio button
            if (dealsRadio.checked) {
                dealsSelect.style.display = 'block';
                servicesSelect.style.display = 'none';
            } else if (servicesRadio.checked) {
                servicesSelect.style.display = 'block';
                dealsSelect.style.display = 'none';
            }
        }

        function seturl(data) {
            // Define the base URLs with placeholders for dynamic segments
            var unitBaseUrl = <?php echo json_encode(route('unit-details', ['product_slug' => 'placeholder', 'unitslug' => 'placeholder'])) ?>;
            var productDetailsBaseUrl = <?php echo json_encode(route('productdetails', ['slug' => 'placeholder']), 512) ?>;

            if (data === 'unit') {
                var deals = $('#deals').val(); // Get the value of the deals field
                if (deals) {
                    // Replace placeholders with actual values
                    var updatedUrl = unitBaseUrl.replace('placeholder', 'banners').replace('placeholder', deals);
                    $('#url').val(updatedUrl); // Set the updated URL in the input field
                } else {
                    alert('Please select a deal!');
                }
            }

            if (data === 'services') {
                var services = $('#services').val(); // Get the value of the services field
                if (services) {
                    // Replace placeholder with actual value
                    var updatedUrl = productDetailsBaseUrl.replace('placeholder', services);
                    $('#url').val(updatedUrl); // Set the updated URL in the input field
                } else {
                    alert('Please select a service!');
                }
            }
        }
    </script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/admin/program/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="mb-0">Service Create</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Service Add/Update
                        </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content-header">
    <!--begin::App Content-->
    <div class="app-content">
        <?php if(session()->has('error')): ?>
        <span class="alert alert-danger">
                <?php echo e(session()->get('error')); ?>

            </span>
            <?php endif; ?>
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="card-body p-4">
                <?php if(isset($data)): ?>
                    <form method="post"
                        action="<?php echo e(route('product.update', $data['id'])); ?>"
                        enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                    <?php else: ?>
                        <form method="post" action="<?php echo e(route('product.store')); ?>"
                            enctype="multipart/form-data">
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="mb-3 col-lg-6 self">
                        <label for="product_name" class="form-label">Service Name<span
                                class="text-danger">*</span></label>
                        <input class="form-control" id="product_name" required type="text" name="product_name"
                            value="<?php echo e(isset($data) ? $data['product_name'] : ''); ?>"
                            placeholder="Product Name" onkeyup="slugCreate()">
                    </div>
                    <div class="mb-3 col-lg-6 self">
                        <label for="product_slug" class="form-label">Service Slug<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="product_slug"
                            value="<?php echo e(isset($data) ? $data['product_slug'] : ''); ?>"
                            placeholder="Slug" id="product_slug">
                    </div>
                    <div class="mb-3 col-lg-6 self">
                        <label class="form-label">Select Service Category <span class="text-danger">*</span></label>
                        <?php if($category): ?>
                         
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="cat_id[]"
                                    value="<?php echo e($value['id']); ?>"
                                    <?php echo e(isset($data['cat_id']) && (is_array($data['cat_id']) ? in_array($value['id'], $data['cat_id']) : $data['cat_id'] == $value['id']) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="cat_<?php echo e($value['id']); ?>">
                                    <?php echo e($value['cat_name']); ?>

                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div>No Category Found</div>
                            <?php endif; ?>
                    </div>
                    <div class="mb-3 col-lg-6 self">
                        <label class="form-label">Select Unit </label>
                        <?php if($units): ?>
                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input unit-checkbox" name="unit_id[]"
                                        value="<?php echo e($value['id']); ?>"
                                        <?php echo e(isset($data['unit_id']) && (is_array($data['unit_id']) ? in_array($value['id'], $data['unit_id']) : $data['unit_id'] == $value['id']) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="cat_<?php echo e($value['id']); ?>">
                                        <?php echo e($value['product_name']); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div>No Unit Found</div>
                        <?php endif; ?>
                    </div>
                    



                <div class="mb-12 col-lg-12 self">
                    <label for="short_description" class="form-label">Short Description
                        <span class="text-danger"> (Text Limit 50 Word)</span>
                    </label>
                    <textarea name="short_description" id="short_description" class="form-control"
                        required><?php echo e(isset($data) ? $data['short_description'] : ''); ?></textarea>
                    <span id="count" class="text-danger"></span>
                </div>
                <div class="mb-12 col-lg-12 self mt-3 UnitHideShow">
                    <label for="product_description" class="form-label">Long Description</label>
                    <textarea name="product_description" id="product_description" class="form-control summernote"
                        onkeyup="calculate()"><?php echo e(isset($data) ? $data['product_description'] : ''); ?></textarea>
                </div>
                <div class="mb-12 col-lg-12 self mt-3 UnitHideShow">
                    <label for="prerequisites" class="form-label">Prerequisites</label>
                    <textarea name="prerequisites" id="prerequisites"
                        class="form-control summernote"><?php echo e(isset($data) ? $data['prerequisites'] : ''); ?></textarea>
                </div>
              

                <?php
                    if (isset($data)) {
                    $image = explode('|', $data['product_image']);
                    }
                ?>
                <?php if(isset($image)): ?>
                    <div class=" col-md-12 mt-4 box" style="border:solid 1px;" id="image_class">
                        <button type="button" style="
                        background-color: red;
                        color: #ffffff;
                        border: red;
                        width: 30px;
                        height: 25px;
                        justify-content: flex-start;
                        align-items: center;

                    " onclick="hideImage(<?php echo e(1); ?>)">X</button>
                        <div class="row">

                            <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $imagevalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($imagevalue)): ?>
                                    <div class="mb-3 col-lg-4 self">
                                        <label for="product_image" class="form-label">Service Image</label><br>
                                        <img src="<?php echo e($imagevalue); ?>" class="mb-4"
                                            style="width:100%; height:200px; margin-right: -20px;" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                <?php endif; ?>

                <div class="mb-3 col-lg-12 self" id="image_field"
                    style="display:<?php echo e(isset($data['id']) ? 'none' : 'block'); ?>">
                    <label for="product_image" class="form-label">Service Image<span
                            class="text-danger">* 350 X 350 Px Size Should be between 10kb to 2mb</span></label><br>
                    <input class="form-control" id="image" type="file" name="product_image[]" multiple
                        <?php echo e(isset($data) ? '' : 'required'); ?>>
                </div>

                <div class="mb-3 col-lg-6 self mt-2 numberInputContainer">
                    <label for="amount" class="form-label">Service Original Price<span class="text-danger">*</span>
                    </label>
                    <input class="form-control float_class" type="number" min="0" name="amount"
                        value="<?php echo e(isset($data) ? $data['amount'] : ''); ?>"
                        placeholder="Service Original Price"  step="0.01">
                    <input class="form-control" type="hidden" min="0" name="id"
                        value="<?php echo e(isset($data) ? $data['id'] : ''); ?>">
                </div>
                <div class="mb-3 col-lg-6 self mt-2 numberInputContainer">
                    <label for="discounted_amount" class="form-label">Service Price<span class="text-danger">*</span></label>
                    <input class="form-control float_class" type="number" min="0" name="discounted_amount"
                        value="<?php echo e(isset($data) ? $data['discounted_amount'] : ''); ?>"
                        placeholder="Service Price"  step="0.01">
                </div>
                <div class="mb-3 col-lg-6 self UnitHideShow">
                    <label for="session_number" class="form-label">Number of session<span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="number" min="1" name="session_number"
                        value="<?php echo e(isset($data) ? $data['session_number'] : '1'); ?>"
                        placeholder="Number Of Session" required id="session_number">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" id='status'>
                        <option
                            value="1"<?php echo e(isset($data['status']) && $data['status'] == 1 ? 'selected' : ''); ?>>
                            Active</option>
                        <option
                            value="0"<?php echo e(isset($data['status']) && $data['status'] == 0 ? 'selected' : ''); ?>>
                            Inactive</option>
                    </select>
                </div>

                <div class="mb-12 col-lg-12 self">
                    <label for="search_keywords" class="form-label">Search Keywords</label>
                    <textarea name="search_keywords" id="search_keywords" rows="4"
                        class="form-control"><?php echo e(isset($data) ? $data['search_keywords'] : ''); ?></textarea>

                </div>
                

            <div class="mb-3 col-lg-6">
                <label for="from" class="form-label">Popular Services</label>
                <select class="form-control" name="popular_service" id="from">
                    <option value="1"
                        <?php echo e(isset($data['popular_service']) && $data['popular_service'] == 1 ? 'selected' : ''); ?>>
                        Yes</option>
                    <option value="0"
                        <?php echo e(isset($data['popular_service']) && $data['popular_service'] == 0 ? 'selected' : ''); ?>>
                        No</option>
                </select>
            </div>
            <div class="mb-3 col-lg-6 UnitHideShow">
                <label for="giftcard_redemption" class="form-label">Giftcard Redeem</label>
                <select class="form-control" name="giftcard_redemption" id="giftcard_redemption">
                    <option value="0"
                        <?php echo e(isset($data['giftcard_redemption']) && $data['giftcard_redemption'] == 0 ? 'selected' : ''); ?>>
                        No</option>
                    <option value="1"
                        <?php echo e(isset($data['giftcard_redemption']) && $data['giftcard_redemption'] == 1 ? 'selected' : ''); ?>>
                        Yes</option>
                </select>
            </div>
            <div class="mb-3 col-lg-6 mt-4">
                <button  class="btn btn-block btn-outline-primary" type="submit" id="submitBtn">Submit</button>
            </div>
        </div>
        </form>
    </div>
    <!--end::Row-->
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>

// For Input type Number Field is Hide
    $(document).ready(function() {
        // Function to toggle the number input visibility
        function toggleNumberInput() {
            if ($('.unit-checkbox:checked').length > 0) {
                $('.numberInputContainer').hide();
                $('.UnitHideShow').hide();
               
            } else {
                $('.numberInputContainer').show();
                $('.UnitHideShow').show();

            }
        }
        // Initial check on page load
        toggleNumberInput();
        // Toggle visibility when any checkbox is clicked
        $('.unit-checkbox').on('change', function() {
            toggleNumberInput();
        });
    });
// For Input type Number Field is Hide*********

// For Input type Take Float Value
const totalAmt = document.getElementByClass("float_class");
totalAmt.addEventListener("change", (e)=>{
      // e.preventDefault(e);
      const result = parseFloat(e.target.value);
     console.log(result)
});
// For Input type Take Float Value End
        function hideImage() {
            $('#image_class').hide();
            $('#image_field').show();
        }

    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Set height of the editor
                width: 860, // Set width of the editor
                focus: true, // Focus the editor on load
                fontSizes: ['8', '9', '10', '11', '12', '14', '18', '22', '24', '36', '48', '64', '82', '150'], // Font sizes
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
        function slugCreate() {
            $.ajax({
                url: '<?php echo e(route('slugCreate')); ?>',
                method: "post",
                dataType: "json",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    product_name: $('#product_name').val(),
                },
                success: function (response) {
                    if (response.success) {
                        $('#product_slug').val(response.slug);
                    } else {
                        $('.showbalance').html(response.error).show();
                    }
                }
            });
        }

    </script>
    <script>
        var calculate = function () {
            var string = document.getElementById('short_description').value;
            var words = string.trim().split(/\s+/).filter(word => word.length > 0);
            var wordCount = words.length;

            if (wordCount > 50) {
                document.getElementById('short_description').value = words.slice(0, 50).join(' ');
                wordCount = 50;
            }

            document.getElementById('count').innerHTML = wordCount + " / 50 words";
        };

        // Add event listener to count words when the content changes
        document.getElementById('short_description').addEventListener('input', calculate);

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('input[name="cat_id[]"]');
            const submitBtn = document.getElementById('submitBtn');

            function toggleSubmitButton() {
                const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                submitBtn.disabled = !anyChecked;
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', toggleSubmitButton);
            });

            // Initial check on page load
            toggleSubmitButton();
        });

    </script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/admin/product/product_create.blade.php ENDPATH**/ ?>
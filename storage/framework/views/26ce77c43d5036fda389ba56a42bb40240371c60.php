<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="mb-0">Unit Create</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Unit Add/Update
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
                    <form method="post"action="<?php echo e(route('unit.update', $data['id'])); ?>"enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                    <?php else: ?>
                        <form method="post" action="<?php echo e(route('unit.store')); ?>"
                            enctype="multipart/form-data">
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="mb-3 col-lg-6 self">
                        <label for="product_name" class="form-label">Unit Name<span
                                class="text-danger">*</span></label>
                        <input class="form-control" id="product_name" required type="text" name="product_name"
                            value="<?php echo e(isset($data) ? $data['product_name'] : ''); ?>"
                            placeholder="Product Name" onkeyup="slugCreate()">
                    </div>
                    <div class="mb-3 col-lg-6 self">
                        <label for="product_slug" class="form-label">Unit Slug<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="product_slug"
                            value="<?php echo e(isset($data) ? $data['product_slug'] : ''); ?>"
                            placeholder="Slug" id="product_slug">
                    </div>
                



                <div class="mb-12 col-lg-12 self">
                    <label for="short_description" class="form-label">Short Description
                        <span class="text-danger"> (Text Limit 50 Word)</span>
                    </label>
                    <textarea name="short_description" id="short_description" class="form-control"
                        required><?php echo e(isset($data) ? $data['short_description'] : ''); ?></textarea>
                    <span id="count" class="text-danger"></span>
                </div>
                <div class="mb-12 col-lg-12 self mt-3">
                    <label for="product_description" class="form-label">Long Description</label>
                    <textarea name="product_description" id="product_description" class="form-control summernote"
                        onkeyup="calculate()"><?php echo e(isset($data) ? $data['product_description'] : ''); ?></textarea>
                </div>
              
                <?php
                    if (isset($data)) {
                    $image = explode('|', $data['product_image']);
                    }
                ?>
                <?php if(isset($image)): ?>
                    <div class=" col-md-12 box" style="border:solid 1px;" id="image_class">
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
                            class="text-danger"><span class="text-danger">* 350 X 350 Px Size Should be between 10kb to 2mb</span></span></label><br>
                    <input class="form-control" id="image" type="file" name="product_image[]" multiple
                        <?php echo e(isset($data) ? '' : 'required'); ?>>
                </div>

                <div class="mb-3 col-lg-6 self mt-2">
                    <label for="amount" class="form-label">Unit Original Price<span class="text-danger">*</span>
                    </label>
                    <input class="form-control" type="number" min="0" name="amount"
                        value="<?php echo e(isset($data) ? $data['amount'] : ''); ?>"
                        placeholder="Original Price" required step="0.01">
                    <input class="form-control" type="hidden" min="0" name="id"
                        value="<?php echo e(isset($data) ? $data['id'] : ''); ?>">
                </div>
                <div class="mb-3 col-lg-6 self mt-2">
                    <label for="discounted_amount" class="form-label">Unit Discounted Price<span class="text-danger">*</span></label>
                    <input 
                        class="form-control" 
                        type="number" 
                        min="0" 
                        name="discounted_amount" 
                        value="<?php echo e(isset($data) ? $data['discounted_amount'] : ''); ?>" 
                        placeholder="Discounted Price" 
                        required 
                        step="0.01">

                </div>
                <div class="mb-3 col-lg-6 self">
                    <label for="min_qty" class="form-label">Min Qty<span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="number" min="1" name="min_qty"
                        value="<?php echo e(isset($data) ? $data['min_qty'] : '1'); ?>"
                        placeholder="Number Of Session" required>
                </div>
                <div class="mb-3 col-lg-6 self">
                    <label for="max_qty" class="form-label">Max Qty<span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="number" min="1" name="max_qty"
                        value="<?php echo e(isset($data) ? $data['max_qty'] : '1'); ?>"
                        placeholder="Number Of Session" required>
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

            <div class="mb-3 col-lg-6">
                <label for="giftcard_redemption" class="form-label">Giftcard Redeem</label>
                <select class="form-control" name="giftcard_redemption" id="from">
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
    
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/admin/service_unit/service_unit_create.blade.php ENDPATH**/ ?>
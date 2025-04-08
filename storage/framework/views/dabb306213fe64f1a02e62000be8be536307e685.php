<?php $__env->startSection('body'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="mb-0">Service Unit</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Service Unit
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">

        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Search Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-end">
                            <!-- Service Search Form -->
                            <div class="col-md-8">
                                <form method="GET" action="<?php echo e(route('product.index')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-0">
                                        <label for="service_name" class="form-label">Search by Service Name:</label>
                                        <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Enter Service Name" onkeyup="SearchView()">
                                        <input type="hidden" class="form-control" id="user_token" name="user_token" value="<?php echo e(Auth::user()->user_token); ?>">
                                    </div>
                                </form>
                            </div>
                            <!-- Add More Button -->
                            <div class="col-md-4">
                                <a href="<?php echo e(route('unit.create')); ?>" class="btn btn-dark w-100">Add More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(session('message')): ?>
                    <div class="alert alert-success mt-4">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Unit Name</th>
                            <th>Orignal Price</th>
                            <th>Discounted Price</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="data-table-body">
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <?php echo e($value->product_name ? $value->product_name: 'N/A'); ?>

                                </td>
                                <td><?php echo e($value->amount); ?></td>
                                <td><?php echo e($value->discounted_amount); ?></td>
                                <td><?php echo e($value->status == 1 ?  "Active":"Inactive"); ?></td>
                                
                                <td>
                                    <a href="<?php echo e(route('unit.edit', $value['id'])); ?>"  class="btn btn-block btn-outline-primary">Edit</a>
                                    <a href="<?php echo e(route('unitdelete', $value['id'])); ?>"  class="btn btn-block btn-outline-danger">Delete</a>
                                    <a class="btn btn-block btn-outline-primary" onclick="addcart(<?php echo e($value['id']); ?>)">Buy</a>
                                  
                                </td>


                                <!-- Button trigger modal -->




                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <?php echo e($result->links()); ?>

                </table>
                <?php echo e($result->links()); ?>

                <!--end::Row-->
                <!-- /.Start col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
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
                    user_token: '<?php echo e(Auth::user()->user_token); ?>',
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
    <script>
        function addcart(id) {
            $.ajax({
                url: '<?php echo e(route('cart')); ?>',
                method: "post",
                dataType: "json",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    unit_id: id,
                    type: "unit"
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
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

    <!-- For Multiple Image upload Code -->
    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData();
            let files = document.getElementById('images').files;

            // Append all images to FormData
            for (let i = 0; i < files.length; i++) {
                formData.append('images[]', files[i]);
            }

            // Append the CSRF token to FormData
            formData.append('_token', '<?php echo e(csrf_token()); ?>');

            let xhr = new XMLHttpRequest();

            // Update progress
            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    let percentComplete = Math.round((e.loaded / e.total) * 100);
                    document.getElementById('progressBar').value = percentComplete;
                    document.getElementById('progressPercentage').innerText = percentComplete + '%';
                    document.getElementById('progressWrapper').style.display = 'block';
                }
            });

            // On upload complete
            xhr.onload = function() {
                document.getElementById('progressWrapper').style.display = 'none';

                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);

                    // Clear previous errors and images
                    document.getElementById('validationErrors').innerHTML = '';
                    document.getElementById('uploadedImages').innerHTML = '';

                    // Show successfully uploaded images
                    if (response.files.length > 0) {
                        let uploadedImagesDiv = document.getElementById('uploadedImages');
                        response.files.forEach(file => {
                            let img = document.createElement('img');
                            img.src = '<?php echo e(url('/')); ?>' + file;
                            img.style.width = '100px';
                            img.style.margin = '5px';
                            uploadedImagesDiv.appendChild(img);
                        });
                    }

                    // Show validation errors
                    if (response.errors.length > 0) {
                        let errorDiv = document.getElementById('validationErrors');
                        response.errors.forEach(error => {
                            let errorItem = document.createElement('div');
                            errorItem.className = 'alert alert-danger';
                            errorItem.innerText = error;
                            errorDiv.appendChild(errorItem);
                        });
                    }
                } else {
                    console.log("Error during upload.");
                }
            };

            // Error handling
            xhr.onerror = function() {
                console.log("Error during upload.");
            };

            // Open the request and send the FormData
            xhr.open('POST', '<?php echo e(url('/admin/upload-multiple-images')); ?>', true);
            xhr.send(formData);
        });
    </script>
    <script>
        function Copy(getkey) {
            // Get the button element using its unique id
            var copyButton = document.getElementById("copy_url_" + getkey);

            // Get the URL from the 'url_link' attribute
            var url = copyButton.getAttribute("url_link");

            // Use the modern clipboard API to copy the URL
            navigator.clipboard.writeText(url).then(function() {
                $('#copy_url_' + getkey).val('Copied')
                // alert("URL copied to clipboard: " + url);
            }).catch(function(error) {
                console.error("Could not copy text: ", error);
            });
        }
        function SearchView() {
    var service_name = $('#service_name').val();
    $.ajax({
        url: '<?php echo e(route('unit-search')); ?>', // API endpoint
        method: "GET",
        dataType: "json",
        data: {
            service_name: service_name,
        },
        success: function (response) {
            if (response.status === 'success' && response.data.data.length > 0) {
                var tableBody = $('#data-table-body'); // ID of your table body
                tableBody.empty(); // Clear existing rows

                // Loop through the response data and populate the table
                $.each(response.data.data, function (key, value) {
                    // Format date
                    var updatedDate = value.updated_at
                        ? new Date(value.updated_at).toLocaleString('en-US', {
                              month: '2-digit',
                              day: '2-digit',
                              year: 'numeric',
                              hour: '2-digit',
                              minute: '2-digit',
                              second: '2-digit',
                          })
                        : 'N/A';

                    // Handle product images dynamically
                    var productImages = value.product_image ? value.product_image.split('|') : [];
                    var firstImage = productImages.length > 0 ? productImages[0] : '<?php echo e(url("/No_Image_Available.jpg")); ?>';

                    // Append rows
                    tableBody.append(`
                        <tr>
                            <td>${key + 1}</td>
                            <td><a class="btn btn-block btn-outline-primary" onclick="addcart(${value.id})">Buy</a></td>
                            <td>${value.product_name || 'N/A'}</td>
                            <td>${value.amount || '0.00'}</td>
                            <td>${value.discounted_amount || '0.00'}</td>
                            <td>${value.short_description ? value.short_description.substring(0, 100) + '...' : 'N/A'}</td>
                            <td>${value.unit_id !== null ? 'Unit Service' : 'Normal Deals & Service'}</td>
                            <td>
                                <a href="/product/${value.id}/edit" class="btn btn-block btn-outline-primary">Edit</a>
                                <form action="/product/${value.id}" method="POST" style="display:inline;">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-block btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    `);
                });
            } else {
                // Handle empty results
                $('#data-table-body').empty().append('<tr><td colspan="9">No results found.</td></tr>');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
            alert('An error occurred while fetching data.');
        },
    });
}
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/admin/service_unit/service_unit_index.blade.php ENDPATH**/ ?>
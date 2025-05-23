<?php $__env->startSection('body'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="mb-0">Services List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Services
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

                <?php if(session('success')): ?>
                    <div class="alert alert-success mt-4">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger mt-4">
                        <?php echo e(session('error')); ?>

                        <?php if(session('details')): ?>
                            <pre><?php echo e(session('details')); ?></pre>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if(session('import_errors') && count(session('import_errors')) > 0): ?>
                    <div class="alert alert-danger mt-4">
                        <h4>There were some errors while importing the data:</h4>

                        <ul>
                            <?php $__currentLoopData = session('import_errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <strong>Row:</strong>
                                    <pre><?php echo e(print_r($errorDetail['row'], true)); ?></pre>
                                    <strong>Errors:</strong>
                                    <ul>
                                        <?php $__currentLoopData = $errorDetail['errors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                <li> <a href="<?php echo e(route('clear.errors')); ?>" class="btn btn-block btn-outline-danger">Clear
                                        Errors</a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
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

                
                
              
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Upload and Download</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Upload Bulk Service Data -->
                            <div class="col-md-6 mb-4">
                                <form action="<?php echo e(route('services.import')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Upload Bulk Service Data</label>
                                        <input type="file" name="file" class="form-control" accept=".csv" required>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary w-100">Import</button>
                                </form>
                            </div>
                
                            <!-- Downloads Section -->
                            <div class="col-md-6 mb-4">
                                <div class="d-flex flex-column">
                                    <?php if(collect($products)->isEmpty()): ?>
                                        <a href="<?php echo e(url('/services.csv')); ?>" class="btn btn-outline-info mb-2" download="services.csv">
                                            Download Service Template
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(url('/admin/export-services')); ?>" class="btn btn-outline-info mb-2" download="services.csv">
                                            Download Service Template
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(url('/admin/export-categories')); ?>" class="btn btn-outline-warning mb-2" download="deals.csv">
                                        Download Deals Data
                                    </a>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#media_modal">
                                        Media
                                    </button>
                                    
                                        <a href="<?php echo e(route('product.create')); ?>" class="btn btn-outline-dark mb-2 mt-2">Add More</a>
                                  
                                </div>
                            </div>
                        </div>               
                        
                    </div>
                </div>
                

                <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#">#</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Buy">Buy</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name">Product Name</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Image">Image</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Actual Price">Actual Price</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Deal Price">Deal Price</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Description">Product Description</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Type">Type</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Action">Action</th>

                    </tr>
                </thead>
                <tbody id="data-table-body">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><a class="btn btn-block btn-outline-primary" onclick="addcart(<?php echo e($value['id']); ?>)">Buy</a>
                            </td>
                            <td><?php echo e($value['product_name'] ? $value['product_name'] : 'NULL'); ?>

                            </td>
                            <td>
                                <?php
                                    $image = explode('|', $value['product_image']);
                                ?>
                                
                                <img src="<?php echo e($image[0]); ?>" style="height:100px; width:100px;"
                                    onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                            </td>
                            <td><?php echo e($value['amount']); ?></td>
                            <td><?php echo e($value['discounted_amount']); ?></td>
                            <td><?php echo mb_strimwidth(
                                htmlspecialchars(isset($value['short_description']) ? $value['short_description'] : 'NULL'),
                                0,
                                100,
                                '...',
                            ); ?></td>




                            <td><?php echo e($value['unit_id'] != null ? 'Unit Service' : 'Normal Deals & Service'); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(route('product.edit', $value['id'])); ?>"
                                    class="btn btn-block btn-outline-primary">Edit</a>
                                <form action="<?php echo e(route('product.destroy', $value['id'])); ?>" method="POST">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?><!-- Include CSRF token for security -->
                                    <button class="btn btn-block btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>


                            <!-- Button trigger modal -->




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


    <!-- Modal -->
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

    

    <!-- Modal -->
    <div class="modal fade" id="media_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="media_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="media_modalLabel">Media Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="validationErrors"></div>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form id="uploadForm" enctype="multipart/form-data"
                        style="display: flex; align-items: center; gap: 10px;">
                        <input type="file" class="form-control" name="images[]" id="images" multiple
                            style="width: auto;" required accept="image/jpg, image/jpeg, image/png" />
                        <button type="submit" class="btn btn-block btn-outline-success">Upload Images</button>
                    </form>
                    <!-- Display Uploaded Images -->
                    <div id="progressWrapper" style="display: none; margin-top: 10px;">
                        <progress id="progressBar" value="0" max="100"></progress>
                        <span id="progressPercentage">0%</span>
                    </div>
                    <div id="uploadedImages"></div>
                    <!-- Display Uploaded Images -->
                </div>
                <div class="modal-footer">
                    
                    <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                        <div class="row">
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2 mb-4 image-container" data-image="<?php echo e($image); ?>"
                                    style="position: relative;">
                                    <div class="border border-primary"
                                        style="height:100px;width:120px;margin-top: 30px; position:relative;">
                                        <img src="<?php echo e(url('/')); ?><?php echo e(Storage::url($image)); ?>" class="img-fluid"
                                            alt="Image" style="height:100px;width:120px;"
                                            onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                                        <button type="button" class="rounded-circle btn-close delete-image text-danger"
                                            aria-label="Close"
                                            style="position: absolute; top: -23px; right: -24px; background: transparent; border: 1px; font-size: 20px;"><i
                                                class="fa fa-times-circle" aria-hidden="true"></i></button>

                                        <!-- Copy URL Button -->
                                        <input type="button" class="form-control btn btn-outline-success mt-1 mb-2"
                                            id="copy_url_<?php echo e($key); ?>"
                                            url_link="<?php echo e(url('/')); ?><?php echo e(Storage::url($image)); ?>" value="Copy URL"
                                            onclick="Copy(<?php echo e($key); ?>);" />
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
                    product_id: id,
                    quantity: 1,
                    type: "product"
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
//  For Seacrh Function 
function SearchView() {
    var service_name = $('#service_name').val();
    $.ajax({
        url: '<?php echo e(route('service-search')); ?>', // API endpoint
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
                            <td>
                                <img src="${firstImage}" style="height:100px; width:100px;"
                                    onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                            </td>
                            <td>${value.amount || '0.00'}</td>
                            <td>${value.discounted_amount || '0.00'}</td>
                            <td>${value.short_description ? value.short_description.substring(0, 100) + '...' : 'N/A'}</td>
                            <td>${value.unit_id !== null ? 'Unit Service' : 'Normal Deals & Service'}</td>
                            <td>
                                <a href="<?php echo e(url('/')); ?>/admin/product/${value.id}/edit" class="btn btn-block btn-outline-primary">Edit</a>
                                <form action="<?php echo e(url('/')); ?>/admin/product/${value.id}" method="POST" style="display:inline;">
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

<script>
    $(function () {
      $("#datatable-buttons").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/admin/product/product_index.blade.php ENDPATH**/ ?>
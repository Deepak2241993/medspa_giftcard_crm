<?php $__env->startSection('body'); ?>
<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
!-- Body main wrapper start -->
   <main>

      <!-- Breadcrumb area start  -->
      <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="<?php echo e(url('/uploads/FOREVER-MEDSPA')); ?>/med-spa-banner.jpg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title"><?php echo e($product->product_name); ?></h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="<?php echo e(url('/')); ?>">Home</a></span></li>
                              <li><span><?php echo e($product->product_name); ?></span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- Product details area start -->
      <div class="product__details-area section-space-medium">
         <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2 class="fs-1"><?php echo e($product->product_name); ?></h2>
                    <div class="text text-wrap">
                        <?php echo $product->short_description; ?>

                    </div>
                </div>
            </div>
            <div class="row g-5 mt-2">
                <?php if($result): ?>
                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                   $unit = App\Models\ServiceUnit::where('status', 1)->where('id', $value)->first();

                    if ($unit) {
                        $image = explode('|', $unit->product_image);
                    } else {
                        $image = []; // Handle the case where no matching record is found
                    }
                ?>
                <?php if($unit): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div clss="project-thumb w-img">
                            <?php if(!empty($image) && !empty($image[0])): ?>
                            <img src="<?php echo e($image[0]); ?>" class="card-img-top" alt="...">
                        <?php else: ?>
                            <img src="<?php echo e(url('/No_Image_Available.jpg')); ?>" class="card-img-top" alt="No Image Available" height="350">
                        <?php endif; ?>
                        
                        </div>
                        <div class="card-body project-item">
                            <div class="content p-4">
                                <h4><?php echo e($unit ? $unit->product_name : ''); ?></h4>
                                <p class="card-text">
                                    <?php echo e($unit ? $unit->short_description : ''); ?>

                                </p>
                                <a href="<?php echo e(route('unit-details', ['product_slug' => $product->product_slug, 'unitslug' => $unit->product_slug])); ?>

" class="fill-btn cart-btn">
                                    <span class="fill-btn-inner">
                                    <span class="fill-btn-normal">Buy Now</span>
                                    <span class="fill-btn-hover">Buy Now</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <h1> No Data Found</h1>
            <?php endif; ?>
                
            </div>
         </div>
      </div>
      <!-- Product details area end -->

   </main>
   <!-- Body main wrapper end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footerscript'); ?>
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
             type: "unit"
         },
         success: function (response) {
             if (response.success) {
                 window.location.href = '<?php echo e(route('cartview')); ?>'; 
             } else {
                 $('.showbalance').html(response.error).show();
             }
         },
         error: function (jqXHR, textStatus, errorThrown) {
             // Handle the error here
             $('.showbalance').html('An error occurred. Please try again.').show();
         }
     });
 }
 
 </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/product/unit_show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('body'); ?>
<?php $__env->startPush('css'); ?>
.product__details-action {
   display: flex;
   flex-wrap: wrap;
   gap: 20px 15px;
}

.product__quantity .product-quantity-wrapper .cart-input {
   height: 60px;
   width: 170px;
   text-align: center;
   font-size: 16px;
   border: none;
   display: inline-block;
   vertical-align: middle;
   margin: 0 -3px;
   padding-bottom: 4px;
   background: transparent;
   color: #fca52a;;
   font-weight: var(--bd-fw-medium);
}
.product__quantity .product-quantity-wrapper {
   position: relative;
   width: 160px;
   height: 60px;
   line-height: 60px;
   border: 1px solid var(--clr-border-2);
   -webkit-border-radius: 30px;
   -moz-border-radius: 30px;
   -o-border-radius: 30px;
   -ms-border-radius: 30px;
   border-radius: 30px;
}
.product__quantity .product-quantity-wrapper .cart-minus {
   position: absolute;
   top: 50%;
   left: 10px;
   transform: translateY(-50%);
   width: 30px;
   height: 30px;
   line-height: 30px;
   display: inline-block;
   vertical-align: middle;
   text-align: center;
   font-size: 16px;
   background: transparent;
   color: #9e9e9e;
   border: 0;
}
.product__quantity .product-quantity-wrapper .cart-qty {
   position: absolute;
   top: 50%;
   left: 10px;
   transform: translateY(-50%);
   width: 30px;
   height: 30px;
   line-height: 30px;
   display: inline-block;
   vertical-align: middle;
   text-align: center;
   font-size: 16px;
   background: transparent;
   color: #9e9e9e;
   border: 0;
}

.product__quantity .product-quantity-wrapper .cart-plus {
   position: absolute;
   top: 50%;
   right: 10px;
   transform: translateY(-50%);
   width: 30px;
   height: 30px;
   line-height: 30px;
   display: inline-block;
   vertical-align: middle;
   text-align: center;
   font-size: 16px;
   background: transparent;
   color: #9e9e9e;
   border: 0;
}


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
                     <h2 class="breadcrumb__title"><?php echo e($unit->product_name); ?></h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="<?php echo e(url('/')); ?>">Home</a></span></li>
                              <li><span><?php echo e($unit->product_name); ?></span></li>
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
            <div class="row align-items-center">
               <div class="col-xxl-6 col-lg-6">
                  <div class="product__details-thumb-wrapper d-sm-flex align-items-start mr-50">
                     <div class="product__details-thumb-tab mr-20">
                        <nav>
                           <div class="nav nav-tabs flex-nowrap flex-sm-column" id="nav-tab" role="tablist">
                               <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php if($key<=2): ?>
                              <button class="nav-link <?php echo e($key==0?'active':''); ?>" id="img-<?php echo e($key); ?>-tab" data-bs-toggle="tab"
                                 data-bs-target="#img-<?php echo e($key); ?>" type="button" role="tab" aria-controls="img-<?php echo e($key); ?>"
                                 aria-selected="true">
                                 <img src="<?php echo e($image_name); ?>" alt="product-sm-thumb" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                              </button>
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                        </nav>
                     </div>
                     <div class="product__details-thumb-tab-content">
                        <div class="tab-content" id="productthumbcontent">
                          
                           <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($key<=2): ?>
                           <div class="tab-pane fade <?php echo e($key==0?'show active':''); ?>" id="img-<?php echo e($key); ?>" role="tabpanel"
                              aria-labelledby="img-<?php echo e($key); ?>-tab">
                              <div class="product__details-thumb-big w-img">
                                 <img src="<?php echo e($image_name); ?>" alt="" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                              </div>
                           </div>
                           <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-6 col-lg-6">
                  <div class="product__details-content pr-80">
                     
                     <h3 class="product__details-title"><?php echo e($unit->product_name); ?></h3>
                     <div class="product__details-price">
                        <?php if($unit->discounted_amount!=null): ?>
                        <span class="old-price">$<?php echo e($unit->amount); ?></span>
                        <span class="new-price">$<?php echo e($unit->discounted_amount); ?></span>
                        <?php else: ?>
                        <span class="new-price">$<?php echo e($unit->amount); ?></span>
                        <?php endif; ?>

                     </div>
                     <p><?php echo $unit->short_description; ?></p>

                     <div class="product__details-action mb-35">
                        <div class="product__quantity">
                           <div class="product-quantity-wrapper">
                             
                                 
                                 <layout class="cart-qty">Qty:</layout>
                                <input 
                                 class="cart-input" 
                                 id="qty_<?php echo e($unit->id); ?>"
                                 type="number" 
                                 value="<?php echo e($unit->min_qty); ?>" 
                                 min="<?php echo e($unit->min_qty); ?>" 
                                 max="<?php echo e($unit->max_qty); ?>" 
                              >
                                 
                           </div>
                        </div>
                        <div class="product__add-cart">
                           <a href="javascript:void(0)" class="fill-btn cart-btn" onclick="addcart(<?php echo e($unit->id); ?>)">
                              <span class="fill-btn-inner">
                                 <span class="fill-btn-normal">Add To Cart<i
                                       class="fa-solid fa-basket-shopping"></i></span>
                                 <span class="fill-btn-hover">Add To Cart<i
                                       class="fa-solid fa-basket-shopping"></i></span>
                              </span>
                           </a>
                        </div>
                       
                     </div>
                     
                     
                     
                  </div>
               </div>
            </div>
            <div class="product__details-additional-info section-space-medium-top">
               <div class="row">
                  <div class="col-xxl-3 col-xl-4 col-lg-4">
                     <div class="product__details-more-tab mr-15">
                        <nav>
                           <div class="nav nav-tabs flex-column " id="productmoretab" role="tablist">
                              <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                                 data-bs-target="#nav-description" type="button" role="tab"
                                 aria-controls="nav-description" aria-selected="true">Description</button>
                              
                              <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                                 data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                                 aria-selected="false">Terms & Conditions</button>
                           </div>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xxl-9 col-xl-8 col-lg-8">
                     <div class="product__details-more-tab-content">
                        <div class="tab-content" id="productmorecontent">

                           <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                              aria-labelledby="nav-description-tab">
                              <div class="product__details-des">
                                 <?php echo $unit->product_description; ?>

                              </div>
                           </div>

                           <div class="tab-pane fade show" id="nav-review" role="tabpanel"
                           aria-labelledby="nav-review-tab">
                           <a href="<?php echo e(url('/generate-pdf',$unit->terms_id)); ?>" class="fill-btn cart-btn">
                              <span class="fill-btn-inner">
                                 <span class="fill-btn-normal">Download Terms & Conditions<i class="fa-regular fa-file"></i></i></span>
                                 <span class="fill-btn-hover">Download Terms & Conditions<i class="fa-regular fa-file"></i></i></span>
                              </span>
                           </a>
                           <div class="product__details-des">
                              <?php echo $unit->terms_and_conditions; ?>

                           </div>
                        </div>
                            
                        </div>
                     </div>
                  </div>
               </div>
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
    var qty = parseInt($('#qty_' + id).val()); // Get the entered quantity
    var min = parseInt($('#qty_' + id).attr('min')); // Get the min value
    var max = parseInt($('#qty_' + id).attr('max')); // Get the max value

    // Check if qty is outside the range
    if (qty < min || qty > max) {
        alert('Quantity must be between ' + min + ' and ' + max + '.');
        $('#qty_' + id).val(min);
        return false; // Stop the execution if invalid
    }

    // Proceed with the AJAX request if valid
    $.ajax({
        url: '<?php echo e(route('cart')); ?>',
        method: "post",
        dataType: "json",
        data: {
            _token: '<?php echo e(csrf_token()); ?>',
            unit_id: id,
            quantity: qty,
            type: "unit",
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

<?php echo $__env->make('layouts.front_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/product/unit_details.blade.php ENDPATH**/ ?>
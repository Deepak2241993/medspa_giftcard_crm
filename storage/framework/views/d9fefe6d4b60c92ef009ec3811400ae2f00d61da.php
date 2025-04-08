<?php $__env->startSection('body'); ?>
    <?php
        $cart = session()->get('cart', []);
        $amount = 0;
    ?>
    <?php $__env->startPush('css'); ?>
    .required{
        color:red !important;
    }
    <?php $__env->stopPush(); ?>
    
    

    <!-- Body main wrapper start -->
    <main>

        <!-- Breadcrumb area start  -->
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb" data-background="<?php echo e(url('/uploads/FOREVER-MEDSPA')); ?>/med-spa-banner.jpg"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Checkout</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="<?php echo e(url('/')); ?>">Home</a></span></li>
                                        <li><span>checkout</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- checkout-area start -->
        <section class="checkout-area section-space">
            <div class="container">
                <form action="<?php echo e(route('checkout_process')); ?>" method="POST" id="bill_form">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3 class="mb-15">Billing Details</h3>
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text" placeholder="" name="fname" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->fname : old('fname')); ?>">
                                            <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e('First name is required.'); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Last Name </label>
                                            <input type="text" placeholder="" name="lname" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->lname : old('lname')); ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input type="email" placeholder="" name="email" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->email : old('email')); ?>">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="number" placeholder="Phone" name="phone" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->phone : old('phone')); ?>">
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->address : old('address')); ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" placeholder="Town / City" name="city" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->city : old('city')); ?>">
                                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e('Please Enter Town / City.'); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>State / Country <span class="required">*</span></label>
                                            <input type="text" placeholder="" name="country" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->country : old('country')); ?>">
                                            <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e('Please Enter State / County'); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input type="text" placeholder="Postcode / Zip" name="zip_code" value="<?php echo e(Session::get('result') ? Auth::guard('patient')->user()->zip_code : old('zip_code')); ?>">
                                            <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Image</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-name">Qty</th>
                                                <th class="product-name">Price</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td>
                                                    <?php if($item['type'] === 'product'): ?>
                                                        <?php
                                                            $product = App\Models\Product::find($item['id']);
                                                            $image = explode('|', $product->product_image);
                                                            $price = $product->discounted_amount ?? $product->amount;
                                                            $subtotal = $price*$item['quantity'];
                                                            $amount += $subtotal;
                                                           
                                                        ?>
                                                        <img src="<?php echo e($image[0]); ?>" style="height:100px; width:100px;" 
                                                            onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                                                    <?php elseif($item['type'] === 'unit'): ?>
                                                        <?php
                                                            $unit = App\Models\ServiceUnit::find($item['id']);
                                                            $image = explode('|', $unit->product_image);
                                                            $price = $unit->discounted_amount ?? $unit->amount;
                                                            $subtotal = $price*$item['quantity'];
                                                            $amount += $subtotal;
                                                        ?>
                                                        <img src="<?php echo e($image[0]); ?>" style="height:100px; width:100px;" 
                                                            onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($item['type'] === 'product'): ?>
                                                        <?php echo e($product->product_name); ?>

                                                    <?php elseif($item['type'] === 'unit'): ?>
                                                        <?php echo e($unit->product_name); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($item['quantity']); ?></td>
                                                
                                                <td>
                                                    <?php if($item['type'] === 'product'): ?>
                                                        <?php echo e("$".$product->discounted_amount ?? "$".$product->amount); ?>

                                                    <?php elseif($item['type'] === 'unit'): ?>
                                                        <?php echo e("$".$unit->discounted_amount ?? "$".$unit->amount); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($item['type'] === 'product'): ?>
                                                        <?php echo e("$".$item['quantity']*$product->discounted_amount ?? "$".$item['quantity']*$product->amount); ?>

                                                    <?php elseif($item['type'] === 'unit'): ?>
                                                        <?php echo e("$".$item['quantity']*$unit->discounted_amount ?? "$".$item['quantity']*$unit->amount); ?>

                                                    <?php endif; ?>
                                                </td>
                                   
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">$<?php echo e(number_format($amount, 2)); ?></span></td>
                                            </tr>
                                            <?php if(session()->has('total_gift_applyed')): ?>
                                                <tr class="cart-subtotal">
                                                    <td>Total Gift Applied:</td>
                                                    <td> -$<?php echo e(session('total_gift_applyed')); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                                <tr class="cart-subtotal">
                                                    <td>Tax 0%:</td>
                                                    <?php
                                                    $taxamount = ($amount * 0) / 100;
                                                    // echo "+$" . $taxamount;
                                                    ?>
                                                    <td> +$<?php echo e(session('tax_amount') ? session('tax_amount'):$taxamount); ?></td>
                                                </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td>
                                                    <strong>
                                                        <span class="amount">
                                                            $<?php echo e(session('total_gift_applyed') 
                                                                ? number_format(
                                                                    session('totalValue'), 
                                                                    2
                                                                  ) 
                                                                : number_format(
                                                                    $amount + $taxamount, 
                                                                    2
                                                                  )); ?>

                                                        </span>
                                                    </strong>
                                                </td>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="order-button-payment mt-20">
                                        <button class="fill-btn" type="submit">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Place order</span>
                                                <span class="fill-btn-hover">Place order</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </section>
        <!-- checkout-area end -->

    </main>
    <!-- Body main wrapper end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footerscript'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/product/checkout.blade.php ENDPATH**/ ?>
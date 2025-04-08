<?php $__env->startSection('body'); ?>
    <!-- Body main wrapper start -->
    <?php
        $cart = session()->get('cart', []);
        $amount = 0;
    ?>
    <main>
        <?php $__env->startPush('css'); ?>
            .giftcartbutton {
            font-size: 14px;
            font-weight: var(--bd-fw-medium);
            color: var(--clr-common-white);
            background: #198754;
            height: 30px;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 11px 27px;


            }
            .giftcartdelete{
            font-size: 14px;
            font-weight: var(--bd-fw-medium);
            color: var(--clr-common-white);
            background: #dc3545;
            height: 30px;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 11px 27px;
            }
        <?php $__env->stopPush(); ?>
        <!-- Breadcrumb area start  -->
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb" data-background="<?php echo e(url('/uploads/FOREVER-MEDSPA')); ?>/med-spa-banner.jpg"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Deals<br>Cart</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="<?php echo e(url('/')); ?>">Home</a></span></li>
                                        <li><span>Deals Cart</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->
        <?php if(isset($cart) && !empty($cart)): ?>
            <!-- Cart area start  -->
            <div class="cart-area section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-content table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">#</th>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="product-subtotal">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $redeem = 0;
                                            $amount = 0;
                                        ?>
                                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <?php if($item['type'] === 'product'): ?>
                                                        <?php
                                                            $product = App\Models\Product::find($item['id']);
                                                            $image = explode('|', $product->product_image);
                                                            $price = $product->discounted_amount ?? $product->amount;
                                                            $subtotal = $price * $item['quantity'];
                                                            $amount += $subtotal;
                                                            if ($product->giftcard_redemption == 0) {
                                                                $redeem++;
                                                            }
                                                        ?>
                                                        <img src="<?php echo e($image[0]); ?>" style="height:100px; width:100px;"
                                                            onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                                                    <?php elseif($item['type'] === 'unit'): ?>
                                                        <?php
                                                            $unit = App\Models\ServiceUnit::find($item['id']);
                                                            $image = explode('|', $unit->product_image);
                                                            $price = $unit->discounted_amount ?? $unit->amount;
                                                            $subtotal = $price * $item['quantity'];
                                                            $amount += $subtotal;
                                                            if ($unit->giftcard_redemption == 0) {
                                                                $redeem++;
                                                            }
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
                                                <td>
                                                    <?php if($item['type'] === 'product'): ?>
                                                        <?php echo e("$" . $product->discounted_amount ?? "$" . $product->amount); ?>

                                                    <?php elseif($item['type'] === 'unit'): ?>
                                                        <?php echo e("$" . $unit->discounted_amount ?? "$" . $unit->amount); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td class="product-quantity text-center">
                                                    <div class="product-quantity mt-10 mb-10">
                                                        <div class="product-quantity-form">
                                                            <form action="#" class="update-cart-form" data-id="<?php echo e($item['id']); ?>">
                                                                <button type="button" class="cart-minus"><i class="far fa-minus"></i></button>
                                                                <?php if($item['type'] === 'product'): ?>
                                                                    <input class="cart-input" id="cart_qty_<?php echo e($key); ?>" type="number"
                                                                        value="<?php echo e($item['quantity']); ?>" data-id="<?php echo e($item['id']); ?>" min="1">
                                                                <?php elseif($item['type'] === 'unit'): ?>
                                                                    <input class="cart-input" id="cart_qty_<?php echo e($key); ?>" type="number"
                                                                        value="<?php echo e($item['quantity']); ?>" data-id="<?php echo e($item['id']); ?>"
                                                                        min="<?php echo e($unit->min_qty ?? 1); ?>" max="<?php echo e($unit->max_qty ?? 1); ?>">
                                                                <?php endif; ?>
                                                                <button type="button" class="cart-plus"><i class="far fa-plus"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if($item['type'] === 'product'): ?>
                                                        <?php echo e("$" . $item['quantity'] * $product->discounted_amount ?? "$" . $item['quantity'] * $product->amount); ?>

                                                    <?php elseif($item['type'] === 'unit'): ?>
                                                        <?php echo e("$" . $item['quantity'] * $unit->discounted_amount ?? "$" . $item['quantity'] * $unit->amount); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="updateCart(<?php echo e($item['id']); ?>,'<?php echo e($item['type']); ?>','<?php echo e($key); ?>')"
                                                         class="btn btn-block btn-outline-success">Update</a>
                                                    <a href="javascript:void(0)" onclick="removeFromCart('<?php echo e($key); ?>')"
                                                         class="btn btn-block btn-outline-danger">Remove</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            


                            <p class="text-danger mt-4">* Click on Update after increasing or decreasing the quantity to see
                                the changes in the price</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="col-12">
                                            <div class="coupon2">
                                                <button onclick="window.location.href='<?php echo e(route('services')); ?>'"
                                                    class="fill-btn" type="button">
                                                    <span class="fill-btn-inner">
                                                        <span class="fill-btn-normal">+Add More</span>
                                                        <span class="fill-btn-hover">+Add More</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="coupon d-flex align-items-center">
                                            <div class="row">
                                                
                                                <?php if($redeem <= 0): ?>
                                                    <div class="col-9 mt-4">
                                                        <h5>Apply Giftcard </h5>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <input id="gift_number_0"
                                                                    placeholder="Enter Gift Card Number" class="input-text"
                                                                    name="coupon_code" type="text" required>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input id="giftcard_amount_0" placeholder="$0.00"
                                                                    class="input-text" name="coupon_code" type="number"
                                                                    min="0" onkeyup="validateGiftAmount(this)"
                                                                    onchange="validateGiftAmount(this)" readonly
                                                                    style="padding-left: 22px;">

                                                            </div>

                                                            <div class="col-md-3 mt-4">
                                                                <button onclick="validategiftnumber(<?php echo e(0); ?>)"
                                                                     class="btn btn-block btn-outline-success giftcartbutton" type="button">
                                                                    <span class="fill-btn-inner">
                                                                        <span class="fill-btn-normal"><i class="fa fa-check"
                                                                                aria-hidden="true"></i></span>
                                                                        <span class="fill-btn-hover"><i
                                                                                class="fa fa-check"
                                                                                aria-hidden="true"></i></span>
                                                                    </span>
                                                                </button>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <span class="text-danger mt-4" id="error_0"></span>
                                                                <span class="text-success mt-4" id="success_0"></span>
                                                            </div>
                                                            <div id="parentElement"class="mt-4"></div>
                                                            <div class="col-md-5  mt-4">
                                                                <button class="fill-btn" id="addGiftCardButton"
                                                                    type="button">
                                                                    <span class="fill-btn-inner">
                                                                        <span class="fill-btn-normal">Apply More
                                                                            Giftcard</span>
                                                                        <span class="fill-btn-hover">Apply More
                                                                            Giftcard</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul class="mb-20">
                                            <li>Subtotal
                                                <span>$<?php echo e(number_format($amount, 2)); ?></span>

                                            </li>
                                            <li>Total Giftcard Applied <span id="giftcard_applied">$0</span></li>
                                            <li>Tax 0% <span id="tax_amount">
                                                    <?php
                                                        $texamount = ($amount * 0) / 100;
                                                        echo "+$" . $texamount;
                                                    ?>
                                                </span></li>
                                            <li>Total <span
                                                    id="totalValue">$<?php echo e(number_format($amount + $texamount, 2)); ?></span>
                                            </li>
                                        </ul>
                                        <a class="fill-btn" href="javascript:void()" id="submitGiftCards">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Proceed to checkout</span>
                                                <span class="fill-btn-hover">Proceed to checkout</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="disclamer" style="margin-top:50px">
                        <hr>
                        <p>
                            <b class="mt-2">Disclaimer: Giftcards are only applicable if all the services added in the
                                cart has the Giftcard redeem offer activated.
                                For any queries please contact <a href="mailto:admin@forevermedspanj.com">admin@forevermedspanj.com </a></b> 
                    </p>
                    <hr/>
                    </div>
                </div>
                
            </div>
            <!-- Cart area end  -->
        <?php else: ?>
            <h3>Your Cart is Empty</h3> <?php endif; ?>

        </main>
        <!-- Body main wrapper end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footerscript'); ?>
    <script>
        function removeFromCart(id) {
            // alert(id);
            $.ajax({
                url: '<?php echo e(route('cartremove')); ?>',
                method: "POST",
                dataType: "json",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    product_id: id
                },
                success: function(response) {
                    if (response.success) {
                        // Update the cart view, e.g., remove the item from the DOM
                        $('#cart-item-' + id).remove();
                        alert(response.success);
                        location.reload();
                    } else {
                        alert(response.error);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.');
                }
            });
        }



        //  Gift card validation code start

        $(document).ready(function() {
            // Initialize key to a starting value
            var key = 0;
            // Array to store gift card numbers
            var giftCardNumbers = [];

            // Attach the click event to the button
            $('#addGiftCardButton').click(function() {
                // Increment the key for each new set of input fields
                key++;

                var html = `
            <div class="row mt-5" id="row_${key}">
                <div class="col-md-5">
                    <input id="gift_number_${key}" placeholder="Enter Gift Card Number"
                        class="input-text" name="coupon_code" type="text" required>
                </div>
                <div class="col-md-3">
                    <input id="giftcard_amount_${key}" placeholder="$0.00"
                        class="input-text" name="coupon_code" type="number" min="0" onkeyup="validateGiftAmount(this)" onchange="validateGiftAmount(this)" readonly style="padding-left: 22px;">
                </div>
                <div class="col-md-3 mt-4" style="display:flex;">
                    <button onclick="validategiftnumber(${key})"
                         class="btn btn-block btn-outline-success giftcartbutton" type="button">
                        <span class="fill-btn-inner">
                            <span class="fill-btn-normal"><i class="fa fa-check" aria-hidden="true"></i></span>
                            <span class="fill-btn-hover"><i class="fa fa-check" aria-hidden="true"></i></span>
                        </span>
                    </button> 
                    |
                    <button 
                         class="btn btn-block btn-outline-danger giftcartdelete remove-button" type="button" data-key="${key}">
                        <span class="fill-btn-inner">
                            <span class="fill-btn-normal">X</span>
                            <span class="fill-btn-hover">X</span>
                        </span>
                    </button>
                </div>
                <div class="col-md-3 mt-4">
                </div>
                <div class="col-md-12">
                    <span class="text-danger mt-4" id="error_${key}"></span>
                    <span class="text-success mt-4" id="success_${key}"></span>
                </div>
            </div>
        `;

                // Append the HTML to the desired parent element
                $('#parentElement').append(html); // Use the actual ID of the parent element
            });

            // Event delegation for dynamically added Remove buttons
            $(document).on('click', '.remove-button', function() {
                var keyToRemove = $(this).data('key');
                // Remove gift card number from the array
                var giftNumberToRemove = $('#gift_number_' + keyToRemove).val();
                giftCardNumbers = giftCardNumbers.filter(num => num !== giftNumberToRemove);
                $('#row_' + keyToRemove).remove();
                sumValues();
            });

            // Function to validate gift card number
            window.validategiftnumber = function(key) {
                var giftNumber = $('#gift_number_' + key).val();

                // Check if the gift card number is not null or empty
                if (!giftNumber) {
                    alert('Gift Card Number cannot be empty!');
                    $('#error_' + key).html('Gift Card Number cannot be empty.');
                    $('#success_' + key).html('');
                    return;
                }

                if (giftCardNumbers.includes(giftNumber)) {
                    alert('Duplicate Gift Card Number.');
                    $('#gift_number_' + key).val('');
                    $('#error_' + key).html('Duplicate Gift Card Number.');
                    $('#success_' + key).html('');
                    return;
                }

                $.ajax({
                    url: '<?php echo e(route('giftcards-validate')); ?>',
                    method: "post",
                    dataType: "json",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        giftcardnumber: giftNumber,
                        user_token: 'FOREVER-MEDSPA',
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            var totalValueText = $('#totalValue').text();
                            // Remove the '$' symbol and parse it as a number
                            var totalValue = parseFloat(totalValueText.replace('$', '').replace(',',
                                '').trim());
                            // alert(response.actual_paid_amount);
                            // alert(totalValue);
                            if (response.actual_paid_amount > totalValue) {
                                alert(
                                    "The giftcard amount can not be more than the cart total amount");
                                return false; // Stop the execution if invalid
                            }

                            // Add the gift card number to the array
                            giftCardNumbers.push(giftNumber);
                            console.log(response.success);
                            console.log(response.actual_paid_amount);
                            $('#success_' + key).html(
                                response.message);
                            $('#giftcard_amount_' + key).val(response.actual_paid_amount);
                            $('#giftcard_amount_' + key).removeAttr('readonly');
                            $('#giftcard_amount_' + key).attr('max', response.actual_paid_amount);
                            sumValues();
                            $('#error_' + key).html('');
                        } else {
                            alert('Invalid Giftcard. Please enter the correct number');
                            console.log(response.error);
                            $('#error_' + key).html(response.error ||
                                'Invalid Giftcard. Please enter the correct number');
                            $('#success_' + key).html('');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('An error occurred. Please try again.');
                        $('#error_' + key).html('An error occurred. Please try again.');
                        $('#success_' + key).html('');
                    }
                });
            };
        });

        // Gift card validatuon code end

        // Adding Value in session
        $(document).ready(function() {
    $('#submitGiftCards').click(function() {
        var giftCards = [];

        // Add the initial gift card input fields
        var initialGiftNumber = $('#gift_number_0').val();
        var initialGiftAmount = $('#giftcard_amount_0').val();

        if (initialGiftNumber && initialGiftAmount) {
            giftCards.push({
                number: initialGiftNumber,
                amount: initialGiftAmount
            });
        }

        // Add dynamically added gift card input fields
        $('#parentElement .row').each(function() {
            var rowId = $(this).attr('id').split('_')[1];
            var giftNumber = $('#gift_number_' + rowId).val();
            var giftAmount = $('#giftcard_amount_' + rowId).val();

            if (giftNumber && giftAmount) {
                giftCards.push({
                    number: giftNumber,
                    amount: giftAmount
                });
            }
        });

        $.ajax({
            url: '<?php echo e(route('checkout')); ?>',
            method: "post",
            dataType: "json",
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                giftcards: giftCards,
                total_gift_applyed: $('#giftcard_applied').html().replace(/[\$-]/g, '').trim(),
                tax_amount: $('#tax_amount').html().replace(/[\$+]/g, '').trim(),
                totalValue: $('#totalValue').html().replace(/[\$]/g, '').trim()
            },
            success: function(response) {
                if (response.status === 200) {
                    window.location = "<?php echo e(route('checkout_view')); ?>";
                } else {
                    window.location = "<?php echo e(route('patient-login')); ?>";
                }
            },
            error: function(jqXHR) {
                var errorMessage = 'An error occurred while submitting the Gift Cards.';
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    errorMessage += '\n' + jqXHR.responseJSON.message;
                }
                alert(errorMessage);
            }
        });
    });
});


        // Giftcard number adding in session 

        let alertShownCount = 0;

        function validateGiftAmount(inputElement) {
            // Retrieve the maximum allowed value
            var maxValue = parseFloat($(inputElement).attr('max'));
            // Retrieve the current value from the input
            var currentValue = parseFloat($(inputElement).val());

            // If currentValue exceeds maxValue, reset and handle alerts
            if (currentValue > maxValue) {
                if (alertShownCount === 0) {
                    alert('The value entered exceeds the maximum allowed value of ' + maxValue +
                        '. Please enter a valid amount.');
                    alertShownCount++;
                } else {
                    alert('The value entered exceeds the maximum allowed value of ' + maxValue +
                        '. The value has been set to the maximum.');
                }
                // Set the input value to the maximum allowed
                $(inputElement).val(maxValue);
            }

            // Call the sum calculation function to update totals
            sumValues();
        }

        // Sum Calculation Function
        function sumValues() {
            let sum = 0;

            // Iterate through all gift card amount inputs and calculate the sum
            $('input[id^="giftcard_amount_"]').each(function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    sum += value;
                }
            });

            // Retrieve the total value from the cart
            var total_value_from_cart = <?php echo e($amount); ?>;
            var new_final_amount = total_value_from_cart - sum;

            // Calculate the tax amount (10% of the new final amount)
            var taxamount = (new_final_amount * 0) / 100;

            // Update the display values on the page
            $('#totalValue').text('$' + (new_final_amount + taxamount).toFixed(2));
            $('#giftcard_applied').text('-$' + sum.toFixed(2));
            $('#tax_amount').text('+$' + taxamount.toFixed(2));
        }
    </script>



    
    <script>
        // Update Cart
        function updateCart(itemId, itemType, cart_id) {
            var quantity = $('#cart_qty_' + cart_id).val();
            var min = parseInt($('#cart_qty_' + cart_id).attr('min')); // Get the min value
            var max = parseInt($('#cart_qty_' + cart_id).attr('max')); // Get the max value
            // alert(quantity);

            if (quantity <= 0) {
                alert("Quantity must be at least 1");
                return;
            }
            if (quantity < min || quantity > max) {
                alert('Quantity must be between ' + min + ' and ' + max + '.');
                location.reload();
                return false;
            }

            // Send AJAX request to update the cart
            $.ajax({
                url: '<?php echo e(route('update-cart')); ?>', // Replace with your actual route
                method: 'POST',
                data: {
                    id: itemId,
                    type: itemType,
                    quantity: quantity,
                    key: cart_id,
                    _token: '<?php echo e(csrf_token()); ?>' // CSRF token for security
                },
                success: function(response) {
                    if (response.status === '200') {
                        console.log("Cart updated successfully!");
                        location.reload();
                    } else {
                        alert(response.error || "Failed to update the cart.");
                    }
                },
                error: function() {
                    alert("An error occurred while updating the cart.");
                }
            });
        }


        // Event Listeners
        // $(document).on('click', '.cart-minus', function() {
        //     const input = $(this).closest('.update-cart-form').find('.cart-input');
        //     const itemId = input.data('id');
        //     let quantity = parseInt(input.val(), 10) - 1;
        //     input.val(quantity);
        //     updateCart(itemId, quantity);
        // });

        // $(document).on('click', '.cart-plus', function() {
        //     const input = $(this).closest('.update-cart-form').find('.cart-input');
        //     const itemId = input.data('id');
        //     let quantity = parseInt(input.val(), 10) + 1;
        //     input.val(quantity);
        //     updateCart(itemId, quantity);
        // });

        // $(document).on('keyup change', '.cart-input', function() {
        //     const itemId = $(this).data('id');
        //     const quantity = parseInt($(this).val(), 10);
        //     updateCart(itemId, quantity);
        // });
    </script>





    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/product/cart.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forever MedSpa - Book an Appointment</title>
    <link rel="stylesheet" href="{{url('/medspatemplate/css')}}/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
     @stack('csslink')
     
         @stack('css');
     
</head>

<body>
    <!-- Page Header -->
    <x-front_header/>
    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-sidebar-overlay" id="cartSidebarOverlay"></div>
        <div class="cart-sidebar-content">
            <div class="cart-sidebar-header">
                <h3><i class="fas fa-shopping-cart"></i> Your Cart</h3>
                <button class="cart-close-btn" id="cartCloseBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="cart-sidebar-body" id="cartSidebarBody">
                <div class="empty-cart" id="emptyCart">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>Your cart is empty</h4>
                    <p>Add some treatments to get started!</p>
                </div>

                <div class="cart-items" id="cartItems">
                    <!-- Cart items will be dynamically added here -->
                </div>
            </div>

            <div class="cart-sidebar-footer" id="cartSidebarFooter" style="display: none;">
                <div class="cart-total">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span id="cartSubtotal">$0</span>
                    </div>
                    <div class="total-row total-final">
                        <span>Total:</span>
                        <span id="cartTotal">$0</span>
                    </div>
                </div>
                <div class="cart-actions">
                    <button class="btn-secondary" id="clearCartBtn">
                        <i class="fas fa-trash"></i>
                        Clear Cart
                    </button>
                    <button class="btn-primary" id="checkoutBtn">
                        <i class="fas fa-credit-card"></i>
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="background-pattern"></div>
    @yield('body')
    
    <!-- Website Footer -->
   <x-footer/>

  <script src="{{url('/medspatemplate/js')}}/script.js"></script>
    @stack('footerscript')
</body>

</html>

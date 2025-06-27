@push('css')

<header class="page-header">
    <div class="header-container">
        <div class="header-logo">
            <div class="logo-icon-header">
                <i class="fas fa-spa"></i>
            </div>
            <div class="logo-text">
                <h1>Forever MedSpa</h1>
                <span class="tagline">& WELLNESS CENTER</span>
            </div>
        </div>

        <nav class="header-nav">
            <a href="https://forevermedspanj.com/" class="nav-link">Home</a>
            <a href="{{ url('/') }}" class="nav-link">Giftcards</a>
            <a href="{{ route('services') }}" class="nav-link">Services</a>
            @if (Session::get('patient_details'))
                <a class="nav-link"
                    href="{{ route('patient-dashboard') }}">{{ Auth::guard('patient')->user()->fname }}</a>
            @else
                <a class="nav-link" href="{{ url('/patient-login') }}">Login</a>
            @endif
            @php
                $cart = session()->get('cart', []);
                $cartCount = count($cart);
            @endphp

            <div class="cart-icon" id="cartIcon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count {{ $cartCount === 0 ? 'hiddencount' : '' }}" id="cartCount">
                    {{ $cartCount }}
                </span>
            </div>
        </nav>
    </div>
</header>

@php
$cart = session()->get('cart', []);
 $redeem = 0;
$amount = 0;
    @endphp
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
    <div class="empty-cart" id="emptyCart" @if(!isset($cart) || empty($cart)) style="display: block;" @else style="display: none;" @endif>
        <i class="fas fa-shopping-cart"></i>
        <h4>Your cart is empty</h4>
        <p>Add some treatments to get started!</p>
    </div>

    @php $amount = 0; $redeem = 0; @endphp
    @if (!empty($cart))
    <div class="cart-items" id="cartItems" @if(empty($cart)) style="display: none;" @else style="display: block;" @endif>
            @foreach ($cart as $key => $item)
                @php
                    $product = App\Models\Product::find($item['id']);
                    $image = explode('|', $product->product_image);
                    $price = $product->discounted_amount ?? $product->amount;
                    $subtotal = $price * $item['quantity'];
                    $amount += $subtotal;
                    if ($product->giftcard_redemption == 0) {
                        $redeem++;
                    }
                @endphp

                <div class="cart-item" id="cartItem_{{ $key }}">
                    <div class="cart-item-header">
                        <div class="cart-item-title">{{ $product->product_name }}</div>
                        <button class="cart-item-remove" onclick="removeFromCart('{{ $key }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="cart-item-details">
                        <div class="cart-item-quantity">
                            <div class="cart-quantity-controls">
                                <button class="cart-quantity-btn" onclick="updateCartItemQuantity('{{ $key }}', {{ $item['quantity'] - 1 }})" {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="cart-quantity-display" id="qty_{{ $key }}">{{ $item['quantity'] }}</span>

                                <button class="cart-quantity-btn" onclick="updateCartItemQuantity('{{ $key }}', {{ $item['quantity'] + 1 }})">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-item-price">$ {{ number_format($subtotal, 2) }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="cart-sidebar-footer" id="cartSidebarFooter" style="display: block;">
            <div class="cart-total">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span id="cartSubtotal">${{ number_format($amount, 2) }}</span>
                </div>
                <div class="total-row total-final">
                    <span>Total:</span>
                    <span id="cartTotal">${{ number_format($amount, 2) }}</span>
                </div>
            </div>
            <div class="cart-actions">
                <button class="btn-secondary" id="clearCartBtn">
                    <i class="fas fa-trash"></i>
                    Clear Cart
                </button>
                <button class="btn-primary" id="checkoutBtn" onclick="window.location.href='{{ route('checkout') }}'">
                    <i class="fas fa-credit-card"></i>
                    Proceed to Checkout
                </button>
            </div>
        </div>
        @endif
</div>


        
    </div>
</div>

@push('footerscript')
    <script>
        function removeFromCart(id) {
            // alert(id);
            $.ajax({
                url: '{{ route('cartremove') }}',
                method: "POST",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
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
        </script>

           </script>
     {{-- For Clear All Cart Value --}}
     <script>
    document.getElementById('clearCartBtn').addEventListener('click', function () {
        if (!confirm("Are you sure you want to clear your cart?")) return;

        $.ajax({
            url: '{{ route("cart.clear") }}', // Make sure this route exists in web.php
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    location.reload(); // Or update sidebar dynamically
                } else {
                    alert(response.message || "Failed to clear cart.");
                }
            },
            error: function () {
                alert("An error occurred while clearing the cart.");
            }
        });
    });
</script>
@endpush

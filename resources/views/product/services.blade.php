@extends('layouts.front-master')
@section('body')
@push('csslink')
<style>
      .hiddencount {
    display: none !important;
    
}
.toast-success {
  position: fixed;
  top: 20px;
  right: 20px;
  background-color: #28a745;
  color: white;
  padding: 12px 20px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
  opacity: 0;
  z-index: 9999;
  transition: opacity 0.4s ease, transform 0.3s ease;
  transform: translateY(-20px);
  pointer-events: none;
}
.toast-success.show {
  opacity: 1;
  transform: translateY(0);
}
</style>
@endpush
    

<div class="container">
    <div id="successToast" class="toast-success"></div>
        <!-- Left Side - Business Info -->
        <div class="business-card">
            <div class="card-glow"></div>
            <div class="business-header">
                <div class="logo-section">
                    <div class="logo-icon">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h1>Forever MedSpa</h1>
                </div>
            </div>

            <div class="business-description">
                <p>At <strong>Forever Medspa & Wellness Center</strong>, we offer Botox, Fillers, RF, RFMN, Laser Hair
                    Reduction, Facials, Microneedling, and Advanced Skin and Body treatments—customized to your unique
                    needs. We believe aesthetic care should be as personal as you are.</p>
            </div>

            <div class="categories">
                <div class="categories-header">
                    <h3><i class="fas fa-th-large"></i> Treatment Categories</h3>
                </div>

                <!-- Category Search -->
                <div class="category-search-container">
                    <input type="text" id="categorySearch" class="category-search-input"
                        placeholder="Search categories..." autocomplete="off">
                    <i class="fas fa-search category-search-icon"></i>
                    <button class="clear-category-search-btn" id="clearCategorySearch" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="categories-list" id="categoriesList">
                    @foreach ($category as $value)
                    
                    <div class="category-item" data-category="botox">
                        <div class="category-content">
                            <h4>{{$value->cat_name??''}}</h4>
                        </div>
                    </div>
                    @endforeach

                    
                </div>
            </div>

            <div class="contact-info">
                <div class="contact-item website">
                    <div class="contact-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="contact-details">
                        <span class="contact-label">Website</span>
                        <a href="https://www.forevermedspanj.com" target="_blank">forevermedspanj.com</a>
                    </div>
                </div>
                <div class="contact-item phone">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <span class="contact-label">Phone</span>
                        <a href="tel:+12013404809">(201) 340-4809</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Service Selection -->
        <div class="service-selection">
            <div class="card-glow"></div>
            <div class="service-header">
                <div class="header-content">
                    <h2><i class="fas fa-list-ul"></i> Choose a Service Category</h2>
                    <p>Select from our premium treatment options</p>
                </div>
                <div class="search-container">
                    <input type="text" id="serviceSearch" class="search-input"
                        placeholder="Search treatments (e.g., Botox, Laser, Facials...)" autocomplete="off">
                    <i class="fas fa-search search-icon"></i>
                    <button class="clear-search-btn" id="clearSearch" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="search-dropdown" id="searchDropdown"></div>
                </div>
            </div>

            <div class="service-options">
                <!-- Service Option 1 -->
                 @if (isset($data))
                @foreach ($data as $value)
                
                <div class="service-card">
                    <div class="service-card-header">
                        <h3>{{ $value['product_name'] }}</h3>
                        <div class="service-price">From ${{$value['amount']}}</div>
                        @if($value['popular_service']!=null && $value['popular_service'] == 1)
                        <div class="service-badge">Popular</div>
                        @endif
                    </div>

                    <div class="service-description">
                        <p>{!! $value['short_description'] !!}</p>

                            <button class="read-more-btn" onclick="toggleReadMore(this)">
                                <span>Read More</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </p>

                        <div class="hidden-content">
                            <p>muscle contractions that cause dynamic wrinkles. It's FDA-approved and has been safely
                                used for cosmetic purposes for over 20 years. Our experienced practitioners ensure
                                natural-looking results that enhance your beauty.</p>
                        </div>
                    </div>

                    <div class="service-footer">
                        <div class="service-info">
                            <div class="price">
                                <i class="fas fa-tag"></i>
                                <span class="price-display">From ${{$value['discounted_amount']}}</span>
                            </div>
                        </div>
                        <div class="quantity-controls" style="display: none;">
                            <button class="quantity-btn minus-btn" onclick="updateQuantity(this, -1)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="quantity-display">1</span>
                            <button class="quantity-btn plus-btn" onclick="updateQuantity(this, 1)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                       <button
                                class="book-now-btn"
                                onclick="toggleQuantityControls(this)"
                                data-base-price="{{$value['discounted_amount']}}"
                                data-id="{{$value['id']}}">
                                <span>Book Now</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>

                    </div>
                </div>
                   @endforeach
                    @else
                        <p>{{ $data['error'] }}</p>
                    @endif

                
            </div>
        </div>
    </div>
    @endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @push('footerscript')
       <script>
        function addcart(id, quantity) {
    $.ajax({
        url: '{{ route('cart') }}',
        method: "POST",
        dataType: "json",
        data: {
            _token: '{{ csrf_token() }}',
            product_id: id,
            quantity: quantity,
            type: "product"
        },
        success: function (response) {
            if (response.success) {
                const quantityDisplay = document.querySelector('#cartCount');

                if (quantityDisplay) {
                    quantityDisplay.style.transform = "scale(1.2)";
                    setTimeout(() => {
                        quantityDisplay.style.transform = "scale(1)";
                    }, 150);
                }

                // Show success toast
                const toast = document.getElementById('successToast');
                if (toast) {
                    toast.classList.add('show');
                    setTimeout(() => {
                        toast.classList.remove('show');
                    }, 3000);
                }
                location.reload();
                // Optional: Refresh cart sidebar if needed
                // updateCartSidebar(response.cartItems); // Uncomment if you handle cart updates dynamically
            } else {
                $('.showbalance').html(response.error ?? 'Something went wrong.').show();
            }
        },
        error: function () {
            $('.showbalance').html('An error occurred. Please try again.').show();
        }
    });
}

// For Update Cart Item Quantity
function updateCartItemQuantity(key, newQuantity) {
    if (newQuantity < 1) return;

    // 1. Update the quantity display immediately in the DOM
    const qtySpan = document.getElementById(`qty_${key}`);
    if (qtySpan) {
        qtySpan.textContent = newQuantity;
    }

    // 2. Send AJAX to update the session/cart on server
    $.ajax({
        url: '{{ route("update-cart") }}',
        type: 'POST',
        dataType: 'json',
        data: {
            _token: '{{ csrf_token() }}',
            key: key,
            quantity: newQuantity
        },
        success: function (response) {
            if (response.success) {
                // Optionally update sidebar totals or UI
                updateCartSidebar(response.cartHtml, response.cartSubtotal, response.cartTotal, response.cartCount);

                const toast = document.getElementById('successToast');
                if (toast) {
                    toast.textContent = "Cart updated successfully ✅";
                    toast.classList.add('show');
                    setTimeout(() => toast.classList.remove('show'), 3000);
                }
                location.reload();
            }
        },
        error: function () {
            alert('Something went wrong while updating the cart.');
        }
    });
}
     
  

    @endpush


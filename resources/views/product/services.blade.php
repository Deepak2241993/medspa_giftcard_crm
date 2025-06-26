@extends('layouts.front-master')
@section('body')
    

<div class="container">
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
                        <button class="book-now-btn" onclick="toggleQuantityControls(this)" data-base-price="{{$value['discounted_amount']}}">
                            <span>Book Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                   @endforeach
                    @else
                        <p>{{ $data['error'] }}</p>
                    @endif

                <!-- Service Option 2 -->
                {{-- <div class="service-card">
                    <div class="service-card-header">
                        <h3>Botox/Xeomin/Dysport/Letybo - Repeat Client</h3>
                        <div class="service-price">From $269</div>
                        <div class="service-badge discount">10% Off</div>
                    </div>

                    <div class="service-description">
                        <p>At <strong>Forever Medspa & Wellness Center</strong>, we offer expertly tailored Botox and
                            neuromodulator treatments to <strong>smooth expression lines</strong> and <strong>enhance
                                natural facial balance</strong>. Every treatment is customized based on your
                            <strong>unique facial anatomy</strong>, expression pattern, and goals.</p>

                        <p>Botox is the brand name for <strong>Botulinum Toxin A</strong>, a purified protein that
                            temporarily <strong>relaxes</strong>...
                            <button class="read-more-btn" onclick="toggleReadMore(this)">
                                <span>Read More</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </p>

                        <div class="hidden-content">
                            <p>muscle contractions that cause dynamic wrinkles. This service is specifically designed
                                for returning clients who have had previous treatments. Enjoy special pricing and
                                priority booking as a valued repeat customer.</p>
                        </div>
                    </div>

                    <div class="service-footer">
                        <div class="service-info">
                            <div class="price">
                                <i class="fas fa-tag"></i>
                                <span class="price-display">From $269</span>
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
                        <button class="book-now-btn" onclick="toggleQuantityControls(this)" data-base-price="269">
                            <span>Book Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @endsection

    @push('footerscript')
      
    @endpush


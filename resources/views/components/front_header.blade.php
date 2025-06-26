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
                <a href="{{url('/')}}" class="nav-link">Giftcards</a>
                <a href="{{route('services')}}" class="nav-link">Services</a>
                 @if(Session::get('patient_details'))
                     <a class="nav-link" href="{{route('patient-dashboard')}}">{{ Auth::guard('patient')->user()->fname }}</a>
                    @else
                     <a class="nav-link" href="{{url('/patient-login')}}">Login</a>
                     @endif
                     @php
                    $cart = session()->get('cart', []);
                    $amount=0;
                    
                    @endphp
                <div class="cart-icon" id="cartIcon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count" id="cartCount">{{ count(session()->get('cart', [])) ? count(session()->get('cart', [])) : 0 }}</span>
                </div>
            </nav>
        </div>
    </header>
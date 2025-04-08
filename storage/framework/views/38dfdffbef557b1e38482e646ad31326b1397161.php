<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/images/gifts/logo.png')); ?>" alt="image" style="height:81px;" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="https://forevermedspanj.com/" target="_blank">Home</a></li>
                    
                    <li><a class="nav-link active" href="<?php echo e(url('/')); ?>">Giftcards</a></li> 
                    
                   
                    <?php if(Session::get('patient_details')): ?>
                     <li><a class="nav-link" href="<?php echo e(route('patient-dashboard')); ?>"><?php echo e(Auth::guard('patient')->user()->fname); ?></a></li> 
                    <?php else: ?>
                     <li><a class="nav-link" href="<?php echo e(url('/patient-login')); ?>">Login</a></li> 
                     <?php endif; ?>
                    
                    <?php
                    $cart = session()->get('cart', []);
                    $amount=0;
                    
                    ?>
                    <?php if(count(session()->get('cart', []))>0): ?>
                    <div id="cart"  class="btn btn-group">
                        <button onclick="window.location.href='<?php echo e(route('cartview')); ?>'" type="button" data-toggle="dropdown" data-loading-text="Loading..."  class="btn btn-inverse btn-lg dropdown-toggle"><i class="fa fa-shopping-bag"></i> <span id="cart-total" class="hidden-xs"><?php echo e(count(session()->get('cart', [])) ? count(session()->get('cart', [])) : 0); ?>

                        </span></button>
                        
                    </div>
                    <?php endif; ?>
                   
                    
                    
                </ul>
              
            </div>
        </div>
    </nav>
</header><?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/components/front_header.blade.php ENDPATH**/ ?>
       <!--begin::Start Navbar Links-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(route('patient-dashboard')); ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(url('/')); ?>" target="_blank" class="nav-link">View Website</a>
      </li>
      <?php if(count(session()->get('cart', []))>0): ?>
      <li class="nav-item d-none d-sm-inline-block">
                  <div id="cart"  class="btn btn-block-group btn-block">
                      <button onclick="window.location.href='<?php echo e(route('service-cart')); ?>'" type="button" data-toggle="dropdown" data-loading-text="Loading..."  class="btn btn-block btn-inverse btn-block btn-lg dropdown-toggle"><i class="fa fa-shopping-bag"></i> <span id="cart-total" class="hidden-xs"><?php echo e(count(session()->get('cart', [])) ? count(session()->get('cart', [])) : 0); ?>

                      </span></button>
                      
                  </div>
      </li>
             <?php endif; ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
    <ul class="navbar-nav ms-auto">
      <!-- User Menu Dropdown -->
      <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img src="<?php echo e(Auth::guard('patient')->user()->image ? URL::asset(Auth::guard('patient')->user()->image) : URL::asset('medspa.png')); ?>" 
                   class="user-image rounded-circle shadow" alt="User Image">
              <span class="d-none d-md-inline"><?php echo e(Auth::guard('patient')->user()->fname); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!-- User Image -->
              <li class="user-header text-bg-primary">
                  <img src="<?php echo e(Auth::guard('patient')->user()->image ? URL::asset(Auth::guard('patient')->user()->image) : URL::asset('medspa.png')); ?>" 
                       class="rounded-circle shadow" alt="User Image">
                  <p>
                      <?php echo e(Auth::guard('patient')->user()->fname); ?>

                  </p>
              </li>
              <!-- Menu Footer -->
              <li class="user-footer">
                  <a href="#" class="btn btn-block btn-default btn-flat">Profile</a>
                  <a href="<?php echo e(url('/logout')); ?>" class="btn btn-block btn-default btn-flat float-end">Sign out</a>
              </li>
          </ul>
      </li>
  </ul>
  
  </nav><?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/components/patient_top_bar.blade.php ENDPATH**/ ?>
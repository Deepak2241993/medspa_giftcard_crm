       <!--begin::Start Navbar Links-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(url('/users/user-dashboard')); ?>" class="nav-link">Home</a>
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
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button  class="btn btn-block btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button  class="btn btn-block btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
    <ul class="navbar-nav ms-auto">
           <!--end::Notifications Dropdown Menu-->
           <!--begin::User Menu Dropdown-->
           <li class="nav-item dropdown user-menu">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                   <img src="
                   <?php if(Auth::user()->avatar != ''): ?> 
                   <?php echo e(URL::asset(Auth::user()->avatar)); ?>

                    <?php else: ?><?php echo e(URL::asset('medspa.png')); ?> <?php endif; ?>"
                       class="user-image rounded-circle shadow" alt="User Image">
                   <span class="d-none d-md-inline"><?php echo e(Auth::user()->name); ?></span>
               </a>
               <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                   <!--begin::User Image-->
                   <li class="user-header text-bg-primary">
                       <img src="<?php if(Auth::user()->avatar != ''): ?> <?php echo e(URL::asset(Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('medspa.png')); ?> <?php endif; ?>"
                           class="rounded-circle shadow" alt="User Image">

                       <p>
                           <?php echo e(Auth::user()->name); ?>

                          
                       </p>
                   </li>
                   <!--end::User Image-->

                   <!--begin::Menu Footer-->
                   <li class="user-footer">
                       <a href="#"  class="btn btn-block btn-default btn-flat">Profile</a>
                       <a href="<?php echo e(url('/logout')); ?>"  class="btn btn-block btn-default btn-flat float-end">Sign out</a>
                   </li>
                   <!--end::Menu Footer-->
               </ul>
           </li>
           <!--end::User Menu Dropdown-->
       </ul>
  </nav><?php /**PATH /home/u929332160/domains/thetemz.in/public_html/medspa-giftcard/resources/views/components/topbar.blade.php ENDPATH**/ ?>
<?php if(Auth::user()->user_type == 1): ?>
    

    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo e(route('root')); ?>" class="brand-link">
            <img src="<?php echo e(url('/medspa.png')); ?>" alt="Forever Medspa" class="brand-image img-circle elevation-3"
                style="opacity: .8" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
            <span class="brand-text font-weight-light">Forever Medspa</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="overflow-x: auto; overflow-y: auto; max-height: 100vh; max-width: 100%;">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php if(Auth::user()->avatar != ''): ?> <?php echo e(URL::asset(Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('medspa.png')); ?> <?php endif; ?>"
                        class="img-circle elevation-2" alt="User Image" onerror="this.onerror=null; this.src='<?php echo e(url('/No_Image_Available.jpg')); ?>';">
                </div>
                <div class="info">
                    <a href="#" class="d-block"> <?php echo e(Auth::user()->name); ?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button  class="btn btn-block btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('product-dashboard')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                     
                    
                    <li class="nav-header">Manage</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-gift"></i>
                            <p>
                                Manage
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">5</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-heartbeat"></i>
                                        <p>
                                            Giftcards
                                            <i class="fas fa-angle-left right"></i>
                                            <span class="badge badge-info right">2</span>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('cardgenerated-list')); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Giftcard Orders</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('giftcardredeem-view')); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Giftcard Redeem</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-heartbeat"></i>
                                        <p>
                                            Services
                                            <i class="fas fa-angle-left right"></i>
                                            <span class="badge badge-info right">2</span>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('service-order-history.index')); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Service Orders</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('service-redeem-view')); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Service Redeem</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('patient.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>  Patient List</p>
                                </a>
                            </li>
                                                      
                           
                        </ul>
                    </li>



                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-user-md"></i>
                            <p>
                                In Clinic
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('giftcards-sale')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sale Gift Card</p>
                                </a>
                            </li>
                            
                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('product.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Service & Deals Sale</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>


                    
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-user-md"></i>
                            <p>
                                Create
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">10</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-user-md"></i>
                                    <p>
                                        Program Management
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">2</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('program.index')); ?>" class="nav-link">
                                            <i class="nav-icon fas fa-book-medical"></i>
                                            <p>
                                                Program List
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('program.create')); ?>" class="nav-link">
                                            <i class="nav-icon fas fa-book-medical"></i>
                                            <p>
                                                Program Add
                                            </p>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('category.index')); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>
                                        Deals Management
    
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('product.index')); ?>" class="nav-link">
                                    <i class="nav-icon fa fa-user-md"></i>
                                    <p>
                                        Services Management
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('unit.index')); ?>" class="nav-link">
                                    <i class="nav-icon fa fa-user-md"></i>
                                    <p>
                                        Unit Management
                                    </p>
                                </a>
                            </li>
                           

                            <li class="nav-item">
                                <a href="<?php echo e(route('terms.index')); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-book-medical"></i>
                                    <p>
                                        Terms & Condition
                                    </p>
                                </a>
                            </li>

                          
                            <li class="nav-item">
                                <a href="<?php echo e(route('coupon.index')); ?>" class="nav-link">
                                    <i class="nav-icon fa fa-barcode"></i>
                                    <p>
                                        Create Coupon
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            
        
                            <li class="nav-item">
                                <a href="<?php echo e(route('email-template.index')); ?>" class="nav-link">
                                    <i class="nav-icon far fa-envelope"></i>
                                    <p>
                                        Email Template
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('banner.index')); ?>" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>
                                        Slider Management
                                    </p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                    
                    
                    <li class="nav-item">
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                     
                        <a href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fa fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                   


                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php else: ?>
    No data
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\medspa_giftcard_crm\resources\views/components/sidebar.blade.php ENDPATH**/ ?>
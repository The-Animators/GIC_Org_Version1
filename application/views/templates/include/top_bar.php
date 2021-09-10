<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
               
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
             
            </li>

            <!-- <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/flags/us.jpg" alt="lang-image" height="12">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?php echo base_url(); ?>assets/images/flags/germany.jpg" alt="lang-image" class="mr-1" height="12"> <span class="align-middle">German</span>
                    </a>

                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?php echo base_url(); ?>assets/images/flags/italy.jpg" alt="lang-image" class="mr-1" height="12"> <span class="align-middle">Italian</span>
                    </a>

                   
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?php echo base_url(); ?>assets/images/flags/spain.jpg" alt="lang-image" class="mr-1" height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?php echo base_url(); ?>assets/images/flags/russia.jpg" alt="lang-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
                    </a>

                </div>
            </li> -->

            <!-- <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <div class="dropdown-header noti-title">
                        <h5 class="text-overflow m-0"><span class="float-right">
                                <span class="badge badge-danger float-right">5</span>
                            </span>Notification</h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                            <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                        </a>

                     
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-settings-outline"></i>
                            </div>
                            <p class="notify-details">New settings
                                <small class="text-muted">There are new settings available</small>
                            </p>
                        </a>

                   
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning">
                                <i class="mdi mdi-bell-outline"></i>
                            </div>
                            <p class="notify-details">Updates
                                <small class="text-muted">There are 2 new updates available</small>
                            </p>
                        </a>

                     
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="<?php echo base_url(); ?>assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user
                                <small class="text-muted">You have 10 unread messages</small>
                            </p>
                        </a>

                      
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                       
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li> -->

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                <?php if(!empty($this->session->userdata("@_staff_profile"))): ?>
                    <img src="<?php echo base_url(); ?>assets/staff/staff_profile/<?php echo $this->session->userdata("@_staff_profile"); ?>" alt="user-image" class="rounded-circle">
                <?php else: ?>
                    <img src="<?php echo base_url(); ?>assets/gic_img/user/user_profile.jpg" alt="user-image" class="rounded-circle">
                <?php endif; ?>
                    <!-- <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle"> -->
                    <span class="pro-user-name ml-1 ">
                    <?php if(!empty($this->session->userdata("@_staff_name"))): ?>
                        <?php echo ucwords($this->session->userdata("@_staff_name")); ?> <i class="mdi mdi-chevron-down"></i>
                        <?php else: ?>
                        Maxine K <i class="mdi mdi-chevron-down"></i>
                        <?php endif; ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0"><?php if(!empty($this->session->userdata("@_user_role_title"))): echo ucwords($this->session->userdata("@_user_role_title")); else: echo "NA"; endif; ?></h6>
                    </div>

                    <!-- item-->
                    <a href="<?php echo base_url(); ?>master/staff/myprofile" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Profile</span>
                    </a>

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a> -->

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Lock Screen</span>
                    </a> -->

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item notify-item" >
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item"> onclick="onLogOut()"-->
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

            <!-- <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li> -->


        </ul>

        <!-- LOGO -->
        <div class="logo-box">

            <a href="<?php echo base_url(); ?>/master/insurance_company_details" class="logo text-center logo-dark">
                <span class="logo-lg">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gic_img/gic_logo_new.png" >
  <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gic_img/gic_logo.jpeg" > -->
                    <img src="<?php echo base_url(); ?>assets/gic_img/gic_logo_new.png" alt="Insurence Sathi Maintaining Trust" style="max-height: 73px;max-width: 160px;"  height="64" width="80">
                    <!-- <img src="<?php echo base_url(); ?>assets/gic_img/gic_logo.jpeg" alt="" style="max-height: 65px;max-width: 80px;"> -->
                    <!-- <span class="logo-lg-text-dark">Adminox</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-lg-text-dark">A</span> -->
                    <img src="<?php echo base_url(); ?>assets/gic_img/gic_logo_new.png" alt="" height="64" width="80">
                </span>
            </a>

            <a href="<?php echo base_url(); ?>/master/insurance_company_details" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="<?php echo base_url(); ?>assets/gic_img/gic_logo_new.png" alt="" height="24">
                    <!-- <img src="<?php echo base_url(); ?>assets/gic_img/gic_logo.jpeg" alt="" height="24"> -->
                    <!-- <span class="logo-lg-text-dark">Adminox</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-lg-text-dark">A</span> -->
                    <img src="<?php echo base_url(); ?>assets/images/logo-sm.png" alt="" height="24">
                </span>
            </a>
        </div>

        <!-- <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>
        </ul> -->
        <div class="clearfix"></div>
    </div>
</div>

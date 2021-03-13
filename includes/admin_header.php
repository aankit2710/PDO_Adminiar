<link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/dragula.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">
    <!-- END: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/sweet-alert2/sweetalert2.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-analytics.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/page-user-profile.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="horizontal-layout horizontal-menu navbar-sticky 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed bg-primary navbar-brand-center">
      <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item"><a class="navbar-brand" href="../index.php">
              <div class="brand-logo"><img class="logo" src="app-assets/images/logo/logo-light.png"></div>
              <h2 class="brand-text mb-0">Administrator</h2></a></li>
        </ul>
      </div>
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu mr-auto"><a class="nav-link nav-menu-main menu-toggle" href="#"><i class="bx bx-menu"></i></a></li>
              </ul>
              <ul class="nav navbar-nav">                
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
              <!--<li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>-->
              <!--  <ul class="dropdown-menu dropdown-menu-media dropdown-menu-left">-->
              <!--    <li class="dropdown-menu-header">-->
              <!--      <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span></div>-->
              <!--    </li>-->
              <!--    <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">-->
              <!--        <div class="media d-flex align-items-center">-->
              <!--          <div class="media-left pr-0">-->
              <!--            <div class="avatar mr-1 m-0"><img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="39" width="39"></div>-->
              <!--          </div>-->
              <!--          <div class="media-body">-->
              <!--            <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>-->
              <!--          </div>-->
              <!--        </div></a>-->
              <!--    </li>-->
              <!--    <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>-->
              <!--  </ul>-->
              <!--</li>-->
              </ul>
            </div>
            <ul class="nav navbar-nav float-right d-flex align-items-center">
              <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <div class="user-nav d-lg-flex d-none">
                    <span class="user-name"><?=$admin_name?></span>
                    <span class="user-status">Available</span>
                  </div>
                  <span>
                    <img class="round" src="<?=($admin_pic)?"../uploads/profile/$admin_pic":"app-assets/images/user-image.jpg"?>" alt="avatar" height="40" width="40">
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right pb-0">
                  <a class="dropdown-item" href="user_profile.php"><i class="bx bx-user mr-50"></i>Profile</a>
                  <a class="dropdown-item" href="user_profile.php"><i class="bx bx-user mr-50"></i>Change Password</a>
                  <div class="dropdown-divider mb-0"></div>
                  <a class="dropdown-item" href="auth-logout.php"><i class="bx bx-power-off mr-50"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->
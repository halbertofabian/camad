<?php ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>S.E.A.D - SYSTEM </title>
    <link rel="apple-touch-icon" href="<?php echo  HTTP_HOST . 'app/assets/' ?>images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo  ICON_APP ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  HTTP_HOST . 'app/assets/' ?>css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets-app/' ?>css/style.css">

    <!-- END: Custom CSS-->

    <!-- fonts -->



    <!-- dataTables  -->
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/'  ?>assets/vendors/css/tables/datatable/datatables.min.css">

    <!-- DataTables -->
    <link href="<?php echo HTTP_HOST ?>app/assets/plugin/datatables-1/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo HTTP_HOST ?>app/assets/plugin/datatables-1/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo HTTP_HOST ?>app/assets/plugin/datatables-1/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Toastr -->
    <link href="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/toastr/build/toastr.min.css" rel="stylesheet" />

    <link href="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/select2-c/css/select2.min.css" rel="stylesheet" />

    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/charts/apexcharts.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/extensions/tether.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <!-- END: Page Vendor JS


    <!-- Summernote -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/summernote/summernote-bs4.min.js"></script>
    <!-- Number Jquery -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/jquery-number/jquery.number.js"></script>

    <!-- Toastr -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/toastr/build/toastr.min.js"></script>
    <!-- BEGIN: Page JS-->
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>js/scripts/pages/dashboard-analytics.js"></script>

    <!-- <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>plugin/select2/select2.full.min.js"></script> -->
    <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>plugin/select2-c/js/select2.min.js"></script>



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<?php if (isset($_SESSION['session']) && $_SESSION['session']) :


?>

    <body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

        <div class="urlApp" urlApp="<?php echo HTTP_HOST ?>"></div>
        <div class="session" session='<?php echo json_encode($_SESSION, true) ?>'></div>



        <!-- END: Header-->
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
            <div class="navbar-header d-xl-block d-none">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item"><a class="navbar-brand" href="">
                            <div class="brand-logo"></div>
                        </a></li>
                </ul>
            </div>
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav bookmark-icons">
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link" href="<?php echo HTTP_HOST ?>">
                                        <img src="<?php echo  ICON_APP ?>" width="31" alt="">
                                        <!-- <i class="ficon feather icon-check-square"></i> -->
                                    </a>
                                </li>
                                <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li> -->
                            </ul>
                            <!-- <ul class="nav navbar-nav">
                                <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                    <div class="bookmark-input search-input">
                                        <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                        <ul class="search-list search-list-bookmark"></ul>
                                    </div>
                                </li>
                            </ul> -->
                        </div>
                        <ul class="nav navbar-nav float-right">
                            <!-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                            </li> -->
                            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                            <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                                <div class="search-input">
                                    <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="template-list">
                                    <div class="search-input-close"><i class="feather icon-x"></i></div>
                                    <ul class="search-list search-list-main"></ul>
                                </div>
                            </li> -->
                            <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <div class="dropdown-header m-0 p-2">
                                            <h3 class="white">5 New</h3><span class="notification-title">App
                                                Notifications</span>
                                        </div>
                                    </li>
                                    <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                                <div class="media-body">
                                                    <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me
                                                        tonight?</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours
                                                        ago</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                                <div class="media-body">
                                                    <h6 class="success media-heading red darken-1">99% Server load</h6>
                                                    <small class="notification-text">You got new order of goods.</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour
                                                        ago</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                                <div class="media-body">
                                                    <h6 class="danger media-heading yellow darken-3">Warning notifixation
                                                    </h6><small class="notification-text">Server have 99% CPU usage.</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                                <div class="media-body">
                                                    <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last
                                                        week</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                                <div class="media-body">
                                                    <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu
                                                        marzipan</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last
                                                        month</time></small>
                                            </div>
                                        </a></li>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                                </ul>
                            </li> -->
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $_SESSION['session_usr']['usr_nombre'] ?>
                                        </span><span class="user-status"><?php echo $_SESSION['session_usr']['usr_rol'] ?></span></div><span><img class="round" src="https://i.pinimg.com/originals/ff/a0/9a/ffa09aec412db3f54deadf1b3781de2a.png" alt="avatar" height="40" width="40"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo HTTP_HOST . 'mi-perfil' ?>"><i class="feather icon-user"></i> Editar perfil</a>
                                    <!-- <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My -->
                                    <!-- Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a> -->
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="<?php echo HTTP_HOST . 'salir' ?>"><i class="feather icon-power"></i> Salir</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <ul class="main-search-list-defaultlist d-none">
            <li class="d-flex align-items-center"><a class="pb-25" href="#">
                    <h6 class="text-primary mb-0">Files</h6>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                    <div class="d-flex">
                        <div class="mr-50"><img src="<?php echo  ICON_APP ?>" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                                Manager</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                    <div class="d-flex">
                        <div class="mr-50"><img src="<?php echo  HTTP_HOST . 'app/assets/' ?>images/icons/jpg.png" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                                Developer</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                    <div class="d-flex">
                        <div class="mr-50"><img src="<?php echo  HTTP_HOST . 'app/assets/' ?>images/icons/pdf.png" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                                Marketing Manager</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                    <div class="d-flex">
                        <div class="mr-50"><img src="<?php echo  HTTP_HOST . 'app/assets/' ?>images/icons/doc.png" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Anna_Strong</p><small class="text-muted">Web Designer</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
                </a></li>
            <li class="d-flex align-items-center"><a class="pb-25" href="#">
                    <h6 class="text-primary mb-0">Members</h6>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-50"><img src="<?php echo  HTTP_HOST . 'app/assets/' ?>images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                        </div>
                    </div>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-50"><img src="<?php echo  HTTP_HOST . 'app/assets/' ?>images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                                Developer</small>
                        </div>
                    </div>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-50"><img src="<?php echo  HTTP_HOST . 'app/assets/' ?>images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                                Manager</small>
                        </div>
                    </div>
                </a></li>
            <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-50"><img src="<?php echo  HTTP_HOST . 'app/assets/' ?>images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                        </div>
                    </div>
                </a></li>
        </ul>
        <ul class="main-search-list-defaultlist-other-list d-none">
            <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                    <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No
                            results found.</span></div>
                </a></li>
        </ul>

        <!-- BEGIN: Main Menu-->
        <?php if ($_SESSION['session_usr']['usr_rol'] != "Alumno") : ?>
            <!-- BEGIN: Header-->

            <div class="horizontal-menu-wrapper">
                <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
                    <div class="navbar-header">
                        <ul class="nav navbar-nav flex-row">
                            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.html">
                                    <div class="brand-logo"></div>
                                    <h2 class="brand-text mb-0">S.E.A.D</h2>
                                </a></li>
                            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                        </ul>
                    </div>
                    <!-- Horizontal menu content-->
                    <div class="navbar-container main-menu-content" data-menu="menu-container">
                        <!-- include ../../../includes/mixins-->
                        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="<?php echo HTTP_HOST ?>" data-toggle="dropdown"><i class="feather icon-home"></i><span data-i18n="Dashboard">Dasboard</span></a>
                                <ul class="dropdown-menu">
                                    <li class="active" data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST ?>" data-toggle="dropdown" data-i18n="Inicio"><i class="feather icon-home"></i>Inicio</a>
                                        <!-- 
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html" data-toggle="dropdown" data-i18n="eCommerce"><i class="feather icon-shopping-cart"></i>eCommerce</a>
                            </li> -->
                                </ul>
                            </li>
                            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-users"></i><span data-i18n="Users">Alumnos</span></a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'alumnos/new' ?>" data-toggle="dropdown" data-i18n="Nuevo alumno"><i class="feather icon-plus"></i>Nuevo alumno</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'alumnos' ?>" data-toggle="dropdown" data-i18n="Listar alumno"><i class="feather icon-check"></i>Listar alumno</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'alumnos/importar' ?>" data-toggle="dropdown" data-i18n="Importar alumnos"><i class="feather icon-file"></i>Importar alumnos</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-grid"></i><span data-i18n="Users">Paquetes</span></a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'paquetes/new' ?>" data-toggle="dropdown" data-i18n="Crear nuevo"><i class="feather icon-plus"></i>Crear nuevo</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'paquetes' ?>" data-toggle="dropdown" data-i18n="Listar paquetes"><i class="feather icon-check"></i>Listar paquetes</a>


                                </ul>
                            </li>

                            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-grid"></i><span data-i18n="Users">Inscribir</span></a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'inscripciones/new' ?>" data-toggle="dropdown" data-i18n="Registrar inscripción"><i class="feather icon-plus"></i>Registrar inscripción</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'inscripciones' ?>" data-toggle="dropdown" data-i18n="Inscripciones"><i class="feather icon-plus"></i>Listar Inscripciones</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-grid"></i><span data-i18n="Users">Pagos</span></a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'pagos/new' ?>" data-toggle="dropdown" data-i18n="Nuevo pago"><i class="feather icon-plus"></i>Nuevo pago</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'pagos/fichas' ?>" data-toggle="dropdown" data-i18n="Historial de pagos"><i class="feather icon-plus"></i>Historial de fichas</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-grid"></i><span data-i18n="Gestión de tienda">Gestión de tienda</span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Cupones"><i class="feather icon-grid"></i>Cupones</a>
                                        <ul class="dropdown-menu">
                                            <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'cupones/new' ?>" data-toggle="dropdown" data-i18n="Nuevo cupon"><i class="feather icon-circle"></i>Nuevo cupon</a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'cupones' ?>" data-toggle="dropdown" data-i18n="Gestión de cupones"><i class="feather icon-circle"></i>Gestión de cupones</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Cupones"><i class="feather icon-grid"></i>Usuarios</a>
                                        <ul class="dropdown-menu">
                                            <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'usuarios/new' ?>" data-toggle="dropdown" data-i18n="Nuevo usuario"><i class="feather icon-circle"></i>Nuevo usuario</a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'usuarios' ?>" data-toggle="dropdown" data-i18n="Gestión de usuarios"><i class="feather icon-circle"></i>Gestión de usuarios</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Cupones"><i class="feather icon-grid"></i>Gastos</a>
                                        <ul class="dropdown-menu">
                                            <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'gastos' ?>" data-toggle="dropdown" data-i18n="Nuevo usuario"><i class="feather icon-circle"></i>Nuevo gasto</a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'listar-gastos' ?>" data-toggle="dropdown" data-i18n="Nuevo usuario"><i class="feather icon-circle"></i>Listar gastos</a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item" href="<?php echo HTTP_HOST . 'categorias' ?>" data-toggle="dropdown" data-i18n="Gestión de usuarios"><i class="feather icon-circle"></i>Gestión de categorías </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="<?php echo HTTP_HOST . 'ingresos'  ?>" data-toggle="tooltip" data-placement="top"><i class="feather icon-grid"></i>Ingresos</a></li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php elseif ($_SESSION['session_usr']['usr_rol'] == "Alumno") : ?>
            <!-- BEGIN: Header-->

            <div class="horizontal-menu-wrapper">
                <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
                    <div class="navbar-header">
                        <ul class="nav navbar-nav flex-row">
                            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.html">
                                    <div class="brand-logo"></div>
                                    <h2 class="brand-text mb-0">S.E.A.D</h2>
                                </a></li>
                            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                        </ul>
                    </div>
                    <!-- Horizontal menu content-->
                    <div class="navbar-container main-menu-content" data-menu="menu-container">
                        <!-- include ../../../includes/mixins-->
                        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="<?php echo HTTP_HOST  ?>" data-toggle="tooltip" data-placement="top"><i class="feather icon-home"></i>Inicio</a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="<?php echo HTTP_HOST . 'alumno/' . $_SESSION['session_usr']['usr_id'] . '/kerdex-fichas' ?>" data-toggle="tooltip" data-placement="top"><i class="feather icon-grid"></i>Kardex de fichas</a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="<?php echo HTTP_HOST . 'alumno/' . $_SESSION['session_usr']['usr_id'] . '/kerdex-pagos' ?>" data-toggle="tooltip" data-placement="top"><i class="feather icon-grid"></i>Kardex de pagos</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">

                    <?php


                    if (isset($_GET['ruta'])) {
                        //Traer la lista blanca de paginas adminitas
                        if ($_SESSION['session_usr']['usr_rol'] != "Alumno") {
                            $listaBlanca = AppControlador::obtenerListaBlanca();
                        }
                        if ($_SESSION['session_usr']['usr_rol'] == "Alumno") {
                            $listaBlanca = AppControlador::obtenerListaBlancaAlumno();
                        }



                        //Guardad en la variable la ruta que venga de GET

                        //Crea un arreglo vacio
                        $rutas = array();

                        // Crea los elementos del arreglo a partir de caracter /
                        $rutas = explode("/", $_GET['ruta']);

                        // Asigna a la variable el primer item del arreglo que será la página
                        $ruta_get = $rutas[0];
                        //Inicializamos una bandera en true para ver si hay pagina admitida
                        $_404 = true;
                        //Recorremos la lista de paginas admitidas
                        foreach ($listaBlanca as $item) {
                            //Si hay una conincidencia con lo que venga por GET y un elemento de mi lista
                            if ($ruta_get == $item) {
                                //Marcar la bandera en false indicando que si existe la pagina
                                $_404 =  false;
                            }
                        }
                        //Guardar la pagina mostrar dependiendo la bandera
                        $page = $_404 ? '404' : $ruta_get;

                        //Cargar la pagina solicitada

                        cargarPagina($page, $rutas);
                    } else {
                       
                        cargarPagina('bienvenido');
                    }

                    ?>

                </div>
            </div>
        </div>
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light navbar-shadow">
            <!-- <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
                <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
            </p> -->
        </footer>
        <!-- END: Footer-->


        <!-- BEGIN: Theme JS-->
        <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>js/core/app-menu.js"></script>
        <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>js/core/app.js"></script>
        <script src="<?php echo  HTTP_HOST . 'app/assets/' ?>js/scripts/components.js"></script>
        <!-- END: Theme JS-->


        <!-- END: Page JS-->
        <script src="<?php echo  HTTP_HOST . 'app/modulos/app/app.js' ?>"></script>


        <script src="<?php echo HTTP_HOST  ?>app/assets/plugin/datatables-1/jquery.dataTables.min.js"></script>
        <script src="<?php echo HTTP_HOST  ?>app/assets/plugin/datatables-1/dataTables.bootstrap4.min.js"></script>


        <script src="<?php echo HTTP_HOST  ?>app/assets/plugin/datatables-1/dataTables.responsive.min.js"></script>
        <script src="<?php echo HTTP_HOST  ?>app/assets/plugin/datatables-1/responsive.bootstrap4.min.js"></script>


        <script src="<?php echo HTTP_HOST . 'app/modulos/usuarios/usuarios.js' ?>"></script>


        <script src="<?php echo HTTP_HOST . 'app/' ?>modulos/cupones/cupones.js"></script>


        <script src="<?php echo HTTP_HOST . 'app/' ?>modulos/paquetes/paquetes.js"></script>

        <script src="<?php echo HTTP_HOST . 'app/' ?>modulos/inscripciones/inscripciones.js"></script>

        <script src="<?php echo HTTP_HOST . 'app/' ?>modulos/pagos/pagos.js"></script>
        <script src="<?php echo HTTP_HOST . 'app/' ?>modulos/gastos/gastos.js"></script>
        <script src="<?php echo HTTP_HOST . 'app/' ?>modulos/ingresos/ingresos.js"></script>
    </body>
<?php else :

    if (isset($_GET['ruta'])) {

        //Crea un arreglo vacio
        $rutas = array();

        // Crea los elementos del arreglo a partir de caracter /
        $rutas = explode("/", $_GET['ruta']);


        if (
            $rutas[0] == 'recuperar' ||
            $rutas[0] == 'cambiar-contrasena'
        ) {
            cargarPagina($rutas[0], $rutas);
        } else {
            cargarPagina('login');
        }
    } else {
        cargarPagina('login');
    }
?>

<?php endif; ?>
<!-- END: Body-->

</html>
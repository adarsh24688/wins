<html class="no-js" >
<!DOCTYPE html>

<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Reallist- Bootstrap Responsive Real estate Classifieds, Dealer, Rentel, Builder and Agent Multipurpose HTML Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="property template, property dealer website">
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- Title -->
    <title>Wins</title>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Dashboard Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Font-awesome  Css -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!--Horizontal Menu-->
    <link href="<?php echo base_url(); ?>assets/plugins/horizontal-menu/horizontal.css" rel="stylesheet">
    <!--Select2 Plugin -->
    <link href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- Custom scroll bar css-->
    <link href="<?php echo base_url(); ?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet">
   
    <!-- COLOR-SKINS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/skins/color-skins/color15.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/skins/demo.css">

    <meta http-equiv="imagetoolbar" content="no">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!--[if gte IE 5]><frame></frame><![endif]-->
</head>

<body>
    
    <div class="horizontalMenucontainer">
        <?php if($this->session->flashdata('payment_msg')) {?>
                    <script type="text/javascript">
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: '<?php echo $this->session->flashdata('payment_msg');?>',
                          showConfirmButton: false,
                          timer: 4000
                        })
                    </script>
        <?php }?>
        <?php if($this->session->flashdata('registered')) {?>
                    <script type="text/javascript">
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: '<?php echo $this->session->flashdata('registered');?>',
                          showConfirmButton: false,
                          timer: 4000
                        })
                    </script>
        <?php }?>
        <!--Loader-->
        <div id="global-loader" > <img src="" class="loader-img" alt=""> </div>
        <!--Topbar-->
        <div class="header-main">
            <div class="top-bar">
                <div class="container">
                    <div class="row">   
                        <div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                            <div class="top-bar-left d-flex">
                                <div class="clearfix">
                                    <ul class="socials">
                                        <li> <a class="social-icon text-dark" href="#"><i class="fa fa-facebook"></i></a> </li>
                                        <li> <a class="social-icon text-dark" href="#"><i class="fa fa-twitter"></i></a> </li>
                                        <li> <a class="social-icon text-dark" href="#"><i class="fa fa-linkedin"></i></a> </li>
                                        <li> <a class="social-icon text-dark" href="#"><i class="fa fa-google-plus"></i></a> </li>
                                    </ul>
                                </div>
                                <div class="clearfix">
                                    <ul class="contact">
                                      <!--   <li class="mr-5 d-lg-none"> <a href="#" class="callnumber text-dark"><span><i class="fa fa-phone mr-1"></i>: +425 345 8765</span></a> </li> -->
                                        <li class="select-country mr-5">
                                         

                                        </li>
                                  <!--       <li class="dropdown mr-5"> 
                                            <a href="#" class="text-dark" data-toggle="dropdown">
                                                <span> Language <i class="fa fa-caret-down text-muted"></i></span> 
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> <a href="#" class="dropdown-item"> English </a> <a class="dropdown-item" href="#"> Arabic </a> <a class="dropdown-item" href="#"> German </a> <a href="#" class="dropdown-item"> Greek </a> <a href="#" class="dropdown-item"> Japanese </a> </div>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="text-dark" data-toggle="dropdown"><span>Currency <i class="fa fa-caret-down text-muted"></i></span></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> <a href="#" class="dropdown-item"> USD </a> <a class="dropdown-item" href="#"> EUR </a> <a class="dropdown-item" href="#"> INR </a> <a href="#" class="dropdown-item"> GBP </a> </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                            <div class="top-bar-right">
                                <ul class="custom">
                                	<?php if(empty($user_id)): ?>
                                    <li> <a href="<?php echo base_url();?>index.php/Home/loadPage/register" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Register</span></a> </li>
                                    <li> <a href="<?php echo base_url();?>index.php/Home/loadPage/login" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Login</span></a> </li>
                                    <?php else: ?>
	                                    <li class="dropdown"> <a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> My Dashboard</span></a>
	                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
	                                            <a href="<?php echo base_url('index.php/Home/loadPage/user_profile	'); ?>" class="dropdown-item"> <i class="dropdown-icon icon icon-user"></i> My Profile </a>
	                                            <a class="dropdown-item" href="<?php echo base_url('index.php/Home/logout'); ?>"> <i class="dropdown-icon icon icon-power"></i> Log out </a>
	                                        </div>
	                                    </li>
                                	<?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Duplex Houses Header -->
             <div class="horizontal-header clearfix ">
                <div class="container"> <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a> <span class="smllogo"><img src="<?php echo base_url(); ?>assets/images/brand/lg3.png" width="120" alt=""></span> <a href="tel:245-6325-3256" class="callusbtn"><i aria-hidden="true"></i></a> </div>
            </div>
            <!-- /Duplex Houses Header -->
            <div id="sticky-wrapper" class="sticky-wrapper" style="height: 64px;">
                <div class="horizontal-main bg-dark-transparent clearfix" style="width: 1344px;">
                    <div class="horizontal-mainwrapper container clearfix">
                        <div class="desktoplogo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/brand/lg1.png" alt=""></a>
                        </div>
                        <div class="desktoplogo-1">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/brand/lg1.png" alt=""></a>
                        </div>
                        <!--Nav-->
                        <nav class="horizontalMenu clearfix d-md-flex">
                            <div class="overlapblackbg"></div>
                            <ul class="horizontalMenu-list">
                                <li aria-haspopup="true"><a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li aria-haspopup="true"><a href="<?php echo base_url('index.php/Home/loadPage/about'); ?>">About Us </a></li>
                                <li aria-haspopup="true"><a href="<?php echo base_url('index.php/Home/loadPage/winners'); ?>"> Winners <span class="hmarrow"></span></a></li>
                                <li aria-haspopup="true"><a href="<?php echo base_url('index.php/Home/loadPage/howToPlay'); ?>">How To Play </a></li>
                            </ul>

                            <!-- <ul class="mb-0">
                                <li aria-haspopup="true" class="mt-3 d-none d-lg-block top-postbtn"> <span><a class="btn btn-secondary ad-post " href="ad-posts.html">Post Property Ad</a></span> </li>
                            </ul>  -->                          <!--  <ul class="mb-0">
                                <li aria-haspopup="true" class="mt-3 d-none d-lg-block top-postbtn"> <span><a class="btn btn-secondary ad-post " href="ad-posts.html">Post Property Ad</a></span> </li>
                            </ul> -->

                        </nav>
                        <!--Nav-->
                    </div>
                </div>
            </div>
        </div>
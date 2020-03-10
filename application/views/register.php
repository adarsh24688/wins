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
                                        <li class="mr-5 d-lg-none"> <a href="#" class="callnumber text-dark"><span><i class="fa fa-phone mr-1"></i>: +425 345 8765</span></a> </li>
                                        <li class="select-country mr-5">
                                         

                                        </li>
                                        <li class="dropdown mr-5"> 
                                            <a href="#" class="text-dark" data-toggle="dropdown">
                                                <span> Language <i class="fa fa-caret-down text-muted"></i></span> 
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> <a href="#" class="dropdown-item"> English </a> <a class="dropdown-item" href="#"> Arabic </a> <a class="dropdown-item" href="#"> German </a> <a href="#" class="dropdown-item"> Greek </a> <a href="#" class="dropdown-item"> Japanese </a> </div>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="text-dark" data-toggle="dropdown"><span>Currency <i class="fa fa-caret-down text-muted"></i></span></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> <a href="#" class="dropdown-item"> USD </a> <a class="dropdown-item" href="#"> EUR </a> <a class="dropdown-item" href="#"> INR </a> <a href="#" class="dropdown-item"> GBP </a> </div>
                                        </li>
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
                                                <a href="<?php echo base_url('index.php/Home/loadPage/user_profile  '); ?>" class="dropdown-item"> <i class="dropdown-icon icon icon-user"></i> My Profile </a>
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
            
            <!-- /Duplex Houses Header -->
            <div id="sticky-wrapper" class="sticky-wrapper" style="height: 64px;">
                <div class="horizontal-main bg-dark-transparent clearfix" style="width: 1344px;">
                    <div class="horizontal-mainwrapper container clearfix">
                        <div class="desktoplogo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/brand/logo1.png" alt=""></a>
                        </div>
                        <div class="desktoplogo-1">
                            <a href="index.html"><img src="<?php echo base_url(); ?>assets/images/brand/logo1.png" alt=""></a>
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
                            <ul class="mb-0">
                                <li aria-haspopup="true" class="mt-3 d-none d-lg-block top-postbtn"> <span><a class="btn btn-secondary ad-post " href="ad-posts.html">Post Property Ad</a></span> </li>
                            </ul>
                        </nav>
                        <!--Nav-->
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg" style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
                <div class="header-text mb-0">
                    <div class="container">
                        <div class="text-center text-white">
                            <h1 class="">My Dashboard</h1>
                            <ol class="breadcrumb text-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active text-white" aria-current="page">My Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sptb">
            <div class="container customerpage">
                <div class="row">
                    <div class="single-page">
                        <div class="col-lg-5 col-xl-5 col-md-5 d-block mx-auto">
                            <div class="wrapper wrapper2">
                                <form id="login" class="card-body" tabindex="500" method="post" action="<?php echo base_url();?>index.php/Home/registerUser" enctype="multipart/form-data">
                                    <h3>Register</h3>
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="First Name"name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="Password"name="password" required>
                                    </div>
                                    <div class="form-group is_deleted">
                                        <label class="form-label">State</label>
                                        <select class="form-control" id="states" name="state">
                                            <?php foreach($states as $state):
                                                if($state->StateID == 11 ){?>
                                                <option value=<?php echo $state->StateID; ?> selected><?php echo $state->StateName; ?></option>
                                            <?php }else{?>
                                                <option value=<?php echo $state->StateID; ?>><?php echo $state->StateName; ?></option>
                                            <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" placeholder="Address"name="address" required>
                                    </div>
                                    <span class="text-danger"><?php echo validation_errors(); ?></span>
                                    <div class="submit"> <button class="btn btn-primary btn-block" type="submit">Register</button> </div>
                                    <p class="text-dark mb-0">Already have an account?<a href="<?php echo  base_url('index.php/Home/loadPage/login'); ?>" class="text-primary ml-1">Sign In</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Footer Section-->
<section>
            <footer class="bg-dark-purple text-white">
                <div class="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <h6>About</h6>
                                <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis exercitation ullamco laboris </p>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum .</p>
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <h6>Our Quick Links</h6>
                                <hr class="deep-purple text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="javascript:;">Our Team</a></li>
                                    <li><a href="javascript:;">Contact US</a></li>
                                    <li><a href="javascript:;">About</a></li>
                                    <li><a href="javascript:;">Laxury Rooms</a></li>
                                    <li><a href="javascript:;">Blog</a></li>
                                    <li><a href="javascript:;">Terms</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <h6>Contact</h6>
                                <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                                <ul class="list-unstyled mb-0">
                                    <li> <a href="#"><i class="fa fa-home mr-3 text-primary"></i> New York, NY 10012, US</a> </li>
                                    <li> <a href="#"><i class="fa fa-envelope mr-3 text-primary"></i> info12323@example.com</a></li>
                                    <li> <a href="#"><i class="fa fa-phone mr-3 text-primary"></i> + 01 234 567 88</a> </li>
                                    <li> <a href="#"><i class="fa fa-print mr-3 text-primary"></i> + 01 234 567 89</a> </li>
                                </ul>
                                <ul class="list-unstyled list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-facebook bg-facebook"></i> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-twitter bg-info"></i> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-google-plus bg-danger"></i> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light"> <i class="fa fa-linkedin bg-linkedin"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <h6>Subscribe</h6>
                                <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                                <div class="clearfix"></div>
                                <div class="input-group w-100">
                                    <input type="text" class="form-control br-tl-3  br-bl-3 " placeholder="Email">
                                    <div class="input-group-append ">
                                        <button type="button" class="btn btn-primary br-tr-3  br-br-3"> Subscribe </button>
                                    </div>
                                </div>
                                <h6 class="mb-0 mt-5">Payments</h6>
                                <hr class="deep-purple  text-primary accent-2 mb-2 mt-3 d-inline-block mx-auto">
                                <div class="clearfix"></div>
                                <ul class="footer-payments">
                                    <li class="pl-0"><a href="javascript:;"><i class="fa fa-cc-amex text-muted" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa fa-cc-visa text-muted" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa fa-credit-card-alt text-muted" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa fa-cc-mastercard text-muted" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa fa-cc-paypal text-muted" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-dark-purple text-white p-0">
                    <div class="container">
                        <div class="row d-flex">
                            <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center "> Copyright © 2019 <a href="#" class="fs-14 text-primary">Reallist</a>. Designed by <a href="#" class="fs-14 text-primary">Spruko</a> All rights reserved. </div>
                        </div>
                    </div>
                </div>
            </footer>
</section>
        <!--Footer Section-->
        <!-- Back to top --><a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>
        <!-- JQuery js-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap js -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <!--JQuery RealEstaterkline Js-->
      <!--  -->
    
        <!-- Star Rating Js-->
        <script src="<?php echo base_url(); ?>assets/plugins/rating/jquery.rating-stars.js"></script>
        <!--ounters -->
        <script src="<?php echo base_url(); ?>assets/plugins/counters/counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/counters/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/counters/numeric-counter.js"></script>
        <!--Owl Carousel js -->
        <script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.carousel.js"></script>
        <!--Horizontal Menu-->
        <script src="<?php echo base_url(); ?>assets/plugins/horizontal-menu/horizontal.js"></script>
        <!--JQuery TouchSwipe js-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.touchSwipe.min.js"></script>
        <!--Select2 js -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>
        <!-- sticky Js-->
        <script src="<?php echo base_url(); ?>assets/js/sticky.js"></script>
        <!-- Cookie js -->
      <!--   <script src="<?php echo base_url(); ?>assets/plugins/cookie/jquery.ihavecookies.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/cookie/cookie.js"></script> -->
        <!-- Custom scroll bar Js-->
        <script src="<?php echo base_url(); ?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- P-scroll bar Js-->
   <!--  -->

     <!--  -->
        <script src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
        <!-- Custom Js-->

        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.alert').fadeOut(6000);
            });

        </script>        
</div>
</body>
</html>
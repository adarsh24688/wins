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
    <title>HTML Template</title>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Dashboard Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- Font-awesome  Css -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!--Horizontal Menu-->
    <link href="<?php echo base_url(); ?>assets/plugins/horizontal-menu/horizontal.css" rel="stylesheet">
    <!--Select2 Plugin -->
    <link href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css" rel="stylesheet">
    <!-- Cookie css -->
    <link href="<?php echo base_url(); ?>assets/plugins/cookie/cookie.css" rel="stylesheet">
    <!-- Owl Theme css-->
    <link href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- Custom scroll bar css-->
    <link href="<?php echo base_url(); ?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet">
    <!-- P-scroll bar css-->
    <link href="<?php echo base_url(); ?>assets/plugins/pscrollbar/perfect-scrollbar.css" rel="stylesheet">
    <!-- Switcher css -->
    <link href="<?php echo base_url(); ?>assets/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" type="text/css" media="all">
    <!-- COLOR-SKINS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/skins/color-skins/color15.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/skins/demo.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <meta http-equiv="imagetoolbar" content="no">

    <!--[if gte IE 5]><frame></frame><![endif]-->
</head>

<body>
    <div class="horizontalMenucontainer">

        <!--Loader-->
        <div id="global-loader" > <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt=""> </div>
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
                                    <li> <a href="<?php echo base_url();?>index.php/Home/loadPage/register" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Register</span></a> </li>
                                    <li> <a href="<?php echo base_url();?>index.php/Home/loadPage/login" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Login</span></a> </li>
                                    <li class="dropdown"> <a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> My Dashboard</span></a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a href="mydash.html" class="dropdown-item"> <i class="dropdown-icon icon icon-user"></i> My Profile </a>
                                            <a class="dropdown-item" href="#"> <i class="dropdown-icon icon icon-speech"></i> Inbox </a>
                                            <a class="dropdown-item" href="#"> <i class="dropdown-icon icon icon-bell"></i> Notifications </a>
                                            <a href="mydash.html" class="dropdown-item"> <i class="dropdown-icon  icon icon-settings"></i> Account Settings </a>
                                            <a class="dropdown-item" href="#"> <i class="dropdown-icon icon icon-power"></i> Log out </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Duplex Houses Header -->
            <div class="horizontal-header clearfix ">
                <div class="container"> <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a> <span class="smllogo"><img src="<?php echo base_url(); ?>assets/images/brand/logo.png" width="120" alt=""></span> <a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a> </div>
            </div>
            <!-- /Duplex Houses Header -->
            <div id="sticky-wrapper" class="sticky-wrapper" style="height: 64px;">
                <div class="horizontal-main bg-dark-transparent clearfix" style="width: 1344px;">
                    <div class="horizontal-mainwrapper container clearfix">
                        <div class="desktoplogo">
                            <a href="index.html"><img src="<?php echo base_url(); ?>assets/images/brand/logo1.png" alt=""></a>
                        </div>
                        <div class="desktoplogo-1">
                            <a href="index.html"><img src="<?php echo base_url(); ?>assets/images/brand/logo1.png" alt=""></a>
                        </div>
                        <!--Nav-->
                        <nav class="horizontalMenu clearfix d-md-flex">
                            <div class="overlapblackbg"></div>
                            <ul class="horizontalMenu-list">
                                <li aria-haspopup="true"><span class="horizontalMenu-click"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#" class="active">Home <span class="fa fa-caret-down m-0"></span></a>
                                    <ul class="sub-menu">
                                        <li aria-haspopup="true"><a href="index.html">Home-default</a></li>
                                     </ul>
                                </li>
                                <li aria-haspopup="true"><a href="about.html">About Us </a></li>
                                <!-- <li aria-haspopup="true"><a href="widgets.html">Widgets</a></li> -->
                                <!-- <li aria-haspopup="true"><span class="horizontalMenu-click"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Pages <span class="fa fa-caret-down m-0"></span></a>
                                    <div class="horizontal-megamenu clearfix">
                                        <div class="container">
                                            <div class="megamenu-content">
                                                <div class="row">
                                                    <ul class="col link-list">
                                                        <li class="title">Custom Pages</li>
                                                        <li> <a href="page-list.html">RealEstate List</a> </li>
                                                        <li> <a href="page-list-right.html">RealEstate Right</a> </li>
                                                        <li> <a href="page-list-map.html">RealEstate Map list</a> </li>
                                                        <li> <a href="page-list-map2.html">RealEstate Map list 02</a> </li>
                                                        <li> <a href="page-list-map3.html">RealEstate Map style 03</a> </li>
                                                        <li> <a href="categories.html">Categories</a> </li>
                                                        <li> <a href="inovice.html">Invoice</a> </li>
                                                        <li> <a href="usersall.html">User Lists</a> </li>
                                                        <li> <a href="pricing.html">Pricing</a> </li>
                                                    </ul>
                                                    <ul class="col link-list">
                                                        <li class="title">Custom Pages</li>
                                                        <li> <a href="ad-list.html">Ad Listing</a> </li>
                                                        <li> <a href="ad-list-right.html">Ad Listing Right</a> </li>
                                                        <li> <a href="ad-details.html">Ad Details</a> </li>
                                                        <li> <a href="add-details1.html">Page Details 1<span class="badge badge-primary ml-2">New</span></a> </li>
                                                        <li> <a href="ad-details-right.html">Ad Details Right</a> </li>
                                                        <li> <a href="ad-posts.html">Ad Posts</a> </li>
                                                        <li> <a href="ad-posts2.html">Ad Posts2</a> </li>
                                                        <li> <a href="typography.html">Typography</a> </li>
                                                        <li> <a href="testimonial.html">Testimonials</a> </li>
                                                    </ul>
                                                    <ul class="col link-list">
                                                        <li class="title">Custom Pages</li>
                                                        <li> <a href="userprofile.html"> User Profile</a> </li>
                                                        <li> <a href="mydash.html">My Dashboard</a> </li>
                                                        <li> <a href="myads.html">Ads</a> </li>
                                                        <li> <a href="myfavorite.html">Favorite Ads</a> </li>
                                                        <li> <a href="manged.html">Manged Ads</a> </li>
                                                        <li> <a href="payments.html">Payments</a> </li>
                                                        <li> <a href="orders.html"> Orders</a> </li>
                                                        <li> <a href="settings.html"> Settings</a> </li>
                                                        <li> <a href="tips.html">Tips</a> </li>
                                                    </ul>
                                                    <ul class="col link-list">
                                                        <li class="title">Custom Pages</li>
                                                        <li><a href="underconstruction.html">Under 3BHk Homes</a></li>
                                                        <li><a href="404.html">404</a></li>
                                                        <li><a href="register.html">Register</a></li>
                                                        <li><a href="login.html">Login</a></li>
                                                        <li><a href="login-2.html">Login 02</a></li>
                                                        <li><a href="forgot.html">Forgot Password</a></li>
                                                        <li><a href="lockscreen.html">Lock Screen</a></li>
                                                        <li><a href="faq.html">Faq</a></li>
                                                        <li><a href="userprofile2.html"> User Profile2</a></li>
                                                    </ul>
                                                    <ul class="col link-list">
                                                        <li class="title">Custom Pages</li>
                                                        <li><a href="header-style1.html">Header Style 01</a></li>
                                                        <li><a href="header-style2.html">Header Style 02</a></li>
                                                        <li><a href="header-style3.html">Header Style 03</a></li>
                                                        <li><a href="header-style4.html">Header Style 04</a></li>
                                                        <li><a href="footer-style.html">Footer Style 01</a></li>
                                                        <li><a href="footer-style2.html">Footer Style 02</a></li>
                                                        <li><a href="footer-style3.html">Footer Style 03</a></li>
                                                        <li><a href="footer-style4.html">Footer Style 04</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                                <li aria-haspopup="true"><span class="horizontalMenu-click"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Blog <span class="fa fa-caret-down m-0"></span></a>
                                    <!-- <ul class="sub-menu">
                                        <li aria-haspopup="true"><span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Blog Grid <i class="fa fa-angle-right float-right mt-1 d-none d-lg-block"></i></a>
                                            <ul class="sub-menu">
                                                <li aria-haspopup="true"><a href="blog-grid.html">Blog Grid Left</a></li>
                                                <li aria-haspopup="true"><a href="blog-grid-right.html">Blog Grid Right</a></li>
                                                <li aria-haspopup="true"><a href="blog-grid-center.html">Blog Grid Center</a></li>
                                            </ul>
                                        </li>
                                        <li aria-haspopup="true"><span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Blog List <i class="fa fa-angle-right float-right mt-1 d-none d-lg-block"></i></a>
                                            <ul class="sub-menu">
                                                <li aria-haspopup="true"><a href="blog-list.html">Blog List Left</a></li>
                                                <li aria-haspopup="true"><a href="blog-list-right.html">Blog List Right</a></li>
                                                <li aria-haspopup="true"><a href="blog-list-center.html">Blog List Center</a></li>
                                            </ul>
                                        </li>
                                        <li aria-haspopup="true"><span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Blog Details <i class="fa fa-angle-right float-right mt-1 d-none d-lg-block"></i></a>
                                            <ul class="sub-menu">
                                                <li aria-haspopup="true"><a href="blog-details.html">Blog Details Left</a></li>
                                                <li aria-haspopup="true"><a href="blog-details-right.html">Blog Details Right</a></li>
                                                <li aria-haspopup="true"><a href="blog-details-center.html">Blog Details Center</a></li>
                                            </ul>
                                        </li>
                                    </ul> -->
                                </li>
                                <li aria-haspopup="true"><span class="horizontalMenu-click"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Categories <span class="fa fa-caret-down m-0"></span></a>
                                    <ul class="sub-menu">
                                        <li aria-haspopup="true"><a href="col-left.html">RealEstate Left</a></li>
                                        <li aria-haspopup="true"><a href="col-right.html">RealEstate Right </a></li>
                                    </ul>
                                </li>
                                <li aria-haspopup="true"><a href="contact.html"> Contact Us <span class="hmarrow"></span></a></li>
                                <li aria-haspopup="true" class="d-lg-none mt-5 pb-5 mt-lg-0"> <span><a class="btn btn-secondary" href="ad-posts.html">Post Property Ad</a></span> </li>
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
        <!--Sliders Section-->
        <section>
            <div class="banner-1 cover-image sptb-2 sptb-tab bg-background2"   style="background: url('assets/images/banners/banner4.jpg') center center;">
                <div class="header-text mb-0">
                
                </div>
                <!-- /header-text -->
            </div>
        </section>
        <section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <!--Classified Description-->
                <div class="card overflow-hidden">
                    <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">Offer</span></div>
                    <div class="card-body">
                        <div class="item-det mb-4"> <a href="#" class="text-dark"><h3 class=""><?php echo $product->product_name; ?></h3></a>
                        </div>
                        <div class="product-slider">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <div class="arrow-ribbon2 bg-primary">Rs-<?php echo $product->ticket_price;?></div>
                                <div class="carousel-inner">
                                    <?php $count=0;
                                    foreach($images as $image):
                                        if($count==0){?>
                                    <div class="carousel-item active" style="height:400px;"> <img src="<?php echo base_url().$image->image_name;?>" alt="img"> </div>
                                    <?php 
                                    $count++;}else{?>
                                    <div class="carousel-item" style="height:400px;"> <img src="<?php echo base_url().$image->image_name;?>" alt="img"> </div>
                                    <?php }endforeach; ?>
                                   <!--  <div class="carousel-item active carousel-item-left"> <img src="<?php echo base_url().$product->image;?>" alt="img"> </div>
                                    <div class="carousel-item carousel-item-next carousel-item-left"> <img src="<?php echo base_url();?>assets/images/products/2.png" alt="img"> </div>
                                    <div class="carousel-item"> <img src="<?php echo base_url().$product->image;?>" alt="img"> </div> -->
                                </div>
                                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a>
                                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                            </div>
                            <div class="clearfix">
                                <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <?php $count =0; 
                                            foreach($images as $image):?>
                                            <div data-target="#carousel" data-slide-to="<?php echo $count++;?>" class="thumb"><img src="<?php echo base_url().$image->image_name;?>" alt="img" ></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- <div class="carousel-item">
                                            <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="<?php echo base_url().$product->image;?>" alt="img"></div>
                                            <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="<?php echo base_url().$product->image;?>" alt="img"></div>
                                            <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="<?php echo base_url().$product->image;?>" alt="img"></div>
                                            <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="<?php echo base_url().$product->image;?>" alt="img"></div>
                                        </div> -->
                                    </div>
                                    <a class="carousel-control-prev" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a>
                                    <a class="carousel-control-next" href="#thumbcarousel" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Description</h3> </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p><?php echo $product->description; ?></p>
                        </div>
                        <h4 class="mb-4">Specifications</h4>
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <ul class="list-unstyled widget-spec mb-0">
                                    <li class=""> <i class="fa fa-bed text-muted w-5"></i> 2 BedRooms </li>
                                    <li class=""> <i class="fa fa-bath text-muted w-5"></i> 2 BathRooms </li>
                                    <li class=""> <i class="fa fa-life-ring text-muted w-5"></i> Unfurnished </li>
                                    <li class=""> <i class="fa fa-car text-muted w-5"></i> 2 Car Parking </li>
                                    <li class=""> <i class="fa fa-globe text-muted w-5"></i> East East face </li>
                                    <li class="mb-xl-0"> <i class="fa fa-pagelines text-muted w-5"></i> Garden </li>
                                </ul>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <ul class="list-unstyled widget-spec mb-0">
                                    <li class=""> <i class="fa fa-lock text-muted w-5"></i> Security </li>
                                    <li class=""> <i class="fa fa-building-o text-muted w-5"></i> Lift </li>
                                    <li class=""> <i class="fa fa-check text-muted w-5"></i> Swimming fool </li>
                                    <li class=""> <i class="fa fa-gamepad text-muted w-5"></i> Play Area </li>
                                    <li class=""> <i class="fa fa-futbol-o text-muted w-5"></i> football Court </li>
                                    <li class="mb-0"> <i class="fa fa-trophy text-muted w-5"></i> Cricket Court </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Classified Description-->

            
            </div>
            <!--Right Side Content-->
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Posted By</h3> 
                    </div>
                    <div class="card-body  item-user">
                        <div>
                             <ul>
                                    <li>This Competition has a minimum of 1 ticket</li>
                                    <li>This Competition is limited to <?php echo $product->ticket_count; ?> tickets</li>
                                    <li>This Competition will have: 1 winner</li>
                                    <li>Tickets sold: <?php echo $product->sold_count; ?>+</li>
                                    <li>Draw Date: When Sold Out</li>
                                </ul>
                                <div class="progress">
                                  <div class="progress-bar" style="<?php echo 'width:'.$percentage.'%'; ?>"><?php echo $percentage; ?>%</div>
                                </div>
                            <div style="text-align: center">
                                <h6 class="mt-2 mb-0"><a href="<?php echo base_url(); ?>index.php/Home/checkUserLogin/<?php echo $product->id?>">
                                     <?php if($product->sold_count === $product->ticket_count){?>
                                       <button type="button" class="btn btn-danger btn-lg" disabled style="cursor:not-allowed">Sold Out</button><?php }else{?>
                                        <button type="button" class="btn btn-primary btn-lg">Buy Now</button>
                                       <?php }?>
                                </a></h6> </div>

                        </div>
                    </div>               
                </div>
            <!--/Right Side Content-->
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
        <script src="<?php echo base_url(); ?>assets/js/vendors/jquery.sparkline.min.js"></script>
        <!-- Circle Progress Js-->
        <script src="<?php echo base_url(); ?>assets/js/vendors/circle-progress.min.js"></script>
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
        <script src="<?php echo base_url(); ?>assets/plugins/cookie/jquery.ihavecookies.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/cookie/cookie.js"></script>
        <!-- Custom scroll bar Js-->
        <script src="<?php echo base_url(); ?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- P-scroll bar Js-->
        <script src="<?php echo base_url(); ?>assets/plugins/pscrollbar/perfect-scrollbar.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pscrollbar/pscroll.js"></script>
        <!-- Switcher js -->

        <script src="<?php echo base_url(); ?>assets/switcher/js/switcher.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.showmore.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/showmore.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/swipe.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
        <!-- Custom Js-->

        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>


    </div>

</body>

</html>
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

        <?php if(!empty($this->session->flashdata('login_msg'))) {?>
            <div class="container">
                <div class="row justify-content-center mt-1 text-center">
                    <div class="alert alert-danger col-lg-4">
                      <?php echo $this->session->flashdata('login_msg');?>
                    </div>
                </div>
            </div>
        <!-- <div class="col-lg-6">
            <div class="alert alert-danger col-lg-6">
              <?php echo $this->session->flashdata('login_msg');?>
            </div>
        </div> -->
        <?php }?>

        <section class="sptb">
            <div class="container customerpage">
                <div class="row">
                    <div class="single-page">
                        <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                            <div class="wrapper wrapper2">
                                <?php if (isset($productId) && isset($productQty)) {?>
                                    <form id="login" class="card-body" tabindex="500" method="post" action="<?php echo base_url();?>index.php/Home/loginUser?prod=<?php echo $productId ?>&qty=<?php echo $productQty ?>" autocomplete="off">
                                <?php } else { ?>
                                    <form id="login" class="card-body" tabindex="500" method="post" action="<?php echo base_url();?>index.php/Home/loginUser" autocomplete="off">
                                <?php } ?>
                                    <h3>Login</h3>
                                    <div class="mail">
                                        <input type="text" name="username" autocomplete="off">
                                        <label>Username</label>
                                    </div>
                                    <div class="passwd">
                                        <input type="password" name="password">
                                        <label>Password</label>
                                    </div>
                                    
                                    <div class="submit"> <button class="btn btn-primary btn-block" type="submit">Login</button> </div>
                                    <p class="mb-2"><a href="forgot.html">Forgot Password</a></p>
                                    <p class="text-dark mb-0">Don't have account?<a href="register.html" class="text-primary ml-1">Sign UP</a></p>
                                </form>
                                <hr class="divider">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <a href="https://www.facebook.com/" class="btn btn-icon mr-2 brround"> <span class="fa fa-facebook"></span> </a>
                                        </div>
                                        <div class="btn-group">
                                            <a href="https://www.google.com/gmail/" class="btn  mr-2 btn-icon brround"> <span class="fa fa-google"></span> </a>
                                        </div>
                                        <div class="btn-group">
                                            <a href="https://twitter.com/" class="btn  btn-icon brround"> <span class="fa fa-twitter"></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

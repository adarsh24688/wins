
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
                                        <input type="text" class="form-control" placeholder="First Name"name="first_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="Password"name="password">
                                    </div>
                                    <select class="form-control" id="states" name="state">
                                        <option value="mp">Madhya Pradesh</option>
                                        <option value="up">Utter Pradesh</option>
                                    </select>
                                    <div class="submit"> <button class="btn btn-primary btn-block" type="submit">Register</button> </div>
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

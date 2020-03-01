
    <?php require_once('header.php');?>
    <script type="text/javascript">
             if (performance.navigation.type == 1) {
                $.ajax({
                    url: '<?php echo base_url()?>index.php/Home/clearError',
                    method: 'post',
                    dataType: 'json',
                    success: function(response) {
                    }
                });
              }
        </script>
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
                                            <?php foreach($states as $state):?>
                                                <option value=<?php echo $state->StateID; ?>><?php echo $state->StateName; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" placeholder="Address"name="address" required>
                                    </div>
                                    <!-- <?php if(!empty($error)){
                                        echo '<span class="text-danger" id="error">'.$error.'</span>';
                                    }?> -->
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
        <?php require_once('footer.php');?>
        <section class="sptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body pattern-1">
                                <div class="wideget-user">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="wideget-user-desc text-center">
                                                <div class="wideget-user-img"> <img class="brround" src="<?php echo base_url('assets/images/users/'.$user->image);?>" alt="img"> </div>
                                                <div class="user-wrap wideget-user-info"> <a href="#" class="text-white"><h4 class="font-weight-semibold"><?php echo $user->first_name.' '.$user->last_name; ?></h4></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="wideget-user-tab">
                                    <div class="tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <ul class="nav">
                                                <li class=""><a href="#tab-5" class="active" data-toggle="tab">Profile</a></li>
                                                <li><a href="#tab-6" data-toggle="tab" class="">Edit Profile</a></li>
                                                <li><a href="#tab-7" data-toggle="tab" class="">Tickets <span class="badge badge-primary badge-pill">  <?php echo $count; ?></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
								<?php if($this->session->flashdata('user_msg')) {?>
                                    <script type="text/javascript">
                                        Swal.fire(
                                          'Well Done',
                                          '<?php echo $this->session->flashdata('user_msg');?>',
                                          'success'
                                        )
                                    </script>
								<?php }?>

                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-5">
                                            <div class="profile-log-switch">
                                                <div class="media-heading">
                                                    <h3 class="card-title mb-3 font-weight-bold">Personal Details</h3> </div>
                                                <ul class="usertab-list mb-0">
                                                    <li><a href="#" class="text-dark"><span class="font-weight-semibold">Full Name :</span> <?php echo $user->first_name.' '.$user->last_name; ?></a></li>
                                                    <li><a href="#" class="text-dark"><span class="font-weight-semibold">Email :</span> <?php echo $user->email; ?></a></li>
                                                    <li><a href="#" class="text-dark"><span class="font-weight-semibold">Phone :</span> <?php echo $user->phone; ?></a></li>
                                                    <li><a href="#" class="text-dark"><span class="font-weight-semibold">Email :</span> georgemestayer@Reallist.com</a></li>
                                                    <li><a href="#" class="text-dark"><span class="font-weight-semibold">Phone :</span> +125 254 3562 </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-6">
                                        	<form action="<?php echo base_url('index.php/Home/UpdateUser'); ?>" method="post" enctype="multipart/form-data">
                                        		<div class="row">
	                                                <div class="col-sm-6 col-md-6">
	                                                    <div class="form-group">
	                                                        <label class="form-label">First Name</label>
	                                                        <input type="text" value="<?php echo $user->first_name; ?>" name="first_name" class="form-control" placeholder="First Name"> </div>
	                                                </div>
	                                                <div class="col-sm-6 col-md-6">
	                                                    <div class="form-group">
	                                                        <label class="form-label">Last Name</label>
	                                                        <input type="text" value="<?php echo $user->last_name; ?>" name="last_name" class="form-control" placeholder="Last Name"> </div>
	                                                </div>
	                                                <div class="col-sm-6 col-md-6">
	                                                    <div class="form-group">
	                                                        <label class="form-label">Email address</label>
	                                                        <input type="email" value="<?php echo $user->email; ?>" name="email" class="form-control" placeholder="Email"> </div>
	                                                </div>
	                                                <div class="col-sm-6 col-md-6">
	                                                    <div class="form-group">
	                                                        <label class="form-label">Phone Number</label>
	                                                        <input type="number" value="<?php echo $user->phone; ?>" name="phone"  class="form-control" placeholder="Number"> </div>
	                                                </div>
	                                                <!-- <div class="col-md-12">
	                                                    <div class="form-group">
	                                                        <label class="form-label">Upload Image</label>
	                                                        <div class="custom-file">
	                                                            <input type="file" class="custom-file-input" value="<?php echo base_url('assets/images/users/'.$user->image); ?>" name="userfile">
	                                                            <label class="custom-file-label">Choose file</label>
	                                                        </div>
	                                                    </div>
	                                                </div> -->
	                                                <div class="col-md-12">
	                                                    <button type="submit" class="btn btn-primary">Update Profile</button>
	                                                </div>
	                                            </div>
                                        	</form>
                                            
                                        </div>
                                        <div class="tab-pane userprof-tab" id="tab-7">
                                            <div class="table-responsive border-top">
                                                <table class="table table-bordered table-hover mb-0 text-nowrap">
                                                    <?php
                                                        if($count === 0){
                                                            echo "<h3>No Tickets Purchased Yet...</h3>";
                                                        }else{

                                                    ?>
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Token Key</th>
                                                            <th>Price</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($tickets as $ticket): ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="media mt-0 mb-0">
                                                                        <div class="card-aside-img">
                                                                            <a href="<?php echo base_url('index.php/Home/loadView/'.$ticket->product_id); ?>"></a> <img src="<?php echo base_url('assets/images/products/'.$ticket->image);?>" alt="img"> </div>
                                                                        <div class="media-body">
                                                                            <div class="card-item-desc ml-4 p-0 mt-2"> <a href="<?php echo base_url('index.php/Home/loadView/'.$ticket->product_id); ?>" class="text-dark"><h4 class=""><?php echo $ticket->product_name; ?></h4></a></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $ticket->token; ?></td>
                                                                <td class="font-weight-semibold fs-16">Rs-<?php echo $ticket->ticket_price;?></td>

                                                                <?php  
    																$sold = $ticket->sold_count;
    																$stock = $ticket->ticket_count;
    																if($sold === $stock){?>
    																	<td><a href="<?php echo base_url('index.php/Home/loadView/'.$ticket->product_id); ?>" class="badge badge-success">Draw Completed</a></td>
    																<?php }else{?>
    																	<td><a href="<?php echo base_url('index.php/Home/loadView/'.$ticket->product_id); ?>" class="badge badge-info"><?php echo $sold.'/'.$stock; ?> Tickets Sold</a></td>
    																<?php }
    															?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

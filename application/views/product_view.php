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
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <!--Classified Description-->
                        <div class="card overflow-hidden">
                            <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">Offer</span></div>
                            <div class="card-body">
                                <div class="item-det mb-4"> <a href="#" class="text-dark"><h3 class=""><?php echo $product->product_name; ?></h3></a>
                                </div>
                                <div class="product-slider">
                                    <div id="carousel" class="carousel slide" data-ride="carousel">
                                        <div class="arrow-ribbon2 bg-primary">&#x20b9; <?php echo $product->ticket_price;?></div>
                                        <div class="carousel-inner">
                                            <?php $count=0;
                                            foreach($images as $image):
                                                if($count==0){?>
                                            <div class="carousel-item active" style="height:400px;"> <img src="<?php echo base_url('assets/images/products/'.$image->image_name);?>" alt="img"> </div>
                                            <?php 
                                            $count++;}else{?>
                                            <div class="carousel-item" style="height:400px;"> <img src="<?php echo base_url('assets/images/products/'.$image->image_name);?>" alt="img"> </div>
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
                                                    <div data-target="#carousel" data-slide-to="<?php echo $count++;?>" class="thumb"><img src="<?php echo base_url('assets/images/products/'.$image->image_name);?>" alt="img" ></div>
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
                    <div class="col-xl-5 col-lg-5 col-md-12">
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
                                        <?php
                                            if($percentage == 0 || $percentage <=12){
                                        ?>
                                            <div class="progress blue mt-3 mb-3">
                                                <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:12%">
                                                    <div class="progress-value"><?php echo round($percentage); ?>%</div>
                                                </div>
                                            </div>
                                        <?php
                                            }else{
                                        ?>
                                            <div class="progress blue mt-2 mb-2">
                                                <div class="progress-bar progress-bar-info progress-bar-striped active" style="<?php echo 'width:'.$percentage.'%'; ?>">
                                                    <div class="progress-value"><?php echo round($percentage); ?>%</div>
                                                </div>
                                            </div>

                                        <?php
                                            }
                                        ?>
                                        <form  action="<?php echo base_url(); ?>index.php/Home/checkUserLogin/<?php echo $product->id?>" method="post">
                                            <div class="row mt-3">
                                                <div class="col-lg-4">
                                                    <div class="input-group">
                                                       <span class="input-group-btn">
                                                           <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantity" id="minus">
                                                           <span>-</span>
                                                           </button>
                                                       </span>
                                                       <input type="text" name="quantity" class="form-control input-number" value="<?php echo $quantity ?>" min="1" max="10">
                                                       <span class="input-group-btn">
                                                           <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity" id="plus">
                                                           <span>+</span>
                                                           </button>
                                                       </span>
                                                    </div>    
                                                </div>
                                                <div class="col-lg-4">
                                                    <?php if($product->sold_count === $product->ticket_count){?>
                                                    <button type="button" class="btn btn-danger btn-lg" disabled style="cursor:not-allowed">Sold Out</button><?php }else{?>
                                                    <button type="submit" class="btn btn-primary btn-lg">Buy Now</button>
                                                    <?php }?>
                                                </div>
                                             </div>
                                        </form>
                                   

                                </div>
                            </div>               
                        </div>
                    <!--/Right Side Content-->
                </div>
            </div>
        </section>
<script type="text/javascript">

    $('.btn-number').click(function(e){
        e.preventDefault();
        
        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                
                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                    // $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled');
                    $("#plus").prop('disabled', false);
                } 
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                    // $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled');
                    $("#minus").prop('disabled', false);
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

    $('.input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });

    $('.input-number').change(function() {
        
        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        
        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        
        
    });
    
    $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                 // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) || 
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

</script>
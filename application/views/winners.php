        <section class="sptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="margin-top:50px;">

                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-5">
                                            <div class="table-responsive border-top">
                                                <table class="table table-bordered table-hover mb-0 text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($winners as $winner): ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="media mt-0 mb-0">
                                                                        <div class="card-aside-img">
                                                                            <a href="<?php echo base_url('index.php/Home/loadView/'.$winner->id); ?>"></a> <img src="<?php echo base_url($winner->image);?>" alt="img"> </div>
                                                                        <div class="media-body">
                                                                            <div class="card-item-desc ml-4 p-0 mt-2"> <a href="<?php echo base_url('index.php/Home/loadView/'.$winner->id); ?>" class="text-dark"><h4 class=""><?php echo $winner->product_name; ?></h4></a></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $winner->first_name.' '.$winner->last_name; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
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

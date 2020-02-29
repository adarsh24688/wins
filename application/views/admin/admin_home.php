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
                                        <div class="wideget-user-img"> <img class="brround" src="<?php echo base_url('assets/images/users/151.jpg');?>" alt="img"> </div>
                                        <div class="user-wrap wideget-user-info"> <a href="#" class="text-white"><h4 class="font-weight-semibold">Abhishek Rathore</h4></a>
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
                                        <li class=""><a href="#tab-7" class="active" data-toggle="tab">Products</a></li>
                                        <li><a href="#tab-6" data-toggle="tab" class="">Add Product</span></a></li>
                                        <li><a href="#tab-8" data-toggle="tab" class="">Draw</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($this->session->flashdata('product_update_msg')) {?>
                    <script type="text/javascript">
                        Swal.fire(
                          'Well Done',
                          '<?php echo $this->session->flashdata('product_update_msg');?>',
                          'success'
                        )
                    </script>
                    <?php }?>
                    <?php if($this->session->flashdata('product_insert_msg')) {?>
                        <script type="text/javascript">
                            Swal.fire(
                              'Well Done',
                              '<?php echo $this->session->flashdata('product_insert_msg');?>',
                              'success'
                            )
                        </script>
                    <?php }?>

                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="border-0">
                                            <div class="tab-content">
                                                <div class="tab-pane" id="tab-6">
                                                    <form action="<?php echo base_url('index.php/Admin/addProduct'); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Product Name</label>
                                                                    <input type="text" name="product_name" class="form-control" placeholder="Product_name"> </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Ticket Count</label>
                                                                    <input type="number" name="ticket_count" class="form-control" placeholder="Ticket Count"> </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Ticket Price</label>
                                                                    <input type="number" name="ticket_price" class="form-control" placeholder="Ticket Price"> </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea rows="5" class="form-control" placeholder="Enter About your description" name="description"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Upload Image</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" name="userfile[]" multiple="multiple">
                                                                        <label class="custom-file-label">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-primary">Add Product</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                <div class="tab-pane" id="tab-8">
                                                    <div class="table-responsive border-top">
                                                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Tickets Count</th>
                                                                    <th>Tickets Sold</th>
                                                                    <th>Date</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($tickets as $product): ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="media mt-0 mb-0">
                                                                                <div class="card-aside-img">
                                                                                    <a href="<?php echo base_url('index.php/Home/loadView/'.$product->id); ?>"></a> <img src="<?php echo base_url('assets/images/products/'.$product->image);?>" alt="img"> </div>
                                                                                <div class="media-body">
                                                                                    <div class="card-item-desc ml-4 p-0 mt-2"> <a href="<?php echo base_url('index.php/Home/loadView/'.$product->id); ?>" class="text-dark"><h4 class=""><?php echo $product->product_name; ?></h4></a></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $product->ticket_count; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $product->sold_count; ?>
                                                                        </td>
                                                                        <td><span class="badge badge-danger"><?php echo $product->created_date; ?></span> </td>
                                                                            <td>
                                                                                <button onclick="loadEditForm(<?php echo $product->id; ?>)" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></button>
                                                                                <button onclick="deleteProduct(<?php echo $product->id; ?>)" id='delete' class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                                                            </td>
                                                                    </tr>
                                                                    <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane active" id="tab-7">
                                                    <div class="table-responsive border-top">
                                                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>description</th>
                                                                    <th>Status</th>
                                                                    <th>Edit</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($products as $product): ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="media mt-0 mb-0">
                                                                                <div class="card-aside-img">
                                                                                    <a href="<?php echo base_url('index.php/Home/loadView/'.$product->id); ?>"></a> <img src="<?php echo base_url('assets/images/products/'.$product->image);?>" alt="img"> </div>
                                                                                <div class="media-body">
                                                                                    <div class="card-item-desc ml-4 p-0 mt-2"> <a href="<?php echo base_url('index.php/Home/loadView/'.$product->id); ?>" class="text-dark"><h4 class=""><?php echo $product->product_name; ?></h4></a></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo word_limiter($product->description, 7) ; ?>
                                                                        </td>
                                                                        <?php if($product->is_deleted == 1){
                                                                    echo '<td><span class="badge badge-danger">Deleted</span> </td>';
                                                                }else{
                                                                    echo '<td><span class="badge badge-success">Available</span> </td>';
                                                                } 
                                                                ?>
                                                                            <td>
                                                                                <button onclick="loadEditForm(<?php echo $product->id; ?>)" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></button>
                                                                                <button onclick="deleteProduct(<?php echo $product->id; ?>)" id='delete' class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                                                            </td>
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

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Ptoduct</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="edit_form" action="<?php echo base_url('index.php/Admin/updateProduct/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Name</label>
                                <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product_name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Ticket Count</label>
                                <input type="number" id="ticket_count" name="ticket_count" class="form-control" placeholder="Ticket Count">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Ticket Price</label>
                                <input type="number" id="ticket_price" name="ticket_price" class="form-control" placeholder="Ticket Price">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group is_deleted">
                                <label class="form-label">Delete</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="is_deleted">
                                    <option value=0>False</option>
                                    <option value=1>True</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea rows="5" class="form-control" placeholder="Enter About your description" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                 <div class="form-group">
                    <label class="form-label">Upload Image</label>
                    <div class="custom-file">
                       <input type="file" class="custom-file-input" name="userfile[]" multiple="multiple">
                       <label class="custom-file-label">Choose file</label>
                    </div>
                 </div>
              </div> -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        // for initially hiding modal
        $('#myModal').modal('hide');

    });

    // this function will make is_delete=1 is db
    function deleteProduct(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url()?>index.php/Admin/deleteProduct',
                    method: 'post',
                    data: {
                        'product_id': id
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'Your Product has been deleted.',
                            'success'
                        )
                    }
                });
            }
        });
    };

    //this function will load product from db and set value into modal form
    function loadEditForm(product_id) {
        $.ajax({
            url: '<?php echo base_url()?>index.php/Admin/fetchProductDetails',
            method: 'post',
            data: {
                'product_id': product_id
            },
            dataType: 'json',
            success: function(response) {
                $("#product_name").val(response['product_name']);
                $("#ticket_price").val(response['ticket_price']);
                $("#ticket_count").val(response['ticket_count']);
                $("#description").val(response['description']);
                if(parseInt(response['is_deleted']) === 0){
                    $('.is_deleted option:eq(0)').prop('selected','selected');
                }else{
                     $('.is_deleted option:eq(1)').prop('selected','selected');
                };
                $("#edit_form").attr('action', '<?php echo base_url("index.php/Admin/updateProduct/");?>' + response['id']);
                $('#myModal').modal('show');
            }
        });

    };
</script>
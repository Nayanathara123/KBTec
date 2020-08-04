
<?php $this->load->view('Dashboard/header'); ?>

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                
                <?php $this->load->view('Dashboard/leftPanel'); ?>    

            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                
            <?php $this->load->view('Dashboard/topPanel'); ?> 

            <div class="user-dashboard">
                <h1>Product Add</h1>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                        <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/ProductController/Add_Product" enctype="multipart/form-data">

                          <div class="form-group">
                            <label for="Name">Product Name:</label>
                            <input type="Name" class="form-control" id="product_name" name="product_name">
                          </div></br></br>

                           <label for="product_categry">Product Category:</label>
                           <select name="product_categry" id="product_categry">
                            <?php foreach ($product_category_list as $key=>$value) { ?>
                                <option value="<?php echo $value->pc_id; ?>"><?php echo $value->pc_name; ?></option>
                            <?php }?>                                  
                            </select></br></br>
                            
                            <div class="form-group">
                            <label for="Price">Product Price:</label>
                            <input type="Price" class="form-control" id="price" name="price">
                            </div></br></br>

                            <div class="form-group">
                            <label for="description">Product Description:</label>
                            <input type="description" class="form-control" id="description" name="description">
                            </div></br></br>

                            <div class="form-group">
                            <label for="pimage">Image :</label>
                            <input type="file" class="form-control" id="pimage" name="pimage">
                            </div></br></br>



                          <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                    </div>
                    
                </div>
            </div>

            </div>
        </div>

    </div>



    <!-- Modal -->
    

</body>
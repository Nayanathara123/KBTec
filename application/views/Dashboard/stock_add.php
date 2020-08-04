
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
                <h1>Stock Manage</h1>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                        <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/StockController/Add_Stock">

                          <label for="product">Product:</label>
                           <select name="product" id="product">
                            <?php foreach ($product_data as $key=>$value) { ?>
                                <option value="<?php echo $value->p_id; ?>"><?php echo $value->product_name; ?></option>
                            <?php }?>                                  
                            </select></br></br>

                           <label for="seller">Seller:</label>
                           <select name="seller" id="seller">
                            <?php foreach ($seller_data as $key=>$value) { ?>
                                <option value="<?php echo $value->s_id; ?>"><?php echo $value->s_name; ?></option>
                            <?php }?>                                  
                            </select></br></br>
                            
                            <div class="form-group">
                            <label for="TotItems">Total Items:</label>
                            <input type="number" class="form-control" id="TotItems" name="TotItems">
                            </div></br></br>

                            <div class="form-group">
                            <label for="reorder">Reorder level:</label>
                            <input type="number" class="form-control" id="reorder" name="reorder">
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
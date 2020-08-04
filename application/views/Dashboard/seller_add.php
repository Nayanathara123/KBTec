
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
                <h1>Seller Add</h1>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                        <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/SellerController/Add_Seller">

                          <div class="form-group">
                            <label for="Name">Seller Name:</label>
                            <input type="Name" class="form-control" id="seller_name" name="seller_name">
                           </div></br></br>

                           <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                           </div></br></br>
                            
                            <div class="form-group">
                            <label for="Price">Contact Number:</label>
                            <input type="Price" class="form-control" id="contact" name="contact">
                            </div></br></br>

                            <div class="form-group">
                            <label for="nic">NIC Number:</label>
                            <input type="text" class="form-control" id="nic" name="nic">
                            </div></br></br>

                            <div class="form-group">
                            <label for="pimage">Date of Birth :</label>
                            <input type="Date" class="form-control" id="dob" name="dob">
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
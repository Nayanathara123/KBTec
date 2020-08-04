
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
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-xs-8">
                          <h1>Seller List</h1>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                          <a href="<?php echo base_url(); ?>index.php/SellerController/Add_View" class="btn btn-primary">Seller Add</a>
                      </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                            <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Seller Name</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">Contact</th>
                                      <th scope="col">NIC</th>
                                      <th scope="col">DOB</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($seller_data as $key=>$seller) { ?>
                                      <tr>
                                        <th scope="row"><?php echo $seller->s_id; ?></th>
                                        <td><?php echo $seller->s_name; ?></td>
                                        <td><?php echo $seller->address; ?></td>
                                        <td><?php echo $seller->contact_no; ?></td>
                                        <td><?php echo $seller->NIC; ?></td>
                                        <td><?php echo $seller->DOB; ?></td>
                                        <td><?php if($seller->active == 1){echo "Active";}else{ echo "Inactive";} ?></td>
                                      </tr>
                                    <?php } ?>                                    
                                    
                                  </tbody>
                            </table>                               
                        </div>                       
                    </div>
                </div>

            </div>
        </div>

    </div>

    

</body>
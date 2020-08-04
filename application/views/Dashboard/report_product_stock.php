
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
                          <h1>Product Stock Report</h1>
                      </div>                      
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                            <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Product Name</th>
                                      <th scope="col">Seller Name</th>
                                      <th scope="col">Total Items</th>
                                      <th scope="col">Sold Items</th>
                                      <th scope="col">Income</th>
                                      <th scope="col">Reorder Level</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($report_data as $key=>$data) { ?>
                                      <tr>
                                        <th scope="row"><?php echo $data->p_id; ?></th>
                                        <td><?php echo $data->product_name; ?></td>
                                        <td><?php echo $data->s_name; ?></td>
                                        <td><?php echo $data->total_items; ?></td>
                                        <td><?php echo $data->sold_items; ?></td>
                                        <td><?php echo (int)$data->sold_items * (int)$data->price; ?></td>
                                        <td><?php echo $data->reorder_level; ?></td>
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



    <!-- Modal -->
    

</body>
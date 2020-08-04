
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
                          <h1>Product Category List</h1>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                          <a href="<?php echo base_url(); ?>index.php/ProductCategoryController/Add_View" class="btn btn-primary">Product Category Add</a>
                      </div>
                  </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                            <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Product Category Name</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($category_data as $key=>$category) { ?>
                                      <tr>
                                        <th scope="row"><?php echo $category->pc_id; ?></th>
                                        <td><?php echo $category->pc_name; ?></td>
                                        <td><?php echo $category->description; ?></td>
                                        <td><?php if($category->active == 1){echo "Active";}else{ echo "Inactive";} ?></td>
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
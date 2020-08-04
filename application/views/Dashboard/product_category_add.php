
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

                <h2><?php echo $this->session->flashdata('item'); ?></h2> 
                
                <div class="user-dashboard">
                    <h1>Product Category Add</h1>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                            <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/ProductCategoryController/Add_Category">
                              <div class="form-group">
                                <label for="Name">Product Category Name:</label>
                                <input type="Name" class="form-control" id="name" name="name">
                              </div></br></br>
                              <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="description" class="form-control" id="description" name="description">
                              </div></br>
                              
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
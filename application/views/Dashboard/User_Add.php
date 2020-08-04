
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
                <h1>Create System User</h1>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                        <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/LoginController/Add_User">

                          <div class="form-group">
                            <label for="Name">User Name:</label>
                            <input type="Name" class="form-control" id="user_name" name="user_name">
                          </div></br></br>
                            
                            <div class="form-group">
                            <label for="Price">Password:</label>
                            <input type="password" class="form-control" id="pw" name="pw">
                            </div></br></br>

                            <div class="form-group">
                            <label for="Price">Confirm Password:</label>
                            <input type="password" class="form-control" id="cpw" name="cpw">
                            </div></br></br>

                          <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                    </div>
                    
                </div>
            </div>

            </div>
        </div>

    </div>


    

</body>
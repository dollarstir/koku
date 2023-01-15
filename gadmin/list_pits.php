<?php
involve('core.php');
involve('admin.php');
admintop('Pits');
$admin = new Admin();

?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

  <?php
            admminmini();
            adminnav();
    ?>


    

    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pits</h1>
            </div>
            
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-header">
                  <!-- <h3 class="card-title">DataTable with default features</h3> -->
                </div>

               

                <div class="card-body">
                    <!-- add faculty -->
                    
                    <!-- add faculty -->
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#addpit" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Pit</button> <h5 style="float:right;">TOTAL PITS :  <span class="badge badge-secondary right ctpit" id="ctpit"><?= countall('pit'); ?></span>  </h5></div>
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Pit</th>
                        <th>Fuel</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblpit">

                    <?php
                    $admin = new admin();
                    $admin->getpits();
                    ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      

                        
                      
                      <tr>
                      <th>#</th>
                        <th>Pit</th>
                        <th>Fuel</th>
                       
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- eidt modal -->
                <div id="editpit"  data-iziModal-icon="fa fa-edit">
                    <form class="editpit">
                    
                    </form>

                </div>

                <!-- edit modal -->

                <!-- view faculty -->
                <div id="viewfaculty"  data-iziModal-icon="fa fa-eye">
                    <table width="100%" id="facultyinfo"> 
                        
                    </table>
                    
                </div>
                <!-- view faculty -->

                <!-- add pit -->

                <div id="addpit" data-iziModal-icon="fa fa-plus">
                    <form class="addpit">
                    <div class="card-body">


                        



                       
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name of Pit</label>
                          <input type="text" class="form-control" id="gw" placeholder="" name="pit_name">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Fuel (eg: 6)</label>
                          <input type="number" class="form-control" id="gw" placeholder="" name="fuel">
                        </div>


                       

                        

                        

                        


                        

                        

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- add faculty -->

              </div>

            </div>

          </div>

        </div>

      </section>

    </div>

    <?php admintail(); ?>
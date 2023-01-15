<?php
involve('core.php');
involve('admin.php');
admintop('Trucks');
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
              <h1>Trucks</h1>
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
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#addtruck" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Truck</button> <h5 style="float:right;">TOTAL TRUCKS :  <span class="badge badge-secondary right ctpit" id="cttruck"><?= countall('trucks'); ?></span>  </h5></div>
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Truck Name</th>
                        <th>Truck Number</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tbltruck">

                    <?php
                    $admin = new admin();
                    $admin->gettrucks();
                    ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      

                        
                      
                      <tr>
                      <th>#</th>
                        <th>Truck Name</th>
                        <th>Truck Number</th>
                       
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- eidt modal -->
                <div id="edittruck"  data-iziModal-icon="fa fa-edit">
                    <form class="edittruck">
                    
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

                <div id="addtruck" data-iziModal-icon="fa fa-plus">
                    <form class="addtruck">
                    <div class="card-body">


                        



                       
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name of Truck</label>
                          <input type="text" class="form-control" id="gw" placeholder="" name="truck_name">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Truck Number</label>
                          <input type="text" class="form-control" id="gw" placeholder="" name="truck_number">
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
<?php
involve('core.php');
involve('admin.php');
admintop('Report');
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
              <h1>Report</h1>
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
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#addfacultymodal" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Trip</button> <h5 style="float:right;">TOTAL TRIPS :  <span class="badge badge-secondary right" id="cttrip"><?= countall('trips'); ?></span>  TOTAL Fuel :  <span class="badge badge-secondary right" id="ctfuel"><?=sumall('trips', 'fuel'); ?></span></h5></div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Pit</th>
                        <th>Truck</th>
                        <th>Gross</th>
                        <th>Tare</th>
                        <th>Net</th>
                        <th>Fuel</th>
                        <th>Time in</th>
                        <th>Time out</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblfaculty">

                    <?php
                    $admin = new admin();
                    $admin->gettrips();
                    ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      

                        
                      
                      <tr>
                      <th>#</th>
                        <th>Pit</th>
                        <th>Truck</th>
                        <th>Gross</th>
                        <th>Tare</th>
                        <th>Net</th>
                        <th>Fuel</th>
                        <th>Time in</th>
                        <th>Time out</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- eidt modal -->
                <div id="editfaculty"  data-iziModal-icon="fa fa-edit">
                    <form class="edittrip">
                    
                    </form>

                </div>

                <!-- edit modal -->

                <!-- view faculty -->
                <div id="viewfaculty"  data-iziModal-icon="fa fa-eye">
                    <table width="100%" id="facultyinfo"> 
                        
                    </table>
                    
                </div>
                <!-- view faculty -->

                <!-- add faculty -->

                <div id="addfacultymodal" data-iziModal-icon="fa fa-plus">
                    <form class="addtrip">
                    <div class="card-body">


                        <div class="form-group">
                          <label>Select Pit</label>
                          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                              data-select2-id="1" tabindex="-1" aria-hidden="true" name="pid">
                              <?= $admin->listpits(); ?>
                              
                          </select>
                          <!--  -->
                        </div>



                        <div class="form-group">
                          <label>Select Truck</label>
                          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                              data-select2-id="1" tabindex="-1" aria-hidden="true" name="tid">
                              <?= $admin->listrucks(); ?>
                              
                          </select>
                          <!--  -->
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Gross Weight (weight of truck + weight of load)</label>
                          <input type="number" class="form-control" id="gw" placeholder="" name="gross">
                        </div>


                        <div class="form-group">
                          <label for="exampleInputEmail1">Tare Weight( Weight of truck only)</label>
                          <input type="number" class="form-control" id="tw" placeholder="" name="tare">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Net weight</label>
                        <input type="number" class="form-control" id="netwaight" placeholder="" name="netw" disabled>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Time in</label>
                        <input type="time" class="form-control" id="exampleInputEmail1" placeholder="" name="time_in">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Time Out</label>
                        <input type="time" class="form-control" id="exampleInputEmail1" placeholder="" name="time_out">
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
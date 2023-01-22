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

        
          


          <!-- fomr horizotal -->
          <div class="row">
            
            
              <div class="col-lg-3 col-6">

                          <div class="form-group">
                            <label>Select Pit</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true" name="pid">
                                <?= $admin->listpits(); ?>
                                
                            </select>
                            
                          </div>


                          <!-- <div class="form-group">
                            <label>Select Truck</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true" name="pid">
                                <?= $admin->listrucks(); ?>
                                
                            </select>
                           
                          </div> -->
              </div>

              <div class="col-lg-3 col-6">

                          <div class="form-group">
                            <label>From</label>
                            <input class="form-control "  type="date" name ="date1">
                                
                            <!--  -->
                          </div>
              </div>

              <div class="col-lg-3 col-6">

                          <div class="form-group">
                            <label>To</label>
                            <input class="form-control "  type="date" name ="date2">
                                
                            <!--  -->
                          </div>
              </div>

              <div class="col-lg-3 col-6">

                <button style="margin-top:30px;" type="submit" class="btn btn-primary">Get Report</button>
                <button style="margin-top:30px;" type="submit" class="btn btn-primary">Get Report</button>
              </div>

            

            <!-- Report by Pits form -->

          </div>
        <!-- End Horizontal form -->




          <!-- Reports -->

        <div class="row">
            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo countall('pit'); ?></h3>
                  <p>Total Pits</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="pits" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo countall('trucks'); ?></h3>
                  <p>Total Trucks</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="trucks" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo countall('trips'); ?></h3>
                  <p>Total Trips</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="trips" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo customcount('trips', [['date_created', '=', date('Y-m-d')]]); ?></h3>
                  <p> Trips Today</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        <!-- reports -->

        </div>

      </section>

    </div>

    <?php admintail(); ?>
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
                       
                  <div class="col-4">

                          <div class="form-group" id="">
                            <label>View Report By?</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true" name="reporttype" id="reporttype">
                               
                                <option value="pit"> Pit</option>
                                <option value="truck"> Truck</option>
                            </select>
                            
                          </div>


                          
                  </div>
            

          </div>

        
          


          <!-- fomr horizotal -->
          <div class="row" id="frmcontroler"  style="display:none;">
            
            
              <div class="col-lg-3 col-6">

                          <div class="form-group" id="pitfrm">
                            <label>Select Pit</label>
                            <select class="form-control select2 select2-hidden-accessible pid" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true" name="pid">
                                <?= $admin->listpits(); ?>
                                
                            </select>
                            
                          </div>


                          <div class="form-group" id="truckfrm">
                            <label>Select Truck</label>
                            <select class="form-control select2 select2-hidden-accessible tid" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true" name="tid">
                                <?= $admin->listrucks(); ?>
                                
                            </select>
                           
                          </div>
              </div>

              <div class="col-lg-3 col-6">

                          <div class="form-group">
                            <label>From</label>
                            <input class="form-control "  type="date" name ="date1"  id="fromdate">
                                
                            <!--  -->
                          </div>
              </div>

              <div class="col-lg-3 col-6">

                          <div class="form-group">
                            <label>To</label>
                            <input class="form-control "  type="date" name ="date2" id="todate">
                                
                            <!--  -->
                          </div>
              </div>

              <div class="col-lg-3 col-6">

                <button style="margin-top:30px;" type="submit" class="btn btn-primary" id="btnpit">Get pit</button>
                <button style="margin-top:30px;" type="submit" class="btn btn-primary" id="btntruck">Get Truck</button>
              </div>

            

            <!-- Report by Pits form -->

          </div>
        <!-- End Horizontal form -->




          <!-- Reports -->

        <div class="row" id="displayreport">
            

            

          </div>
        <!-- reports -->

        </div>

      </section>

    </div>

    <?php admintail(); ?>
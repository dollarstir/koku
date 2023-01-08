<?php
involve('core.php');
involve('admin.php');
admintop('Positions');
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
              <h1>Positions</h1>
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
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#addpositionmodal" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Position</button></div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblposition">

                    <?php $admin->getpositions(); ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>#</th>
                        <th>Name</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- eidt modal -->
                <div id="editposition"  data-iziModal-icon="fa fa-edit">
                    <form class="editposition">
                    
                    </form>

                </div>

                <!-- edit modal -->

                <!-- view programme -->
                <div id="viewprogramme"  data-iziModal-icon="fa fa-eye">
                    <table width="100%" id="programmeinfo"> 
                        
                    </table>
                    
                </div>
                <!-- view programme -->

                <!-- add programme -->

                <div id="addpositionmodal" data-iziModal-icon="fa fa-plus">
                    <form class="addposition">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Name of Position</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="position_name">
                        </div>

                        

                        
                        
                        


                        <div class="form-group">
                        <label>Position status</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" name="position_status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            
                        </select>
                        <!--  -->
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- add programme -->

              </div>

            </div>

          </div>

        </div>

      </section>

    </div>

    <?php admintail(); ?>
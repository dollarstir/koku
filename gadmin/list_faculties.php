<?php
involve('core.php');
involve('admin.php');
admintop('Faculties');
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
              <h1>Faculties</h1>
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
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#addfacultymodal" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Faculty</button></div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Factory</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblfaculty">

                    <?php $admin->getfaculties(); ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Factory</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- eidt modal -->
                <div id="editfaculty"  data-iziModal-icon="fa fa-edit">
                    <form class="editfaculty">
                    
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
                    <form class="addfaculty">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Name of Faculty</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="faculty_name">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Faculty Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="faculty_code">
                        </div>

                        

                        <div class="form-group">
                        <label for="exampleInputEmail1">Faculty Description</label>
                        <textarea  class="form-control" id="exampleInputEmail1" name="faculty_description"></textarea>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Factory Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name_of_factory">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Product production</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="product_production">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">License Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="license_code">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Business Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="business_address">
                        </div>


                        

                        <div class="form-group">
                        <label>Faculty status</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" name="faculty_status">
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
                <!-- add faculty -->

              </div>

            </div>

          </div>

        </div>

      </section>

    </div>

    <?php admintail(); ?>
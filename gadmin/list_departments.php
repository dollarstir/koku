<?php
involve('core.php');
involve('admin.php');
admintop('Departments');
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
              <h1>Department</h1>
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
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#adddepartmentmodal" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Department</button></div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Faculty</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tbldepartment">

                    <?php $admin->getdepartments(); ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Faculty</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- eidt modal -->
                <div id="editdepartment"  data-iziModal-icon="fa fa-edit">
                    <form class="editdepartment">
                    
                    </form>

                </div>

                <!-- edit modal -->

                <!-- view department -->
                <div id="viewdepartment"  data-iziModal-icon="fa fa-eye">
                    <table width="100%" id="departmentinfo"> 
                        
                    </table>
                    
                </div>
                <!-- view department -->

                <!-- add department -->

                <div id="adddepartmentmodal" data-iziModal-icon="fa fa-plus">
                    <form class="adddepartment">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Name of Department</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="department_name">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Department Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="department_code">
                        </div>

                        

                        <div class="form-group">
                        <label for="exampleInputEmail1">Department Description</label>
                        <textarea  class="form-control" id="exampleInputEmail1" name="department_description"></textarea>
                        </div>

                        
                        
                        <div class="form-group">
                        <label>Faculty Name</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="2" tabindex="-1" aria-hidden="true" name="faculty">
                            <?php
                            $admin = new Admin();

                            echo $admin->facultyoptions(); ?>
                            
                        </select>
                        <!--  -->
                        </div>


                        <div class="form-group">
                        <label>Department status</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" name="department_status">
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
                <!-- add department -->

              </div>

            </div>

          </div>

        </div>

      </section>

    </div>

    <?php admintail(); ?>
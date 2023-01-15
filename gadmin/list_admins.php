<?php
involve('core.php');
involve('admin.php');
admintop('Administrators');
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
              <h1>Administrators</h1>
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
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#addfacultymodal" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Admin</button></div>
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Status</th>
                        
                        <th>Date Added</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblfaculty">

                    <?php
                    $admin = new admin();
                    $admin->getadmins();
                    ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      

                        
                      
                      <tr>
                      <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Status</th>
                        
                        <th>Date Added</th>
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

                <div id="addadmin" data-iziModal-icon="fa fa-plus">
                    <form class="addadmin">
                    <div class="card-body">


                         <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" placeholder="" name="name">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Username( NB: no spaces allowed)</label>
                          <input type="text" class="form-control" placeholder="" name="username">
                        </div>


                        <div class="form-group">
                          <label for="exampleInputEmail1">Phone Number</label>
                          <input type="text" class="form-control" placeholder="" name="contact">
                        </div>



                        <div class="form-group">
                          <label>Select Role</label>
                          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                              data-select2-id="1" tabindex="-1" aria-hidden="true" name="role">
                                <option value="admin">Admin</option>
                                <option value="supper">Supper Admin</option>
                              
                          </select>
                          <!--  -->
                        </div>


                        <div class="form-group">
                          <label>Account Status</label>
                          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                              data-select2-id="1" tabindex="-1" aria-hidden="true" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive Admin</option>
                              
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
<?php
involve('core.php');
involve('admin.php');
admintop('Courses');
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
              <h1>Course</h1>
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
                    <div><button type="button" class="btn btn-primary" data-izimodal-open="#addcoursemodal" style="margin:10px;" data-izimodal-transitionin="fadeInDown">Add Course</button></div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Credit Hours</th>
                        <th>Programme</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblcourse">

                    <?php $admin->getcourses(); ?>
                      
                        
                      
                     
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Credit Hours</th>
                        <th>Programme</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- eidt modal -->
                <div id="editcourse"  data-iziModal-icon="fa fa-edit">
                    <form class="editcourse">
                    
                    </form>

                </div>

                <!-- edit modal -->

                <!-- view programme -->
                <div id="viewcourse"  data-iziModal-icon="fa fa-eye">
                    <table width="100%" id="courseinfo"> 
                        
                    </table>
                    
                </div>
                <!-- view programme -->

                <!-- add programme -->

                <div id="addcoursemodal" data-iziModal-icon="fa fa-plus">
                    <form class="addcourse">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Name of Course</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="course_name">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Course Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="course_code">
                        </div>

                        

                        <div class="form-group">
                        <label for="exampleInputEmail1">Course Description</label>
                        <textarea  class="form-control" id="exampleInputEmail1" name="course_description"></textarea>
                        </div>

                        
                        
                        <div class="form-group">
                        <label>Programme Name</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" name="programme_id">
                            <?php
                            $admin = new Admin();

                            echo $admin->programmeoptions(); ?>
                            
                        </select>
                        <!--  -->
                        </div>


                        <div class="form-group">
                        <label>Credit Hours</label>
                        <select class="form-control select2 " style="width: 100%;"
                            data-select2-id="2" tabindex="-1" aria-hidden="true" name="course_credit">
                            <option value="1">1 credit Hour</option>
                            <option value="2">2 Credit Hours</option>
                            <option value="3">3 Credit Hours</option>
                            <option value="4">4 Credit Hours</option>
                            <option value="5">5 Credit Hours</option>
                            
                        </select>
                        <!--  -->
                        </div>


                        <div class="form-group">
                        <label>Course status</label>
                        <select class="form-control select2 " style="width: 100%;"
                            data-select2-id="3" tabindex="-1" aria-hidden="true" name="course_status">
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
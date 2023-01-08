<?php
involve('core.php');
involve('admin.php');
admintop('New Programme');

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
              <h1>New Programme</h1>
            </div>
            
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-10">

              <div class="card card-primary">
                <!-- <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div> -->


                <form class="addprogramme">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name of Programme</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="programme_name">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Programme Code</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="programme_code">
                    </div>

                    

                    <div class="form-group">
                      <label for="exampleInputEmail1">Programme Description</label>
                      <textarea  class="form-control" id="exampleInputEmail1" name="programme_description"></textarea>
                    </div>

                    
                    
                    <div class="form-group">
                      <label>Department Name</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                        data-select2-id="2" tabindex="-1" aria-hidden="true" name="department_id">
                        <?php
                        $admin = new Admin();

                        echo $admin->departmentoptions(); ?>
                        
                      </select>
                      <!--  -->
                    </div>


                    <div class="form-group">
                      <label>Programme status</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                        data-select2-id="1" tabindex="-1" aria-hidden="true" name="programme_status">
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


              


              

            </div>


            

          </div>

        </div>
      </section>

    </div>

    <?php admintail(); ?>
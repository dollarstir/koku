<?php
involve('core.php');
involve('admin.php');
admintop('New Position');

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
              <h1>New Position</h1>
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


              


              

            </div>


            

          </div>

        </div>
      </section>

    </div>

    <?php admintail(); ?>
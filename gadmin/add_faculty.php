<?php
involve('core.php');

admintop('New Faculty');

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
              <h1>New Faculty</h1>
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


              


              

            </div>


            

          </div>

        </div>
      </section>

    </div>

    <?php admintail(); ?>
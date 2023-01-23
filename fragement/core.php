<?php

function admintop($title)
{
    echo '<!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fleet Manager - '.$title.'</title>
  
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  
    <link rel="stylesheet" href="gadmin/plugins/fontawesome-free/css/all.min.css">
  
    <link rel="stylesheet" href="gadmin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
    <link rel="stylesheet" href="gadmin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  
    <link rel="stylesheet" href="gadmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    '.Yolk::uicore('cssa').'
  
    <link rel="stylesheet" href="gadmin/plugins/jqvmap/jqvmap.min.css">
  
    <link rel="stylesheet" href="gadmin/dist/css/adminlte.min%EF%B9%96v=3.2.0.css">
  
    <link rel="stylesheet" href="gadmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
    <link rel="stylesheet" href="gadmin/plugins/daterangepicker/daterangepicker.css">
  
    <link rel="stylesheet" href="gadmin/plugins/summernote/summernote-bs4.min.css">
  
    <!-- others -->

    <link rel="stylesheet" href="gadmin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="gadmin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
     
    <link rel="stylesheet" href="gadmin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
      href="gadmin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="gadmin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
    <link rel="stylesheet" href="gadmin/dist/css/adminlte.min%EF%B9%96v=3.2.0.css">
    <link rel="stylesheet" href="yolkassets/toastr/toastr.min.css">
    <link rel="stylesheet" href="yolkassets/izimodal/izimodal.min.css">
  
    
  </head>';
}

function adminnav()
{
    session_start();
    // mainchecker('fleetadmin', 'login');
    $adminid = $_SESSION['fleetadmin']['admin_id'];
    $admintype = customfetch('cmd', [['admin_id', '=', $adminid]]);
    $admintype = $admintype[0]['role'];

    if ($admintype == 'superadmin') {
        $admintype = '<li class="nav-item">
        <a href="admins" class="nav-link">
         <i class="nav-icon fas fa-cog"></i>
        <p>
            Admin Settings
           
        </p>
        </a>
        
    </li>';
    }

    echo '<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="glomotadmin" class="brand-link">
      <!--<img src="yolkassets/upload/loo.jpg" alt="Fleet Manager" class="brand-image img-circle elevation-3"
        style="opacity: .8">-->
      <span class="brand-text font-weight-light">Fleet Manager</span>
    </a>

    <div class="sidebar">

      

              <nav class="mt-2">
                      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                      
                      <li class="nav-item">
                          <a href="admin" class="nav-link">
                          
                          <p>
                              Dashboard
                              
                          </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="pits" class="nav-link">
                          <i class="nav-icon fas fa-road"></i> 
                          <p>
                              Pits
                             
                              <span class="badge badge-secondary right" id="ctpits">'.countall('pit').'</span>
                          </p>
                          </a>
                          
                      </li>

                      <li class="nav-item">
                          <a href="trucks" class="nav-link">
                          <i class="nav-icon fas fa-truck"></i> 
                          <p>
                              Trucks
                             
                              <span class="badge badge-secondary right" id="cttrucks">'.countall('trucks').'</span>
                          </p>
                          </a>
                          
                      </li>

                      <li class="nav-item">
                          <a href="trips" class="nav-link">
                          <i class="nav-icon fas fa-map"></i> 
                          <p>
                              Trips
                             
                              <span class="badge badge-secondary right" id="cttrips">'.countall('trips').'</span>
                          </p>
                          </a>
                          
                      </li>

                      <li class="nav-item">
                          <a href="reports" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i> 
                          <p>
                              Report
                             
                             
                          </p>
                          </a>
                          
                      </li>
                      
                      
                      '.$admintype.'



                      <li class="nav-item">
                          <a href="javascript:;" class="nav-link" id="logout">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout
                             
                          </p>
                          </a>
                          
                      </li>
                      <!-- <li class="nav-item">
                          <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Pages
                              <i class="fas fa-angle-left right"></i>
                          </p>
                          </a>
                          <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/examples/invoice.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Invoice</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/profile.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Profile</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/e-commerce.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>E-commerce</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/projects.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Projects</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/project-add.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Project Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/project-edit.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Project Edit</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/project-detail.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Project Detail</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/contacts.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Contacts</p>
                              </a>
                          </li>
                          
                          </ul>
                      </li> -->
                      <!-- <li class="nav-item">
                          <a href="#" class="nav-link">
                          <i class="nav-icon far fa-plus-square"></i>
                          <p>
                              Extras
                              <i class="fas fa-angle-left right"></i>
                          </p>
                          </a>
                          <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>
                                  Login & Register v1
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                              </a>
                              <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="pages/examples/login.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Login v1</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="pages/examples/register.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Register v1</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="pages/examples/forgot-password.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Forgot Password v1</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="pages/examples/recover-password.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Recover Password v1</p>
                                  </a>
                              </li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>
                                  Login & Register v2
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                              </a>
                              <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="pages/examples/login-v2.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Login v2</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="pages/examples/register-v2.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Register v2</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Forgot Password v2</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="pages/examples/recover-password-v2.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Recover Password v2</p>
                                  </a>
                              </li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/lockscreen.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Lockscreen</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Legacy User Menu</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/language-menu.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Language Menu</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/404.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Error 404</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/500.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Error 500</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/pace.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Pace</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/blank.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Blank Page</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="starter.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Starter Page</p>
                              </a>
                          </li>
                          </ul>
                      </li> -->
                      <!-- <li class="nav-item">
                          <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-search"></i>
                          <p>
                              Search
                              <i class="fas fa-angle-left right"></i>
                          </p>
                          </a>
                          <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/search/simple.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Simple Search</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/search/enhanced.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Enhanced</p>
                              </a>
                          </li>
                          </ul>
                      </li> -->
                      
                          
                      
                      
                      </ul>
      </nav>

     
    </div>

  </aside>';
}

function admintail()
{
    echo '<footer class="main-footer">
    <strong>Copyright &copy; 2022 -  '.date('Y').' <a href="">Fleet Manager</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>


<script src="gadmin/plugins/jquery/jquery.min.js"></script>

<script src="gadmin/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge("uibutton", $.ui.button)
</script>

<script src="gadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="gadmin/plugins/select2/js/select2.full.min.js"></script>

<!-- datatables -->
<script src="gadmin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="gadmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="gadmin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="gadmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="gadmin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="gadmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="gadmin/plugins/jszip/jszip.min.js"></script>
<script src="gadmin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="gadmin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="gadmin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="gadmin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="gadmin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Datatables -->
<!--sleect-->


<!-- forms -->

<script src="gadmin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- forms -->
<script src="gadmin/plugins/chart.js/Chart.min.js"></script>

<script src="gadmin/plugins/sparklines/sparkline.js"></script>

<script src="gadmin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="gadmin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="gadmin/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="gadmin/plugins/moment/moment.min.js"></script>
<script src="gadmin/plugins/daterangepicker/daterangepicker.js"></script>

<script src="gadmin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="gadmin/plugins/summernote/summernote-bs4.min.js"></script>

<script src="gadmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="gadmin/dist/js/adminlte.js?v=3.2.0"></script>

<script src="gadmin/dist/js/demo.js"></script>

<script src="gadmin/dist/js/pages/dashboard.js"></script>
'.yolk::uicore('jsa').'
<script src="processor/izimodals.js"></script>
<script src="processor/processor.js"></script>
<script src="yolkassets/toastr/toastr.min.js"></script>
<script src="yolkassets/izimodal/izimodal.min.js"></script>


<!-- others -->


<script>
$(function () {
bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "order": [[0, "desc"]],
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");


    $("#example").DataTable({
      "order": [[0, "asc"]],
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2()

    //Initialize Select2 Elements
    $(".select2bs4").select2({
      theme: "bootstrap4"
    })

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", { "placeholder": "dd/mm/yyyy" })
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", { "placeholder": "mm/dd/yyyy" })
    //Money Euro
    $("[data-mask]").inputmask()

    //Date picker
    $("#reservationdate").datetimepicker({
        format: "L"
    });

    //Date and time picker
    $("#reservationdatetime").datetimepicker({ icons: { time: "far fa-clock" } });

    //Date range picker
    $("#reservation").daterangepicker()
    //Date range picker with time picker
    $("#reservationtime").daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: "MM/DD/YYYY hh:mm A"
      }
    })
    //Date range as a button
    $("#daterange-btn").daterangepicker(
      {
        ranges   : {
          "Today"       : [moment(), moment()],
          "Yesterday"   : [moment().subtract(1, "days"), moment().subtract(1, "days")],
          "Last 7 Days" : [moment().subtract(6, "days"), moment()],
          "Last 30 Days": [moment().subtract(29, "days"), moment()],
          "This Month"  : [moment().startOf("month"), moment().endOf("month")],
          "Last Month"  : [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
        },
        startDate: moment().subtract(29, "days"),
        endDate  : moment()
      },
      function (start, end) {
        $("#reportrange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"))
      }
    )

    //Timepicker
    $("#timepicker").datetimepicker({
      format: "LT"
    })

    //Bootstrap Duallistbox
    $(".duallistbox").bootstrapDualListbox()

    //Colorpicker
    $(".my-colorpicker1").colorpicker()
    //color picker with addon
    $(".my-colorpicker2").colorpicker()

    $(".my-colorpicker2").on("colorpickerChange", function(event) {
      $(".my-colorpicker2 .fa-square").css("color", event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch("state", $(this).prop("checked"));
    })

  })
  // BS-Stepper Init
  document.addEventListener("DOMContentLoaded", function () {
    window.stepper = new Stepper(document.querySelector(".bs-stepper"))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren\'t queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing\'s uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn\'t need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>


</body>

</html>';
}

function admminmini()
{
    echo '<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    
  </ul>

  <ul class="navbar-nav ml-auto">

    

    

    
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    
  </ul>
</nav>';
}

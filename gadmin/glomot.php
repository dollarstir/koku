<?php
involve('core.php');

admintop('Dashboard');

?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="vadmin/dist/img/AdminLTELogo.png" alt="Fleet Manager" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

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
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="index3.html" class="brand-link">
        <img src="vadmin/dist/img/AdminLTELogo.png" alt="Fleet Manager" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Fleet Manager</span>
      </a>

      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <!-- <img src="vadmin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <?php adminnav(); ?>

      </div>

    </aside>

    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            
          </div>
        </div>
      </div>


      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo countall('pit'); ?></h3>
                  <p>Total Pits</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="pits" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo countall('trucks'); ?></h3>
                  <p>Total Trucks</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="trucks" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo countall('trips'); ?></h3>
                  <p>Total Trips</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="trips" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo customcount('trips', [['date_created', '=', date('Y-m-d')]]); ?></h3>
                  <p> Trips Today</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>


          <!-- second -->

          
      </section>

    </div>

    <?php admintail(); ?>
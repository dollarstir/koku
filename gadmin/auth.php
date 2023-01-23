<?php
involve('core.php');
involve('admin.php');
admintop('Report');
$admin = new Admin();
loginpagechecker('fleetadmin', 'admin');
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Fleet </b>Manager</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form class="adminlogin">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script src="gadmin/plugins/jquery/jquery.min.js"></script>
<script src="processor/izimodals.js"></script>
<script src="processor/processor.js"></script>
<script src="yolkassets/toastr/toastr.min.js"></script>
<script src="yolkassets/izimodal/izimodal.min.js"></script>
</body>
</html>

<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<style>
.main-panel {
    width:100%;
    overflow:hidden;
}
.main-panel{
    background-image: url('<?php echo SITE_URL?>/lib/skins/FireCrew3/assets/img/backgroundlogin.jpg');
    background-size: cover;
}
.card-header {
    padding-top:1%;
}
.forgot{
    padding-top: 2.5%;
    padding-bottom: 2.5%;
}
.body {
    background-image:url("<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/img/backgroundlogin.jpg");
}
.card {
    padding-left: 2%;
    padding-right: 2%;
}
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.first-icon, .second-icon{
    visibility: hidden;
}
</style>
<body class="hold-transition login-page">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">FireCrew</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                       <a href="<?php echo SITE_URL ?>/index.php/registration" class="btn">
                            Register Here
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    
    
    <div class="row">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <div class="card">
        <?php
        if(isset($message))
            echo '<div class="alert alert-danger">
            <h4><i class="icon fa fa-exclamation-triangle"></i> Error</h4> '.$message.'</div>';
        ?>

        <div class="login-box-body">
            <div class="card-header">
                <h3 class="card-title">Login</h3>
            </div>

            <form name="loginform" action="<?php echo url('/login');?>" method="post">
                <label>Username</label>
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="form-control-feedback"></span>
                </div>
                <label>Password</label>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <label class="switch">
                        <input type="checkbox" name="remember"><span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-xs-4">
                        <input type="hidden" name="redir" value="index.php/profile" />
                        <input type="hidden" name="action" value="login" />
                        <input type="submit" class="btn btn-fill pull-right" name="submit" value="Lets Go" />
                    </div>
                </div>
            </form>
<br>    <div class="text-center">
            <a href="<?php echo url('login/forgotpassword'); ?>">Forgot my password</a></div>
        </div>
    </div>
    </div>
    </div>
    <footer class="footer footer-transparent">
                <div class="container card col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <div class="copyright">
                        &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.myselfparth.gq/">Parth Parth</a>
                    </div>
                </div>
            </footer>
</body>
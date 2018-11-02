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
                       <a href="<?php echo SITE_URL ?>/index.php/login" class="btn">
                            Login Here
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    
    
    <div class="row text-center">
        <div class="card text-center col-md-4 col-md-offset-4" style="padding-top: 2%;padding-bottom: 2%;">
        <form action="<?php echo url('/login/forgotpassword');?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <input type="hidden" name="action" value="resetpass" />
                        <input class="btn btn-primary pull-right" type="submit" name="submit" value="Submit" />
                    </div>
                </div>
            </form>
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
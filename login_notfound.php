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
<body class="hold-transition login-page" style="background-color: #222222;">
    <div class="">    
        <div class="alert alert-danger">
            <h4><i class="icon fa fa-exclamation-triangle"></i> Error</h4>
            Email was not found in our database. Contact administrator for support.
        </div>
        
        <div class="login-box-body">
            <p class="login-box-msg">Enter your email to request a password reset.</p>

            <form action="<?php echo url('/login/forgotpassword');?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="<?php echo url('/login'); ?>" class="text-center">Back to login</a>
                    </div>
                    <div class="col-xs-4">
                        <input type="hidden" name="action" value="resetpass" />
                        <input class="btn btn-primary btn-block btn-flat" type="submit" name="submit" value="Submit" />
                    </div>
                </div>
            </form>
            
    <footer class="footer footer-transparent">
                <div class="container card">
                    <div class="copyright">
                        &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.myselfparth.gq/">Parth Parth</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>   
</body>
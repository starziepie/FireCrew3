<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<style>
.main-panel{
    width:100%;
}
</style>
<div>
    <nav class="navbar navbar-transparent navbar-absolute">
	    <div class="container">
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav navbar-right">
	                <li>
	                   <a href="<?php echo SITE_URL ?>/index.php/login" class="btn">
	                        Looking to login?
	                    </a>
	                </li>
	            </ul>
	        </div>
	    </div>
	</nav>

	<div class="wrapper wrapper-full-page">
    	<div class="register-page">
		<!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        	<div class="content">
            	<div class="container">
                	<div class="row">
                    	<div class="col-md-8 col-md-offset-2">
                        	<div class="header-text">
                            	<h2><?php echo SITE_NAME ?></h2>
                            	<h4>Register now and get ready for takeoff</h4>
                            	<hr>
                        	</div>
                    	</div>
                    	<div class="col-md-4 col-md-offset-2">
                        	<div class="media"><!--
                            	<div class="media-left">
                                	<div class="icon icon-danger">
                                    	<i class="ti ti-user"></i>
                                	</div>
                            	</div>-->
                            	<div class="media-body">
                                	<h5>Quality #1</h5>
                                	Write 1 thing unique to your VA/VO here.
                            	</div>
                        	</div>
                        	<div class="media"><!--
                            	<div class="media-left">
                                	<div class="icon icon-warning">
                                    	<i class="ti-bar-chart-alt"></i>
                                	</div>
                            	</div>-->
                            	<div class="media-body">
                                	<h5>Quality #2</h5>
                                	Write 1 thing unique to your VA/VO here.
                            	</div>
                        	</div>
                        	<div class="media"><!--
                            	<div class="media-left">
                                	<div class="icon icon-info">
                                    	<i class="ti-headphone"></i>
                                	</div>-->
                            	</div>
                            	<div class="media-body">
                                	<h5>Requirements</h5>
                                	Write your requirements here
                            	</div>
                        	</div>
                    	<div class="col-md-4">
                        	<form method="post" action="<?php echo url('/registration');?>">
                            	<div class="card card-plain">
                                	<div class="content">
                                    	<div class="form-group">
                                        	<input type="text" name="firstname" class="form-control" value="<?php echo Vars::POST('firstname');?>" placeholder="Your First Name">
                                                <?php
                                                if($firstname_error == true)
                                                echo '<p>Please enter your first name</p>';
                                                ?>
                                    	</div>
                                    	<div class="form-group">
                                        	<input type="text" name="lastname" class="form-control" value="<?php echo Vars::POST('lastname');?>" placeholder="Your Last Name">
                                            <?php
                                            if($lastname_error == true)
                                            echo '<p class="error">Please enter your last name</p>';
                                            ?>
                                    	</div>
                                    	<div class="form-group">
                                        	<input type="text" name="email" class="form-control" value="<?php echo Vars::POST('email');?>" placeholder="Enter email">
                                            <?php
                                            if($email_error == true)
                                            echo '<p class="error">Please enter your email address</p>';
                                            ?>
                                    	</div>
                                    	<div class="form-group">
                                        	<input type="password" name="password1" id="password" class="form-control" placeholder="Password">
                                    	</div>
                                    	<div class="form-group">
                                        	<input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                                                <?php
                                                if($password_error == true)
                                                echo '<p class="error">'.$password_error.'</p>';
                                                ?>
                                    	</div>
                                    	<div class="form-group">
                                        	<select name="location" class="form-control">
                                 <?php
                                     foreach($countries as $countryCode=>$countryName)
                                     {
                                     if(Vars::POST('location') == $countryCode)
                                             $sel = 'selected="selected"';
                                     else
                                             $sel = '';
    
                                             echo '<option value="'.$countryCode.'" '.$sel.'>'.$countryName.'</option>';
                                     }
                                 ?>
                             </select>
                             <?php
                                 if($location_error == true)
                                 echo '<p class="error">Please enter your location</p>';
                             ?>
                                    	</div>
                                        <div class="form-group">
                                            <select name="code" id="code" class="form-control">
                         <?php
                         foreach($allairlines as $airline)
                         {
                                 echo '<option value="'.$airline->code.'">'.$airline->code.' - '.$airline->name.'</option>';
                         }
                         ?>
                         </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="hub" id="hub" class="form-control">
                             <?php
                             foreach($allhubs as $hub)
                             {
                                     echo '<option value="'.$hub->icao.'">'.$hub->icao.' - ' . $hub->name .'</option>';
                             }
                             ?>
                     </select>
                                        </div>
                                        <?php
            
                     //Put this in a seperate template. Shows the Custom Fields for registration
                     Template::Show('registration_customfields.tpl');
            
                     ?>
                                        <div class="form-group" style="display: flex;justify-content:  center;">
                                            <?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
                             <div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>"></div>
                             <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
                                        </div>
                                	</div>
                                	<div class="footer text-center">
                                    	<input type="submit" class="btn btn-fill btn-danger btn-wd" name="submit" value="Register!" />
                                	</div>
                            	</div>
                        	</form>
                    	</div>
                	</div>
            	</div>
        	</div>

    		<footer class="footer footer-transparent">
            	<div class="container">
                	<div class="copyright text-center">
                    	&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.myselfpath.gq/">Parth Parth</a>
                	</div>
            	</div>
        	</footer>
		</div>
	</div>
</div>

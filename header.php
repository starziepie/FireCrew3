<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i> <?php echo Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname; ?>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo SITE_URL?>">Dashboard</a></li>
                                <li><a href="<?php echo url('profile/editprofile'); ?>">Edit Profile</a></li>
                                <?php if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN)) { echo '
                                <li><a href=" '.SITE_URL.'/admin">Admin Panel</a></li>
                                '; } ?>
                                <li><a href="<?php echo url('/logout'); ?>">Log Out</a></li>
                              </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

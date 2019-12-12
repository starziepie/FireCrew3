<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper" id="nonav">
            <div class="logo">
                <a href="#" class="simple-text">
                    YOUR_VA_NAME_HERE
                </a>
            </div>

            <ul class="nav"  id="nonav">
                <li>
                    <a href="<?php echo SITE_URL?>">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/schedules/view'); ?>">
                        <i class="ti-search"></i>
                        <p>Schedule Search</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/schedules/bids'); ?>">
                        <i class="ti-align-justify"></i>
                        <p>My Bids</p>
                    </a>
                </li>                               
                <li>
                    <a href="<?php echo url('/pireps/mine'); ?>">
                        <i class="ti-file"></i>
                        <p>My Reports</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/pireps/filepirep'); ?>">
                        <i class="ti-envelope"></i>
                        <p>Manual Pirep</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/downloads'); ?>">
                        <i class="ti-angle-double-down"></i>
                        <p>Downloads</p>
                    </a>
                </li>
                <?php if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN)) { echo '
                    <li>
                        <a href=" '.SITE_URL.'/admin">
                            <i class="fa fa-cog"></i>
                            <p>Admin Panel</p>
                        </a>
                    </li>
                    '; } ?>
            </ul>
        </div>
    </div>

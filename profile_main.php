<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<style>
#container{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.words {
    flex: none;
    width:35%;
}
</style>
<section class="content">
    <div class="row">
        <!-- Profile Container -->
        <section class="col-lg-12 connected card text-center" style="padding:2%;display: flex;align-items: center;">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div id="container">
                        <div class="words">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo SITE_URL?>/lib/skins/FireCrew3/assets/img/pilot.png" alt="User profile picture">
                        </div>
                        <div class="words">
                            <h3 class="profile-username text-center"><?php echo Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname; ?></h3>
                        </div>
                        <div class="words">
                            <h3 class="profile-username text-center"><?php echo $pilotcode; ?></h3>
                        </div>
                        <div class="words">
                            <h3 class="profile-username text-center"><?php echo $userinfo->rank;?></h3>
                        </div>
                        <div class="words">
                            <h3 class="profile-username text-center"><?php if(($userinfo->totalflights)==1){echo $userinfo->totalflights.' flight';}else{echo $userinfo->totalflights.' flights';}?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="col-lg-12 connected card">    
            <div class="block">
        <div class="block-title">
            <?php
                        $lastbids = SchedulesData::GetAllBids();
                        if (count($lastbids) > 0)
                        {
                            $departurestatus = 'Upcoming';
                            $label_clr = 'success';
                        }
                        else {
                            $departurestatus = 'No Departures';
                            $label_clr = 'danger';
                        }
                ?>

                <div class="block-options pull-right" style="padding-right: 10px;">
                    <span class="label label-<?php echo $label_clr ?>"><?php echo $departurestatus?></span>
                </div>
        </div>
        <h3 style="padding-left:10px;padding-right:10px;">Upcoming Departures</h3>
        <div class="table-responsive">
            <!--Remove this line if you dont want the departures box to be on a fixed scale-->
            <div style="overflow: auto; height: 270px; border: 0px solid #666; margin-bottom: 20px; padding: 5px; padding-top: 0px; padding-bottom: 20px;">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                <div align="center">Flight No.</div>
                            </th>
                            <th>
                                <div align="center">Pilot</div>
                            </th>
                            <th>
                                <div align="center">Slot added on</div>
                            </th>
                            <th>
                                <div align="center">Slot Expires on</div>
                            </th>
                            <th>
                                <div align="center">Departure</div>
                            </th>
                            <th>
                                <div align="center">Arrival</div>
                            </th>
                            <th>
                                <div align="center">Registration</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lastbids = SchedulesData::GetAllBids();
                        if (count($lastbids) > 0)
                        { ?>
                            <?php
                            foreach($lastbids as $lastbid)
                            {
                            ?>
                                <?php
                            $flightid = $lastbid->id
                            ?>
                                    <td height="25" width="10%" align="center"><font face="Bauhaus"><span><?php echo $lastbid->code; ?><?php echo $lastbid->flightnum; ?></span></font></td>
                                    <?php
                            $params = $lastbid->pilotid;

                            $pilot = PilotData::GetPilotData($params);
                            $pname = $pilot->firstname;
                            $psurname = $pilot->lastname;
                            $now = strtotime(date('d-m-Y',strtotime($lastbid->dateadded)));
                            $date = date("d-m-Y", strtotime('+48 hours', $now));

                            ?>
                                        <td height="25" width="10%" align="center"><span><?php echo $pname; ?> <?php echo $psurname; ?></span></td>
                                        <td height="25" width="10%" align="center"><span class="text-success"><?php echo date('d-m-Y',strtotime($lastbid->dateadded)); ?></span></td>
                                        <td height="25" width="10%" align="center"><span class="text-danger"><?php echo $date; ?></span></td>
                                        <td height="25" width="10%" align="center"><span><font face=""><?php echo $lastbid->depicao?></font></span></td>
                                        <td height="25" width="10%" align="center"><span><font face=""><?php echo $lastbid->arricao?></font></span></td>
                                        <td height="25" width="10%" align="center"><span><?php echo $lastbid->registration; ?></a></td>
                            </tr>
                            <?php
                            }
                            } else { ?>

                            <div class="alert alert-danger">
                                <strong>Oops</strong><br>
                                Looks like there are no upcoming departures at the moment, do you feel like flying? Click <a href="<?php echo SITE_URL?>/index.php/Schedules">here</a> to bid a flight! #FireCrew
                            </div>

                            <?php
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </section>

        <div class="col-lg-9 connected card">

            <!-- ALERT BAR >> UNCOMMENT TO DISPLAY ALERT TO ALL USERS ON DASHBOARD -->

            <!--

            <div class="callout callout-danger">
                <h4>Important Alert</h4>
                <p>This is an alert. Customise this text and uncomment to display the alert.</p>
            </div>

            -->
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="padding-left:10px;padding-right:10px;">Live Flights</h3>
                </div>
                <div class="box-body">
                    <?php require 'acarsmap.php' ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 connected card" style="margin-left:3%;width: 22%;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="padding-left:10px;padding-right:10px;">Latest News</h3>
                </div>
                <div class="box-body">
                    <?php MainController::Run('News', 'ShowNewsFront', 1); ?>
                </div>
            </div>
        </div>
</section>
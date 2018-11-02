<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content">
    <div class="row">
        <section class="col-lg-12">
            <div class="">
                <?php if(!$allroutes) { ?>    
                <div class="">
                    <div class="callout callout-info">
                        <h4>No Results</h4>
                        Your search returned no results.
                    </div>
                </div>
                <?php } else { ?>
                <div class="table-responsive no-padding">
                    <table id="tabledlist" class="tablesorter table table-hover">
                        <thead>
                            <tr>
                                <th>Flight Information</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($allroutes as $route)
                        {
                            $route->daysofweek = str_replace('7', '0', $route->daysofweek);
                            if(strpos($route->daysofweek, date('w')) === false)
                                continue;
                            if(Config::Get('RESTRICT_AIRCRAFT_RANKS') === true && Auth::LoggedIn())
                            {
                                if($route->aircraftlevel > Auth::$userinfo->ranklevel)
                                {
                                    continue;
                                }
                            }
                            /* THIS BEGINS ONE TABLE ROW */
                        ?>
                        <tr class="card" style="margin-top:5px;margin-bottom:5px;">
                            <td>
                                <a href="<?php echo url('/schedules/details/'.$route->id);?>">
                                    <?php echo $route->code.' '.$route->flightnum.' '.$route->depicao.' - '.$route->arricao; ?>
                                </a>
                                <br />
                                <strong>Departure: </strong>
                                    <?php echo $route->deptime;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Arrival: </strong>
                                    <?php echo $route->arrtime;?>
                                <br />
                               <strong>Equipment: </strong>
                                    <?php echo $route->aircraft; ?> (
                                    <?php echo $route->registration;?>) <strong>Distance: </strong>
                                    <?php echo $route->distance . Config::Get('UNITS');?>
                               <br />
                               <strong>Days Flown: </strong>
                                    <?php echo Util::GetDaysCompact($route->daysofweek); ?>
                               <br />
                                <?php echo ($route->route=='') ? '' : '<strong>Route: </strong>'.$route->route.'<br />' ?>
                                <?php echo ($route->notes=='') ? '' : '<strong>Notes: </strong>'.html_entity_decode($route->notes).'<br />' ?>
                                <?php # Note: this will only show if the above code to skip the schedule is commented out ?>
                                <?php if($route->bidid != 0) { echo 'This route has been bid on'; } ?>
                            </td>
                            <td nowrap>
                                <a href="<?php echo url('/schedules/details/'.$route->id);?>" target="_blank">View Details</a>
                                <br />
                                <a href="<?php echo url('/schedules/brief/'.$route->id);?>" target="_blank">Pilot Brief</a>
                                <br />

                            <?php
                            # Don't allow overlapping bids and a bid exists
                            if(Config::Get('DISABLE_SCHED_ON_BID') == true && $route->bidid != 0) {
                                echo '<a id="'.$route->id.'" class="addbid" href="'.actionurl('/schedules/addbid').'">Add to Bid</a>';
                            } else {
                                if(Auth::LoggedIn()) {
                                    echo '<a id="'.$route->id.'" class="addbid" href="'.url('/schedules/addbid').'">Add to Bid</a>';
                                }
                            }
                            ?>  
                        </td>
                    </tr>
                    <?php
                     /* END OF ONE TABLE ROW */
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <?php } ?>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.Second col -->
</div>
<!-- /.row (main row) -->
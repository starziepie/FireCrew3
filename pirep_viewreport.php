<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="card text-center" style="padding-top:2%;padding-bottom:2%;">
    <h1><?php echo $pirep->code . $pirep->flightnum; ?> - Flight Report</h1>
</section>

<section class="content">
    <div class="row">
        <section class="col-lg-12 connected">
            <div class="card">
                <div >

                    <h3 class="text-center">Flight <?php echo $pirep->code . $pirep->flightnum; ?></h3>

                    <p class="text-muted text-center">Submitted by <?php echo $pirep->firstname.' '.$pirep->lastname?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Departure Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->depname?> (<?php echo $pirep->depicao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Arrival Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->arrname?> (<?php echo $pirep->arricao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Aircraft</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->aircraft . " ($pirep->registration)"?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Flight Time</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->flighttime; ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Date Submitted</b> <p class="pull-right" style="color: #3C8DBC"><?php echo date(DATE_FORMAT, $pirep->submitdate);?></p>
                        </li>
                        <?php
                            if($pirep->route != '')
                            {
                                echo '<li class="list-group-item"><b>Route</b> <p class="pull-right" style="color: #3C8DBC">'.$pirep->route.'</p></li>';
                            }
                        ?>
                        <li class="list-group-item"><b>Status</b>
                            <?php
                                if($pirep->accepted == PIREP_ACCEPTED)
                                    echo '<div class="label label-success pull-right">Accepted</div>';
                                elseif($pirep->accepted == PIREP_REJECTED)
                                    echo '<div class="label label-danger pull-right">Rejected</div>';
                                elseif($pirep->accepted == PIREP_PENDING)
                                    echo '<div class="label label-info pull-right">Approval Pending</div>';
                                elseif($pirep->accepted == PIREP_INPROGRESS)
                                    echo '<div class="label label-warning pull-right">Flight in Progress</div>';
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="text-center">
                    <h3>Flight Details</h3>
                    <p class="text-muted text-center"><?php echo $pirep->code . $pirep->flightnum; ?></p>
                </div>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Gross Revenue</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->load * $pirep->price);?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Fuel Cost</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost);?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Landing Rate</b> <p class="pull-right" style="color: #3C8DBC"><?php if($pirep->landingrate == "0")
 {
   echo 'Manual';
 }
else
 {
  echo '-'.$pirep->landingrate.' fpm';
 }?></p>
                        </li>
                    </ul>
            </div>
            <div class="card">
                <div class="text-center">
                    <h3 >Flight Analysis</h3>
                    <p class="text-muted text-center"><?php echo $pirep->code . $pirep->flightnum; ?></p>
                </div>
                <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Landing Smoothness</b> <p class="pull-right" style="color: #3C8DBC"><?php $lr=$pirep->landingrate;
                            if($lr==0)
                                {echo 'Manual Pirep';}
                            if($lr!=0 && $lr>0 && $lr<=150)
                                {echo 'Smooth landing! You buttered it! Good job!';}
                            if($lr!=0 && $lr>150 && $lr<=450)
                                {echo 'Great Landing! Try to be a bit more accurate!';}
                            if($lr!=0 && $lr>450 && $lr<=700)
                                {echo 'The landing rate is high! Please be more accurate';}
                            if($lr!=0 && $lr>700 && $lr>700)
                                {echo 'Uh oh captain, you damaged the plane! Back to the books!';}
                            ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Economic Efficiency</b> <p class="pull-right" style="color: #3C8DBC"><?php $cost=FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost); $revenue=FinanceData::FormatMoney($pirep->load * $pirep->price);
                            if($cost!=0)
                                {$percent=$revenue/$cost*100;echo $percent.'%';}
                            else
                                {echo '0%';}
                            ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Flight Rating</b> <p class="pull-right" style="color: #3C8DBC"><?php $cost=FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost); $revenue=FinanceData::FormatMoney($pirep->load * $pirep->price);
                            if($cost!=0)
                                {$percent=$revenue/$cost*100;}
                            else
                                {$percent=0;}
                            if($percent>=0 && $percent<20)
                                {echo '<i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i>';}
                            else if($percent>21 && $percent<40)
                                {echo '<i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i>';}
                            else if($percent>41 && $percent<60)
                                {echo '<i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i>';}
                            else if($percent>61 && $percent<80)
                                {echo '<i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star-o" style="color:gold;"></i>';}
                            else if($percent>81 && $percent<100)
                                {echo '<i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i><i class="fa fa-star" style="color:gold;"></i>';}
                            ?>
                                </p>
                        </li>
                </ul>
            </div>
            <div class="card">
                <div class="text-center">
                    <h3 >Flight Log</h3>
                    <p class="text-muted text-center"><?php echo $pirep->code . $pirep->flightnum; ?></p>
                </div>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <p>
<?php
if($pirep->log != '')
{
?>
<p>
    <?php
    /* If it's FSFK, don't show the toggle. We want all the details and pretty
        images showing up by default */
    if($pirep->source != 'fsfk')
    {
        ?>
    <p id="log" style="display: none;">
    <?php
    }
    else
    {
        echo '<p>';
    }
    ?>
        <div>
        <?php
        # Simple, each line of the log ends with *
        # Just explode and loop.
        $log = explode('*', $pirep->log);
        foreach($log as $line)
        {
            echo $line .'<br />';
        }
        ?>
        </div>
    </p>
</p>
<?php
}
?>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="text-center">
                    <h3 >Comments</h3>
                    <p class="text-muted text-center"><?php echo $pirep->code . $pirep->flightnum; ?></p>
                </div>
                <ul class="list-group list-group-unbordered">
                    <?php
if($comments)
{
foreach($comments as $comment)
{
?>  <div style="padding-left:2%;padding-right: 2%;">
    <br>
    <b><?php echo $comment->firstname . ' ' .$comment->lastname?></b>
    <p class="pull-right" style="color: #3C8DBC"><?php echo $comment->comment?></p><br>
</div>
<?php
}
}
?>
                </ul>
            </div>
        </section>
    </div>
</section>
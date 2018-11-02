<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <p><?php if(isset($descrip)) { echo $descrip; }?></p>
                    
                    <?php
                        if(!$pireps)
                        {
                            echo '<div class="callout callout-info">
                        <h4>No Reports Found</h4>
                        <p>You have not filed any reports. File one through the ACARS software or manual report submission to see its details and status on this page.</p>
                    </div>';
                        } else {
                    ?>
                    <table id="tabledlist" class="tablesorter table table-hover">
                        <thead>
                            <tr>
                                <center>
                                    <th>Flight Number</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Aircraft</th>
                                    <th>Flight Time</th>
                                    <th>Submitted</th>
                                    <th>Status</th>
                                    <?php
                                        // Only show this column if they're logged in, and the pilot viewing is the
                                        //	owner/submitter of the PIREPs
                                        if(Auth::LoggedIn() && Auth::$userinfo->pilotid == $userinfo->pilotid)
                                        {
                                            echo '<th>Options</th>';
                                        }
                                    ?>
                                </center>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($pireps as $report)
                                {
                            ?>
                            <tr class="card">
                                <td align="center">
                                    <a href="<?php echo url('/pireps/view/'.$report->pirepid);?>"><?php echo $report->code . $report->flightnum; ?></a>
                                </td>
                                <td align="center">
                                    <?php echo $report->depicao; ?>
                                </td>
                                <td align="center">
                                    <?php echo $report->arricao; ?>
                                </td>
                                <td align="center">
                                    <?php echo $report->aircraft . " ($report->registration)"; ?>
                                </td>
                                <td align="center">
                                    <?php echo $report->flighttime; ?>
                                </td>
                                <td align="center">
                                    <?php echo date(DATE_FORMAT, $report->submitdate); ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if($report->accepted == PIREP_ACCEPTED)
                                        echo '<div id="success" class="label label-success">Accepted</div>';
                                    elseif($report->accepted == PIREP_REJECTED)
                                        echo '<div id="error" class="label label-danger">Rejected</div>';
                                    elseif($report->accepted == PIREP_PENDING)
                                        echo '<div id="error" class="label label-info">Approval Pending</div>';
                                    elseif($report->accepted == PIREP_INPROGRESS)
                                        echo '<div id="error" class="label label-warning">Flight in Progress</div>';
                                    ?>
                                </td>
                                <?php
                                // Only show this column if they're logged in, and the pilot viewing is the
                                //	owner/submitter of the PIREPs
                                if(Auth::LoggedIn() && Auth::$userinfo->pilotid == $report->pilotid)
                                {
                                    ?>
                                <td align="right">
                                    <a href="<?php echo url('/pireps/addcomment?id='.$report->pirepid);?>">Add Comment</a>
                                    <span> <br> </span>
                                    <a href="<?php echo url('/pireps/editpirep?id='.$report->pirepid);?>">Edit PIREP</a>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
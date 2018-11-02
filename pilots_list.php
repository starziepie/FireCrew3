<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<?php
if(!$pilot_list) {
	echo '<div class="col-md-12 card" style="padding-top:5%;padding-bottom:5%;">
		<h4>No Pilots Found</h4>
		<p>This may be an error, contact our staff for more info.</p>
	</div>';
	return;
}
?>
<div class="row">
    	<div class="col-md-12 connected">
            <table id="tabledlist" class="table card">
                <thead>
                    <tr>
                        <th>Pilot ID</th>
                        <th>Name</th>
                        <th>Rank</th>
                        <th>Flights</th>
                        <th>Hours</th>
                        <th>Hub</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($pilot_list as $pilot)
                {
                ?>
                <tr>
                    <td width="1%" nowrap><a href="<?php echo url('/profile/view/'.$pilot->pilotid);?>">
                            <?php echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid)?></a>
                    </td>
                    <td>
                        <img src="<?php echo Countries::getCountryImage($pilot->location);?>" 
                            alt="<?php echo Countries::getCountryName($pilot->location);?>" />
                            
                        <?php echo $pilot->firstname.' '.$pilot->lastname?>
                    </td>
                    <td><img src="<?php echo $pilot->rankimage?>" alt="<?php echo $pilot->rank;?>" /></td>
                    <td><?php echo $pilot->totalflights?></td>
                    <td><?php echo Util::AddTime($pilot->totalhours, $pilot->transferhours); ?></td>
                    <td><?php echo $pilot->hub; ?></td>
                    <td>
                    <?php
					if($pilot->retired == 0) {
						echo '<span class="label label-success">Active</span>';
					} elseif($pilot->retired == 1) {
						echo '<span class="label label-danger">Inactive</span>';
					} else {
						echo '<span class="label label-primary">On Leave</span>';
					}
					?>
                    </td>
                <?php
                }
                ?>
            </tr>
                </tbody>
            </table>
         </div>
</div>
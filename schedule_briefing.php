<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="card" style="padding:2%;">
<h3>Flight Briefing</h3>
<script src="http://skyvector.com/linkchart.js"></script>
<table width="98%" align="center" cellpadding="4" class="card" style="padding:2%;">
	<!-- Flight ID -->
	<tr style="background-color: #333; color: #FFF;">
		<td colspan="2">Flight</td>
	</tr>
	<tr>
		<td colspan="2">
		<?php echo $schedule->code.$schedule->flightnum; ?>
		</td>
	</tr>
	
	<tr  style="background-color: #333; color: #FFF;">
		<td>Departure</td>
		<td>Arrival</td>
	</tr>
	
	<tr>
		<td width="50%" ><?php echo "{$schedule->depname} ($schedule->depicao)"; ?><br />
			<a href="http://api.vateud.net/notams/<?php echo $schedule->depicao; ?>" target="_blank">Click to view <?php echo $schedule->depicao; ?> NOTAMS</a>
		</td>
		<td width="50%" ><?php echo "{$schedule->arrname} ($schedule->arricao)"; ?><br />
			<a href="http://api.vateud.net/notams/<?php echo $schedule->arricao; ?>" target="_blank">Click to view <?php echo $schedule->arricao; ?> NOTAMS</a>
		</td>
	</tr>
	
	<!-- Times Row -->
	<tr style="background-color: #333; color: #FFF;">
		<td>Departure Time</td>
		<td>Arrival Time</td>
	</tr>
	<tr>
		<td width="50%"><?php echo "{$schedule->deptime}"; ?></td>
		<td width="50%"><?php echo "{$schedule->arrtime}"; ?></td>
	</tr>
	
	<!-- Aircraft and Distance Row -->
	<tr style="background-color: #333; color: #FFF;">
		<td>Aircraft</td>
		<td>Distance</td>
	</tr>
	<tr>
		<td width="50%" ><?php echo "{$schedule->aircraft}"; ?></td>
		<td width="50%" ><?php echo "{$schedule->distance}"; ?>nm</td>
	</tr>
	
	<tr style="background-color: #333; color: #FFF;">
		<td>Departure METAR</td>
		<td>Arrival METAR</td>
	</tr>
	<tr>
		<td width="50%">
		<?php
        $metar = $_POST['metar'];
        $url = 'http://metar.vatsim.net/'.$schedule->depicao.'';
        $page = file_get_contents($url);
        echo $page;
        ?>       
		</td>
		<td width="50%">
		<?php
        $metar = $_POST['metar'];
        $url = 'http://metar.vatsim.net/'.$schedule->arricao.'';
        $page = file_get_contents($url);
        echo $page;
        ?>
        </td>
	</tr>
	
	<!-- Route -->
	<tr style="background-color: #333; color: #FFF;">
		<td colspan="2">Route</td>
	</tr>
	<tr>
		<td colspan="2">
		<?php 
		# If it's empty, insert some blank lines
		if($schedule->route == '')
		{
			echo '<br /> <br /> <br />';
		}
		else
		{
			echo strtoupper($schedule->route); 
		}
		?>
		</td>
	</tr>
	
	<!-- Notes -->
	<tr style="background-color: #333; color: #FFF;">
		<td colspan="2">Notes</td>
	</tr>
	<tr>
		<td colspan="2" style="padding: 6px;">
		<?php 
			# If it's empty, insert some blank lines
			if($schedule->notes == '')
			{
				echo '<br /> <br /> <br />';
			}
			else
			{
				echo "{$schedule->notes}"; 
			}
		?>
		</td>
	</tr>
	
	
</table>

<table width="98%" align="center" padding="2">
<tr style="background-color: #333; color: #FFF; padding: 5px;">
	<td>Additional Data</td>
</tr>
<tr>
	<td><a href="http://flightaware.com/analysis/route.rvt?origin=<?php echo $schedule->depicao?>&destination=<?php echo $schedule->arricao?>">View recent IFR Routes data</a></td>
</tr>
</table>
</div>
<div class="card" style="padding:2%;">
<h3>Procedures and Information</h3>
<table width="98%" align="center">

	<tr style="background-color: #333; color: #FFF;">
		<td>Charts for <?php echo $schedule->depicao?></td>
		<td>Charts for <?php echo $schedule->arricao?></td>
	</tr>
	<tr align="center">
		<td width="50%" valign="top">
		<?php
        MainController::Run('Aircharts', 'charts', $schedule->depicao);
        ?>
		</td>
		<td width="50%" valign="top">
		<?php
		MainController::Run('Aircharts', 'charts', $schedule->arricao);
		?>
		</td>
	
	</tr>
</table>
</div>
<br />
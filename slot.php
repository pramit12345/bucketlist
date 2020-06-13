<!DOCTYPE html>
<html>
<head>
	<title>Time Slot</title>
	<style type="text/css">
		.forday{
			background: violet	;
			width: 20vw;
			margin-top: 8vw;
			margin-left: 38vw;
			padding: 2vw;
			height: 10vw;

		}
		.time{
			margin-top: 2vw;
		}

	</style>
</head>
<body>
<?php 
date_default_timezone_set("Asia/Kathmandu");
?>

<form style="text-align: center;" method="POST" action="slot.php">
<h2>	Select your Suitable Collection Slot </h2>
<h5> Notice: Slot timings are available only after 24 hours.</h5>
<div class="forday">
<label> Select Day </label>
<select name="day" >
	

	<?php

	// Prints the day
$today= date("l"); 
$time=date("H"); //the current time in 24 hr format

	if ($today=='Friday') { //if purchase day is friday, then all days & slots for next week is open
	echo"<option value='nxtwed'>Next Wednesday</option>";
	echo "<option value='nxtthu'>Next Thursday</option>";
	echo "<option value='nxtfri'>Next Friday</option>";
	}
	elseif ($today=='Thursday' && $time>=19 ) //if purchase day is thursday & time is 7pm or late then all days & slots for next week is open
	{
	echo"<option value='nxtwed'>Next Wednesday</option>";
	echo "<option value='nxtthu'>Next Thursday</option>";
	echo "<option value='nxtfri'>Next Friday</option>";
	}
	elseif ($today=='Thursday' && $time<19 ) //if purchase day is thursday & time is earlier than 7pm then
	{
	echo"<option value='nxtwed'>Next Wednesday</option>";	
	echo "<option value='nxtthu'>Next Thurday</option>";
	echo "<option value='fri'> Friday</option>";			//friday's one slot is open
	}
	elseif($today=='Wednesday' && ($time>=19)) //if purchase day is wednesday and time is 7pm or late 
	{
		echo"<option value='nxtwed'>Next Wednesday</option>";
	echo "<option value='nxtthu'>Next Thursday</option>";
	echo "<option value='fri'>Friday</option>";	//only Friday's all slot are open
	}
	elseif ($today=='Wednesday' && $time<19) {	//if purchase day is wednesday and time is earlier than 7pm
	echo"<option value='nxtwed'>Next Wednesday</option>";
	echo "<option value='thu'> Thursday</option>"; //selected thursday's slots are open
	echo "<option value='fri'>Friday</option>"; //Friday's all slots are open
	}
		elseif($today=='Tuesday' && $time>=19) //if purchase day is tuesday and time is 7pm or late 
	{
	echo"<option value='nxtwed'>Next Wednesday</option>"; 
	echo "<option value='thu'>Thursday</option>";	//All slots for thursday and friday along with next wednesday is open
	echo "<option value='fri'>Friday</option>";
	}
	elseif($today=='Tuesday' && $time<19) //if purchase day is tuesday and time is earlier than 7pm
	{
	echo"<option value='wed'> Wednesday</option>"; //all slots for following 3 days are open
	echo "<option value='thu'>Thursday</option>";
	echo "<option value='fri'>Friday</option>";
	}
	else
	{
	echo"<option value='wed'> Wednesday</option>"; //else, if purachase day if on any other day, upcoming wed, thursday and fri are slots are open
	echo "<option value='thu'>Thursday</option>";
	echo "<option value='fri'>Friday</option>";
	}

?>
</div>

</select> <br> 
<div class="time">
<input type="submit" name="submit" value="Select Time Slot">
</div>
<br>

	


</select>

</form>

</body>
</html>

<?php



 if (isset($_POST['submit'])  ) {
	echo '<form style="text-align: center;" >';

	$dayselected=$_POST['day'];
	

 echo "<label> Select Time </label>";
 echo '<select name="hour">';
	$time=date("H");

	echo $time;
		if ($today=='Friday') { //if purchase day is friday, then all days & slots for next week is open
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>";
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
		}//inside friday
		elseif ($today=='Tuesday' ) { 
			if ($time>=19) {	//if purchase day is tuesday and time is 7pm or late 
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //all slots for thurday, friday and next wednesday is open
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif($time<10) //if purchase day is tuesday and time is 10am or earlier
			{
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //all slots for upcoming next are open
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif (($time>=13 || $time<=15) && $dayselected=='wed') {
			echo"<option disabled value='10AM to 1PM'> 10AM to 1PM </option>"; //if purchase day is tuesday and time is between 1pm to 3pm and 																				
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";				////Collection day is Wednesday, the first slot is unavailable
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif (($time>=16|| $time<=18) && $dayselected=='wed') { 
			echo"<option disabled value='10AM to 1PM'> 10AM to 1PM </option>"; //if purchase day is tuesday and time is between 4pm to 6pm and 
			echo "<option disabled value='1PM to 4PM'>1PM to 4PM</option>";	////Collection day is Wednesday,only the last slot is available
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			else{
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
				
		}//inside tuesday
		elseif ($today=='Wednesday' ) { 
			if ($time>=19) {
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //if purchase day is wednesday and time is 7pm or late 
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";	//all slots from friday and upcoming wed and thursday is free
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif($time<10)
			{
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>";	//if purchase day is wednesday and time is 10am or earlier 
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";		////all slots are open
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif (($time>=13 || $time<=15) && $dayselected=='thu') {
			echo"<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";	//if purchase day is wednesday and time is between 1pm to 3pm and Collection day
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";				//thursday, only the first slot is unavailable
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif (($time>=16|| $time<=18) && $dayselected=='thu') {
			echo"<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";	//if purchase day is wednesday and time is between 4pm to 6pm and Collection day
			echo "<option disabled value='1PM to 4PM'>1PM to 4PM</option>";		//thursday the last slot is available
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			else{
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //else all slots for any days selected is free
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}

		}//inside wednesday
		elseif ($today=='Thursday') {
			if ($time>=19) {
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //if purchase day is thursday and time is 7pm or late 
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";		//all slots for next days are open
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif($time<10)
			{
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //if purchase day is thursday and time is 10am or earlier 
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";		//all slots are open
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif (($time>=13 || $time<=15) && $dayselected=='fri') {
			echo"<option disabled value='10AM to 1PM'> 10AM to 1PM </option>"; //if purchase day is thursday and time is between 1pm to 3pm and Collection day
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";				//is friday then only the first slot is unavailable
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			elseif (($time>=16|| $time<=18) && $dayselected=='fri') { 
			echo"<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";//if purchase day is thursday and time is between 4pm to 6pm and Collection day
			echo "<option disabled value='1PM to 4PM'>1PM to 4PM</option>";		//is friday, only the last slot is available
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}
			else{
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>"; //else all slots for any days selected is free
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
			}

		}//thursday
		else
		{
			echo"<option value='10AM to 1PM'> 10AM to 1PM </option>";
			echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
			echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
		}
			
			}//if submit is pressed



echo "</form>";




?>
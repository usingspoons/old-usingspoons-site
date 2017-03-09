<html>
<body>

<?php
//Open database connection
$db = mysql_connect("213.171.218.240", "lmarston", "fishes");
//Select appropriate database
mysql_select_db("calendar",$db);
//Fetch data from the events table in the database

/*if($id)
{
	$result = mysql_query("SELECT events.event_name, events.event_type, 
	events.event_date, events.event_start_time, locations.loc_name
	FROM events, locations WHERE id=$id AND events.loc_id = locations.loc_id",$db);
	$myrow = mysql_fetch_array($result);
	echo ("Event name: %s\n<br>", $myrow["event_name"]);
	echo ("Event Type: %s\n<br>", $myrow["event_type"]);
	echo ("Date: %s\n<br>", $myrow["event_date"]);
	echo ("Time: %s\n<br>", $myrow["event_start_time"]);
	echo ("Location: %s\n<br>", $myrow["loc_name"]);
}
else
{*/
	//show list of events
	$result = mysql_query("SELECT events.event_name, events.event_type, 
	events.event_date, events.event_start_time, locations.loc_name
	FROM events, locations WHERE events.loc_id = locations.loc_id",$db);

//Iterate through results and display them in a table using myrow as counter
	if ($myrow = mysql_fetch_array($result)) //Display results if there are any
	{
//Table header
		echo "<table border=1>\n";
		echo "<tr><td>Event Name</td><td>Event Type</td><td>Date</td>
		<td>Time</td><td>Location</td></tr>\n";
//Display for
		do
		{
			printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
			$myrow["event_name"], $myrow["event_type"], $myrow["event_date"], 
			$myrow["event_start_time"], $myrow["loc_name"]);
		}
		while ($myrow = mysql_fetch_array($result));
		{
			echo "</table>\n";
		}
	}
	else //10Jan - Executing this because (presumably) SELECT statement is flawed
	{
		echo "Sorry, no records were found!"; 
	}
//}
?>
</body>
</html>
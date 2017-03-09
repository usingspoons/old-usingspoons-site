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
	$result = mysql_query("SELECT loc_id, loc_name, 
	loc_address FROM locations WHERE loc_id=$id, $db);
	$myrow = mysql_fetch_array($result);
	echo ("Location ID: %s\n<br>", $myrow["loc_id"]);
	echo ("Name: %s\n<br>", $myrow["loc_name"]);
	echo ("Address: %s\n<br>", $myrow["loc_address"]);
}
else
{*/
	//show list of events
	$result = mysql_query("SELECT loc_id, loc_name, 
	loc_address, FROM locations",$db);

//Iterate through results and display them in a table using myrow as counter
	if ($myrow = mysql_fetch_array($result)) //Display results if there are any
	{
//Table header
		echo "<table border=1>\n";
		echo "<tr><td>Location ID</td><td>Name</td><td>Address</td></tr>\n";
//Display for
		do
		{
			printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
			$myrow["loc_id"], $myrow["loc_name"], $myrow["loc_address"]);
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
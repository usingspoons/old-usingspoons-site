<html>
<head>
<title>Events Database - Add New Event</title>
</head>
<body>
<?php
if(isset($_POST['add']))
{
	$event_name = $_POST['event_name'];
	$event_desc = $_POST['event_desc'];
	$event_type = $_POST['event_type'];
	$event_date = $_POST['event_date'];
	$event_start_time = $_POST['event_start_time'];
	$event_end_time = $_POST['event_end_time'];
	$event_price = $_POST['event_price'];
	$db="calendar";
	$link = mysql_connect("213.171.218.240","lmarston","fishes");
	if(!$link)
		die("Couldn't connect to MySQL");
	mysql_select_db($db, $link)
		or die("Couldn't open $db: ".mysql_error());
	$query="INSERT INTO events (event_name, event_desc, event_type, event_date, 
		event_start_time, event_end_time, event_price) 
		VALUES ('$event_name','$event_desc','$event_type','$event_date',
		'$event_start_time','$event_end_time','$event_price')";
	mysql_query($query) or die ('Error, insert query failed');
	//$query = "FLUSH PRIVILEGES";
	//mysql_query($query) or die ('Error, insert query failed');
	mysql_close($link);
	
	echo"New Event added\n";
	echo"<a href=\"add_event.php\">Add another new event</a>";
}
else
{
?>

<form method="post">
<table>
<tr>
<td>Event Name</td>
<td><input name="event_name" type="text" id="event_name"></td>
</tr>
<tr>
<td>Event Description</td>
<td><input name="event_desc" type="text" size="255" id="event_desc"></td>
</tr>
<tr>
<td>Event Type</td>
<td><input name="event_type" type="text" id="event_type"></td>
</tr>
<tr>
<td>Date of Event (yyyy-mm-dd)</td>
<td><input name="event_date" type="text" id="event_date"></td>
</tr>
<tr>
<td>Time of Event (hh:mm)</td>
<td><input name="event_start_time" type="text" id="event_start_time"></td>
</tr>
<tr>
<td>End time of event (optional)</td>
<td><input name="event_end_time" type="text" id="event_end_time"></td>
</tr>
<tr>
<td>Price of admission (00.00)</td>
<td><input name="event_price" type="text" id="event_price"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="add" type="submit" id="add" value="Add New Event"></td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>
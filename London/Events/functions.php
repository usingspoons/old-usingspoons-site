<?php

function fetchEvents($month, $year)
{
//Open connection to mysql database
	$link = mysql_connect('213.171.218.240', 'lmarston', 'fishes')
	 or die('Could not connect: '.mysql_error());
	echo 'Connected successfully';
//Select database on server
	mysql_select_db('calendar') or die('Could not select database');
//Perform query
	$query = 'SELECT * FROM -table-';
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
}


function showMonth($month, $year)
{
//Gives Unix timestamp at 12:00 on the 1st of the current month
	$date = mktime(12,0,0,$month,1,$year);
//Returns the number of days in the month for the timestamp in $date
	$daysinMonth = date("t", $date);
//Calculate the position of the first day (Sunday = 1st column)
	$offset = date("w", $date);
//Initialise variable to keep track of rows in calendar
	$rows = 1;

	echo"<h1>Displaying calendar for ".date("F Y", $date)."</h1>\n";
	echo"<table id=\"calendar\" cellspacing=\"0\">\n";
	echo
	"\t<tr id=\"days\"><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>";
//Start date rows
	echo"\n\t<tr>";
//Fill in blank cells before the first day - using the offset variable
	for($i=1; $i<= $offset; $i++)
	{
		echo"<td class=\"blank\"></td>";
	}
//Populate date cells with numbers up until daysinMonth value
	for($day=1; $day <= $daysinMonth; $day++)
	{
		if(($day + $offset - 1) %7 == 0 && $day != 1) //Check for new row
		{
			echo"</tr>\n\t<tr>";
			$rows++;
		}
		echo"<td><div class=\"date\">".$day."</div></td>";
		//Need to add an event text in here
	}
//Pad the extra blank cells in the last row
	while(($day + $offset) <= $rows *7)
	{
		echo"<td class=\"blank\"></td>";
		$day++;
	}
//Close the table and finish off tags
	echo"</tr>\n";
	echo"</table>\n";
}
?>
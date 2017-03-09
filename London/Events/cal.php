<html>
<head>
<title>An Events Calendar</title>
<style type="text/css">
table#calendar{}
table#calendar tr#days{font-weight: bold; color: #ccccff;
						background: #330099;}
table#calendar td {color: #330099; border: 1px solid gray;
					border-color: #bbb #eee #eee #bbb;} 
table#calendar td.blank {background-color: #ccc;}
</style>
</head>
<body>
<h1>Here is an events calendar</h1>
<?
	include("functions.php");
	showMonth(1,2006);
?>
<p>That was a calendar!</p>
</body>
</html>
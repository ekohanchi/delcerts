<html>
<head>
<META NAME="ROBOTS" CONTENT="NOINDEX,FOLLOW,NOIMAGEINDEX,NOIMAGECLICK">
</head>
<body>

<?php
/*
 * last modified: 6/11/10
 */
include("../include/configs.php");
include("../login.php"); 

$createquery_table="CREATE TABLE $certs_table
(
	id int NOT NULL AUTO_INCREMENT,
	inserted Datetime NOT NULL,
	numofviews int(3),
	curdate varchar(25),
	delcertid varchar(10),
	shape varchar(30),
	measure1 varchar(5),
	measure2 varchar(5),
	measure3 varchar(5),
	caratweight varchar(5),
	colorgrade varchar(5),
	claritygrade varchar(20),
	cutgrade varchar(20),
	depth varchar(5),
	tablesurface varchar(5),
	gridlethickness varchar(50),
	polish varchar(20),
	symmetry varchar(20),
	fluorescence varchar(25),
	comments varchar(215),
	UNIQUE KEY id (id)
);";



if(isset($_GET['certs']) ) {
	$table = $certs_table;
	$createquery = $createquery_table;
	$param = certs;
		
	if (isset($_POST['confirm'])) {
		include("opendb.php");
		$dropquery="DROP TABLE IF EXISTS $table;";
		mysql_query($dropquery) or die("<br><b>A MySQL error occured</b><br><b>Query:</b> " . $dropquery . " <br /> <b>Error:</b> (" . mysql_errno() . ") " . mysql_error());

		mysql_query($createquery) or die("<br><b>A MySQL error occured</b><br><b>Query:</b> " . $createquery . " <br /> <b>Error:</b> (" . mysql_errno() . ") " . mysql_error());
		
		echo "<br>Successful!<br>";
		echo "<br>Done creating (and populating) table with the following credentials...<br>";
		echo "<b>Table name:</b> $table <br>";
		echo "<b>DB:</b> $database <br>";
		include("closedb.php");
		
		echo "<br>Back to <a href=\"index.php\">Database Management</a>";
	}
	else {
		$action_script = "createTable.php?$param";
		?>
		<form method="post" action="<?php $action_script ?>">
		<br>This script will drop then create the Table with the following credentials:<br>
		<?php
			echo "<li>Database Host: $dbhost</li>";
			echo "<li>Database Username: $dbuser</li>";
			echo "<li>Database Name: $database</li>";
			echo "<li>Database Table: $table</li>";
			echo "<li>Create Query: <pre>$createquery</pre></li>";
		?>
		<p><input type="submit" name="confirm" value="OK">
		<input type=button onclick="document.location.href='index.php'" value="Cancel">
		</form> 
	<?php
	}
}
else {
	echo "<br>Back to <a href=\"index.php\">Database Management</a>";
//	header('Location: index.php');
}?>

</body>
</html>
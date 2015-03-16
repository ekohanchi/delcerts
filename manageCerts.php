<html>
<head>
<title>Manage Certificates</title>
<style type='text/css'>
	tr.rowhighlight:hover { background:#B7CEEC; }
</style>
</head>
    <body>
    <?php
    include("login.php");
	?>
	<center>
		<h1>Manage Certificates</h1>
	</center>
	<?php
include("include/configs.php");
include("menubar.php");

function displayFields($table,$fields2display) {
	$query = "Select $fields2display from $table order by inserted desc;";
	$result = mysql_query($query);
	if (!$result) {
	    die("<br>Query to show fields from table FAILED - Database may not have been set up!");
	}
	$numof_fields = mysql_num_fields($result);
	echo "<br><b>Actions</b>: VC = <b>V</b>iew <b>C</b>ertificate";
	//echo " | Delete = <font color=\"red\">Choosing to delete a summary report is currently NOT easily reversable</font>";
	echo "<table width=\"100%\" align=\"center\" border=\"1\" cellpadding=\"2\" cellspacing=\"2\" style=\"empty-cells: show\">";
	echo "<tr>";
		// printing table headers
	echo "<td bgcolor=\"#B7CEEC\" align=\"center\"><b>Actions</b></td>";
	for($i=0; $i<$numof_fields; $i++) {
		$field = mysql_fetch_field($result);
		echo "<td bgcolor=\"#98AFC7\" align=\"center\"><b>{$field->name}</b></td>";
	}
	echo "</tr>\n";
		// printing table rows
	$i=0;
	while($row = mysql_fetch_row($result)) {
		echo "<tr class=\"rowhighlight\">";
		$queryall = "Select * from $table order by inserted desc;";
		$resultall = mysql_query($queryall);
		$certid = mysql_result($resultall,$i,"delcertid");
		$caratweight = mysql_result($resultall,$i,"caratweight");
		$i++;
		echo "<td><input style=\"color: #400000; font-weight: bold\" type=button onclick=\"window.open('viewCert.php?certid=$certid&caratweight=$caratweight','View Certificate ID - $certid',config='height=600,width=800, toolbar=no, menubar=no, scrollbars=yes, resizable=yes,location=no, directories=no, status=no')\" value=\"VC\">";
		echo "<input style=\"color: #347C17; font-weight: bold\" type=button onclick=\"window.open('viewSummaryCert.php?certid=$certid&caratweight=$caratweight','View Certificate Summary - $certid',config='height=600,width=800, toolbar=no, menubar=no, scrollbars=yes, resizable=yes,location=no, directories=no, status=no')\" value=\"VSC\">";
		
		//echo "<input style=\"color: #347C17; font-weight: bold\" type=button onclick=\"document.location.href='editSummaryReport.php?srfid=$srfid'\" value=\"Edit\">";
		//echo "<input style=\"color: #FF0000; font-weight: bold\" type=button onclick=\"document.location.href='deleteSummaryReport.php?srfid=$srfid'\" value=\"Delete\"></td>";
		//echo "<td>$srfid</td>";
		foreach($row as $cell) {
			echo "<td align=\"center\">$cell</td>";
		}
		echo "</tr>\n";
	}
	mysql_free_result($result);
	echo "</table";
}
?>
<form name="filterform" method="post" action="manageCerts.php">
	Select which fields you wish to display: 
	<select name="filteroptionMenu">
		<option value="showall">Show All Fields</option>
		<option value="showset1">ID, Inserted, DelCertID, Carat Weight</option>
		<option value="showset2">ID, Inserted, Number of Times Viewed, DelCertID, Carat Weight</option>
	</select>
	<input type="hidden" name="hdn_filteropt" value="statusFilteropt"></input>
	<input type="submit" value="Update Table"></input>
</form>

<?php
include("db/opendb.php");

if (isset($_REQUEST['hdn_filteropt'])) {
	$filterchoice=$_REQUEST['filteroptionMenu'];
	//echo "request[filteroptionMenu]: [$filterchoice]";
	if ($filterchoice == "showall") {
		echo "<b>Display Fields</b>: All fields ordered by inserted descending";
		displayFields($certs_table,'*');
	}
	elseif ($filterchoice == "showset1") {
		echo "<b>Display Fields</b>: ID, Inserted, DelCertID, Carat Weight ordered by inserted descending";
		displayFields($certs_table,'id, inserted, delcertid, caratweight');
	}
	elseif ($filterchoice == "showset2") {
		echo "<b>Display Fields</b>: ID, Inserted, Number of Times Viewed, DelCertID, Carat Weight ordered by inserted descending";
		displayFields($certs_table,'id, inserted, numofviews, delcertid, caratweight');
	}
}
else {
	echo "<b>Display Fields</b>: All fields ordered by inserted descending";
	displayFields($certs_table,'*');
}

include("db/closedb.php");
	
	?>
	</body>
</html>
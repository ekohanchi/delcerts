<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<META NAME="ROBOTS" CONTENT="NOINDEX,FOLLOW,NOIMAGEINDEX,NOIMAGECLICK">
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<title>DB Management</title>
</head>
    <body>
<?php
include("../login.php"); 
?>
    
    <center><h1>Database Management</h1></center>
<?php
$warn_msg="<font color=\"red\"> - WARNING this script has already been ran and it should NOT be ran again</font>"; 
?>
    <br>Select which action to run:
    <ul>
	    <li><a href="createTable.php?certs">Create certificates Table</a>
    </ul>
<!--    <ul>-->
<!--    	<li><a href="saveTable.php?memapps">Backup Memapps Table</a></li>-->
<!--    	<li><a href="saveTable.php?summaryReport">Backup SummaryReport Table</a></li>-->
<!--    </ul>-->
    </body>
</html>
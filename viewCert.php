<html>
<head>
<title>View Diamond Certificate</title>
<script language="javascript">
function printpage()
 {
  window.print();
 }
</script>
<style type=text/css>
	p       { font-size: 90%; }
	@media print  { .noprint  { display: none; } }
</style>
<!--<link rel="stylesheet" type="text/css" href="css/main.css" />-->
<link rel="stylesheet" type="text/css" href="css/main_copy.css" />
</head>
<body>
<?php
//include("login.php"); 
include("include/configs.php");
?>
<p class="noprint">
<br/>
<input type="button" value="Print" onclick="printpage();">
<input style="color: black;" type=button onclick="document.location.href='searchCerts.php'" value="Search">

</p>
<?php

//if(isset($_GET['certid']) && isset($_GET['caratweight'])) {
if (isset($_REQUEST['certid']) && isset($_REQUEST['caratweight'])) {
	$certid = mysql_escape_string($_REQUEST['certid']);
	$caratweight = mysql_escape_string($_REQUEST['caratweight']);

	include("db/opendb.php");
	
	$query = "Select * from $certs_table where delcertid='$certid' and caratweight='$caratweight'";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
//	echo "num value: $num, result value: $result";
	if ($num == 1) {
		
			// increase the numofviews value by 1
		$id = mysql_result($result,0,"id");
		$numofviews = mysql_result($result,0,"numofviews");
		$new_numofviews = $numofviews + 1;
		//echo "NEW numofviews value: $new_numofviews for id: $id<br>";
		$change_query = "Update $certs_table set numofviews='$new_numofviews' where id='$id'";
		$change_result = mysql_query($change_query);
		
//		$certid = mysql_result($result,0,"delcertid");
//		$caratweight=mysql_result($result,0,"caratweight");
		
		$curdate = mysql_result($result,0,"curdate");
		$shape=mysql_result($result,0,"shape");
		$measure1=mysql_result($result,0,"measure1");
		$measure2=mysql_result($result,0,"measure2");
		$measure3=mysql_result($result,0,"measure3");
		$colorgrade=mysql_result($result,0,"colorgrade");
		$claritygrade=mysql_result($result,0,"claritygrade");
		$cutgrade=mysql_result($result,0,"cutgrade");
		$depth=mysql_result($result,0,"depth");
		$tablesurface=mysql_result($result,0,"tablesurface");
		$gridlethickness=mysql_result($result,0,"gridlethickness");
		$polish=mysql_result($result,0,"polish");
		$symmetry=mysql_result($result,0,"symmetry");
		$fluorescence=mysql_result($result,0,"fluorescence");
		$comments=mysql_result($result,0,"comments");
		
		if ($caratweight <= 1) { $units = "carat"; } else { $units = "carats"; }
		$full_caratweight = "$caratweight $units";
		$full_measure = "$measure1 - $measure2 x $measure3 mm";
		
		/*
		echo "<b>Values will be displayed here...</b><br>";
		echo "Current Date: $curdate<br>";
		echo "Certificate ID: $certid<br>";
		echo "Carat Weight: $full_caratweight<br><br>";
		echo "Shape & Cutting Style: $shape<br>";
		echo "Measurements: $full_measure<br>";
		echo "Color Grade: $colorgrade<br>";
		echo "Clarity Grade: $claritygrade<br>";
		echo "Cut Grade: $cutgrade<br>";
		echo "Depth: $depth%<br>";
		echo "Table: $tablesurface%<br>";
		echo "Gridle Thickness $gridlethickness<br>";
		echo "Polish: $polish<br>";
		echo "Symmetry: $symmetry<br>";
		echo "Fluorescence: $fluorescence<br>";
		echo "Comments: $comments<br>";
		//$caratweight = mysql_result($result,0,"caratweight");	
		*/
		?>
		
		<div class="container">
		<div class ="innercontainer">
			<div class="datefield"><?php echo $curdate; ?></div>
			<div class="certidfield"><?php echo $certid; ?></div>
			<div class="shapefield"><?php echo $shape; ?></div>
			<div class="fullmeasurefield"><?php echo $full_measure; ?></div>
			<div class="weightfield"><?php echo $full_caratweight; ?></div>
			<div class="colorfield"><?php echo $colorgrade; ?></div>
			<div class="clarityfield"><?php echo $claritygrade; ?></div>
			<div class="cutfield"><?php echo $cutgrade; ?></div>
			<div class="depthfield"><?php echo "$depth%"; ?></div>
			<div class="tablefield"><?php echo "$tablesurface%"; ?></div>
			<div class="gridlefield"><?php echo $gridlethickness; ?></div>
			<div class="polishfield"><?php echo $polish; ?></div>
			<div class="symmetry"><?php echo $symmetry; ?></div>
			<div class="fluorescencefield"><?php echo $fluorescence; ?></div>
			<div class="commentsfield"><?php echo $comments; ?></div>
		</div>
		</div>
		
	<?php
	}
	else {
		?>
		<center>
		<font color="red">ERROR <br/>
		Certificate ID and Carat Weight combination does not match our inventory.<br><br></font>
		<input type="button" onclick="document.location.href='searchCerts.php'" value="Search Again"/>
		</center>
		<?php
	}
	
	include("db/closedb.php");
	


}
else {
	echo "<br>";
	echo "<font color=\"red\">ERROR Certificae ID (certid) not specified</font>"; ?>
	<input style="color: blue; font-weight: bold" type=button onclick="document.location.href='manageCerts.php'" value="Mange Certificates">
	<?php
}
?>

</body>
</html>

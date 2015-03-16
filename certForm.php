<?php
// Creation Date: Jun 5, 2010 1:43:39 PM
?>
<html>
<head>
<title>Diamond Evaluation Laboratory Certification Form </title>
<script language="javascript" src="include/externalfuncs.js"></script>
<style type='text/css'>
	td.colwidth { width:100px; }
	table.tbdetails {
		border-width: 10px 10px 10px 10px;
		border-spacing: 2px;
		border-style: solid solid solid solid;
		border-color: #98AFC7 #98AFC7 #98AFC7 #98AFC7;
		background-color: white;
	}
</style>
</head>
<body>
<?php

include("include/configs.php");

function createDropdown($array) {
	foreach($array as $key => $value) {
		echo "<option value=\"$key\">$value</option>\n";
	}
}

include("login.php");
?>

<center><h1>Diamond Evaluation Labratory Certification Form</h1></center>

<?php include("menubar.php"); ?>

<form name="certform" method="post" action="storeCert.php" onsubmit="return validateForm(certform);">

<table class="tbdetails"> 
	<tr>
		<td>Date</td>
		<td><input name="curdate" type ="text" size="25" maxlength="25" value="<?php echo "$curdate"?>" /></td>
	</tr>
	<tr>
		<td>delcert Certificate ID</td>
		<td>
			<input name="delcertid" type="text" size="10" maxlength="10"/>
			<!-- Always numbers -->
		</td>
	</tr>
	<tr height="10px"><td colspan="2"></td></tr>
	<tr>
		<td>Shape and Cutting Style</td>
		<td><input name="shape" type="text" size="30" maxlength="30" value="Round Brilliant" /></td>
	</tr>
	<tr>
		<td>Measurements</td>
		<td>
			<input name="measure1" type="text" size="5" maxlength="5"/> -
			<input name="measure2" type="text" size="5" maxlength="5"/> x
			<input name="measure3" type="text" size="5" maxlength="5"/> mm
		</td>
	</tr>
	<tr height="10px"><td colspan="2" align="center" bgcolor=#98AFC7><font color="white">GRADING RESULTS - 4CS</font></td></tr>
	<tr>
		<td>Carat Weight</td>
		<td><input name="caratweight" type="text" size="5" maxlength="5"/> carat(s)</td>
	</tr>
	<tr>
		<td>Color Grade</td>
		<td><select name="colorgrade" size="1"> <?php echo createDropdown($colorgradeArray); ?>  </select></td>
	</tr>
	<tr>
		<td>Clairty Grade</td>
		<td><select name="claritygrade" size="1"><?php echo createDropdown($claritygradeArray); ?></select></td>
	</tr>
	<tr>
		<td>Cut Grade</td>
		<td><select name="cutgrade" size="1"><?php echo createDropdown($cutgradeArray); ?></select></td>
	</tr>
	<tr>
		<td>Depth</td>
		<td><input name="depth" type="text" size="5" maxlength="5" value="60.0"/> %</td>
	</tr>
	<tr>
		<td>Table</td>
		<td><input name="tablesurface" type="text" size="5" maxlength="5" value="56.0"/> %</td>
	</tr>
	<tr>
		<td>Gridle thickness</td>
		<td><input name="gridlethickness" type="text" size="50" maxlength="50" value="THIN TO MEDIUM, FACETED"/></td>
	</tr>
	<tr height="10px"><td colspan="2" align="center" bgcolor=#98AFC7><font color="white">ADDITIONAL GRADING INFORMATION</font></td></tr>
	<tr>
		<td>Finish</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">Polish</td>
		<td><select name="polish" size="1"><?php echo createDropdown($cutgradeArray); ?></select></td>
	</tr>
	<tr>
		<td align="center">Symmetry</td>
		<td><select name="symmetry" size="1"><?php echo createDropdown($cutgradeArray); ?></select></td>
	</tr>
	<tr>
		<td>Fluorescence</td>
		<td><select name="fluorescence" size="1"><?php echo createDropdown($fluorescenceArray); ?></select></td>
	</tr>
	<tr valign="top">
		<td>Comments</td>
		<td><textarea name="comments" rows="8" cols="30">LASER INSCRIPTION CERTIFICATEID IS INSCRIBED ON GIRDLE</textarea></td>
	</tr>
	<tr height="10px"><td colspan="2"></td></tr>
	<tr>
		<td colspan="2" align="center"> <input type="submit" value="Submit" /> <input type="reset" value="Reset" /></td>
	</tr>
	
</table>
</form>

</body>
</html>
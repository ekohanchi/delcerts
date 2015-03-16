<?php
// Creation Date: Jun 19, 2010 2:41:10 PM
?>
<html>
<head>
<title>Diamond Evaluation Labratory - Search for Certificate</title>
<script language="javascript" src="include/externalfuncs.js"></script>
  <style>
  	input { border: 1px solid black; }
  	.text1 {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:normal;
	color:#000000;
	}
  </style>
</head>
<body>
<center> <h3>Certificate Search</h3> </center>
  <div style="width:500px; margin-left:auto; margin-right:auto; text-align:center">
    <form name="searchform" method="post" action="viewCert.php" onsubmit="return validateSearchForm(searchform);">
        <h4>Please enter the Certificate ID &amp; Carat Weight<br>of your diamond</h4>
    
    <table border="0" cellpadding="8"  bgcolor="#A6A39C" width="350" align="center">
	    <tr>
		    <td align="right" class="text1">Certificate ID:</td>
		    <td align="left"><input type="text" name="certid" size="10" maxlength="10"></input></td>
	    </tr>
	    <tr>
		    <td align="right" class="text1">Carat Weight:</td>
		    <td align="left"><input type="text" name="caratweight" size="5" maxlength="5"></input></td>
	    </tr>
	    <tr>
		    <td align="center" colspan="2">
		    	<input type="submit" name="submit" value="Search"/>
		    	<input type="reset" value="Clear"/>
		    </td>
	    </tr>
    </table>
    </form>
    </div>
<?php

?>

</body>
</html>
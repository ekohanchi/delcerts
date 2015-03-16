<?php
// Creation Date: Jun 5, 2010 6:39:08 PM
?>
<html>
<head>
<title>Store Certificate </title>
</head>
<body>
<?php
if (isset($_REQUEST['delcertid'])) {
	include("include/configs.php");
	
	$Unixtime = time();
	$uniqueid = date("YmdHis", $Unixtime + -3.00 * 3600);
	
	$sql_values = "'',";		
	$sql_values = "$sql_values now(),";
	$sql_values = "$sql_values'0',";
	
		// Debugging purposes only
	$keyvaluepair_array = array();
	$keyvaluepair_array["id"] = "1";
	$keyvaluepair_array["inserted"] = "now()";
	$keyvaluepair_array["numofviews"] = "0";
		// Debugging block ends
		
	foreach (array_keys($_REQUEST) as $k) {
		$value = $_REQUEST[$k];
		$esc_value = mysql_escape_string($value);
		if ($k == "comments") {
			$pattern = "[CERTIFICATEID]";
			$replacement = $certid;
			$esc_value_new = preg_replace($pattern,$replacement,$esc_value);
			$sql_values = "$sql_values'$esc_value_new'";
				// Debugging purposes only
			$keyvaluepair_array["$k"] = "$esc_value_new";
				// Debugging purposes only end
			break;
		}
		else {
			if ($k == "delcertid") {
				$certid = $value;
			}
			if ($k == "caratweight") {
				$caratweight = $value;
			}
			$sql_values = "$sql_values'$esc_value',";
				// Debugging purposes only
			$keyvaluepair_array["$k"] = "$value";
				// Debugging purposes only end
		}

	}
	
	if ($debugmode == 1) {
			// Display Debugging purposes only
		echo "sql_values Value: [$sql_values]<br><br>";
		$j=1;
		foreach($keyvaluepair_array as $key => $value) {
			print "$j - $key: $value<br>";
			//print "$key<br>";
			$j++;
		}
			// Debugging purposes only end
	}
		
	include("db/opendb.php");
	
			// Checking to see if duplicate delcertid & caratweight already exist in DB
	$query = "Select * from $certs_table where delcertid='$certid' and caratweight='$caratweight'";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	//echo "num value: $num, result value: $result, certid value: $certid, caratweight value: $caratweight<br>$query";
	if ($num == 0) {
		
				// Storing report to DB
		$insertquery = "INSERT INTO $certs_table VALUES ($sql_values)";
		
			//$insertstatus value equals 1 when the query is successfull
		$insertstatus = mysql_query($insertquery);
		$insert_errmsg=("<b>A MySQL error occured for certificate id: $certid</b><br><br><b>Query:</b> " . $insertquery . " <br><br><b>Error:</b> (" . mysql_errno() . ") " . mysql_error() . "<br><br><br>");
		$insert_errmsg_fileformatted=("A MySQL error occured for certificate id: $certid\nQuery: " . $insertquery . " \nError: (" . mysql_errno() . ") " . mysql_error() . "\n***********************\n");
		
		
		
		if ($insertstatus != 1) {
			$sqlerrors_hndlr = fopen($sqlerrors, 'a');
			fwrite($sqlerrors_hndlr, $insert_errmsg_fileformatted);
			fclose($sqlerrors_hndlr);
			echo "$insert_errmsg";
			
			$to = "$error_emailnotify";
			$subject = "delcert.com - Certificate Entry Error message";
			$message = "A certificate with certificate id: $certid has been submitted<br>";
			$message .= "sql error statement: $insert_errmsg";
			$headers = "From: noreply@noreply.com\r\n";
			$headers .= "Reply-To: noreply@noreply.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
			mail( $to, $subject, $message, $headers );
			//Emailing srfid notification DONE
			
			?>
			A report of this error message has been emailed to the administrator.<br/><br/>
			<input style="color: Chocolate; font-weight: bold" type=button onclick="document.location.href='certForm.php'" value="Do another certificate entry">
			<?php
		}
		else {
			?>
			 <br><h3 style="color:green;">Certificate Form submitted and stored Successfully!!</h3>
			 What do you want to do next?<br/>
			 <input style="color: #400000; font-weight: bold" type=button onclick="window.open('viewCert.php?certid=<?php echo "$certid"; ?>&caratweight=<?php echo "$caratweight"; ?>','View Certificate - <?php echo "$certid - $caratweight"; ?>',config='height=600,width=800, toolbar=no, menubar=no, scrollbars=yes, resizable=yes,location=no, directories=no, status=no')" value="View Certificate">
			 <br/> <br/>
			<?php include("menubar.php");
		}
	}
	else {		// if duplicate certid and caratweight already exist in DB
		?>
		 <br><h4 style="color:RED;">ERROR - Duplicate Certificate ID and CaratWeight combination values already exist in Database!!</h4>
		 <font style="color:RED;">Certificate Form <b>NOT</b> stored!!</font><br/><br/>
		 What do you want to do next?<br/>
		 <input style="color: #400000; font-weight: bold" type="button" onclick="document.location.href='certForm.php'" value="Try again"/>
<!--		 <input style="color: #400000; font-weight: bold" type=button onclick="window.open('viewCert.php?certid=<?php echo "$certid"; ?>&caratweight=<?php echo "$caratweight"; ?>','View Certificate - <?php echo "$certid - $caratweight"; ?>',config='height=600,width=800, toolbar=no, menubar=no, scrollbars=yes, resizable=yes,location=no, directories=no, status=no')" value="View Certificate">-->
		 <br/> <br/>
		<?php include("menubar.php");
	}
	include("db/closedb.php");
}

?>
</body>
</html>
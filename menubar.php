<?php
/*
 * Created on Mar 31, 2010
 *
 */
?>
<html>
<head>
</head>
<body>

<form>
	<input style="color: Chocolate; font-weight: bold" type=button onclick="document.location.href='certForm.php'" value="Fill in a Certificate Form">
	<input style="color: blue; font-weight: bold" type=button onclick="document.location.href='manageCerts.php'" value="Mange Certificates">
	<?php
	if ($_SESSION['user'] == "ekohanchi") { ?>
		<input style="color: Maroon; font-weight: bold" type=button onclick="document.location.href='db/index.php'" value="DB Management">
	<?php
	}?>
	<br>
</form>

</body>
</html>
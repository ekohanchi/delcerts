<?php
/*
 * last modified: 1/1/10 
 */

	// Global variable configs
	// Arrays
$colorgradeArray = array('D'=>"D",'E'=>"E",'F'=>"F",'G'=>"G",'H'=>"H",'I'=>"I",'J'=>"J",'K'=>"K",'L'=>"L",'M'=>"M",'N'=>"N",'O'=>"O",'P'=>"P",'Q'=>"Q",'R'=>"R",'S'=>"S",'T'=>"T",'U'=>"U",'V'=>"V",'W'=>"W",'X'=>"X",'Y'=>"Y",'Z'=>"Z");
$claritygradeArray = array('FLAWLESS'=>"INTERNALLY FLAWLESS",'VVS1'=>"VVS1",'VVS2'=>"VVS2",'VS1'=>"VS1",'VS2'=>"VS2",'SI1'=>"SI1",'SI2'=>"SI2",'I1'=>"I1",'I2'=>"I2",'I3'=>"I3");
$cutgradeArray = array ('Excellent'=>"Excellent",'Very Good'=>"Very Good",'Good'=>"Good",'Fair'=>"Fair",'Poor'=>"Poor");
$fluorescenceArray = array ('None'=>"None",'Faint'=>"Faint",'Medium Blue'=>"Medium Blue",'Strong Blue'=>"Strong Blue");

	// Variables
$curdate = date("F d, Y");

	// DB CONFIGURATIONS
include ("dbconfigurations.php");

	// Common DB configs
$certs_table="certificates";

	//mysql insert error messages file
$sqlerrors = "sqlerrors.txt";

		//application processed email notification
$emailnotify = "ekohanchi@gmail.com";
$error_emailnotify = "ekohanchi@gmail.com";
//$error_emailnotify = "";

$debugmode = 0;

	// Login page credentials
//put sha1() encrypted password here - example is 'hello'
$login_info = array(
  'ekohanchi' => '9d67cd1209ff3ca2fde13fe70b1d417a623b7ac0',
  'itaishpitz' => '2ed37aaa9127a41f07cd24e74c508b93b0ab073c'
);

$login_credentials_decrypted = array(
	'Eli Kohanchi - ekohanchi' => 'adm!np4w',
	'Itai Shpitz - itaishpitz' => 'shiran888'
);

?>
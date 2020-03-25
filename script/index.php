<?php
// uncomment below lines if want to see all errors

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include('dom.php');
// Webpage jisme captcha ki link h
$html = file_get_html('http://result.rgpv.ac.in/Result/BErslt.aspx');
//captcha ki url
$url  = $html->find('#ctl00_ContentPlaceHolder1_pnlCaptcha > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(1) > div:nth-child(1) > img:nth-child(1)', 0)->src;
$url="http://result.rgpv.ac.in/Result/$url";
// generate randon name for file
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';
for ($i = 0; $i < 30; $i++) {
		$index = rand(0, strlen($characters) - 1);
		$randomString .= $characters[$index];
	}
$file = "$randomString.jpg";
// create a folder name captcha first, else it will not work
file_put_contents("captcha/$file", file_get_contents($url));
echo "done";
?>

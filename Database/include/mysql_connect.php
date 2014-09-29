<?php
$con = mysql_connect("localhost","kcsglobaladmin","9yhu2y3en");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("kolby_kcsglobal", $con) or die();
?>
<?php
	$id = $_GET['id'];
	include '../config/sip.php';
	$sql = mysql_query("SELECT * FROM mail where id_mail ='$id'");
	$select = mysql_fetch_array($sql);
	header("Content-type:image/png");
	echo $select['file'];
?>
<?php 
include '../config/konek.php';
$data = mysql_query("SELECT * from mail where id =".$_REQUEST['id']);
if ($row = mysql_fetch_assoc($data)) {
	$file = $row['file'];
	$name = $row['file_name'];
	$type = $row['file_type'];
	$size = $row['file_size'];
	header('Content-type: '.$type);
	header("Content-length: ".$size);
	header('Pragma: no-chace');
	header('Expires: 0');
	header('Content-Disposition:attachment; filename="' .$name. '"');
	echo $file;exit();
}
 ?>
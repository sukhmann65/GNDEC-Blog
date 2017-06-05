<?php


$file=$_REQUEST['k1'];
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $file . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
@readfile($file);


?>
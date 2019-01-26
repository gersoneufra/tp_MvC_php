<?php 
function img_tag($src)
{
	echo "<img src='/tp_MvC_php/public/img/". $src .".jpg' >";
}

function redirect($url){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	echo "Location: http://$host/$url";
	header("Location: http://$host/$url");
  exit;
}
<?php
@header("Content-type:image/gif");
@session_start();
$x="";
 
for($i=0;$i<3;$i++){
$x.=rand(0,9);
}
 
@$_SESSION['verfiy']=$x;
$text=$x;
$im=imagecreate(100,20);
$bg=imagecolorallocate($im,218,214,163);
$font=imagecolorallocate($im,2,10,34);
imagestring($im,3,40,0,$text,$font);
imagegif($im,null);
 
?>
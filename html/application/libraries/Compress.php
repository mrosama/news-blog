<?php
require_once 'pclzip.lib.php';

class Compress {



 

public function Zip($Filename,$Folder){
// $Filename new name file zip  
$new_zip= new PclZip($Filename);
// $Folder commpress all file in this directory or can by array array(1.txt,2.mp3,3.jpg)
$file_list = $new_zip->create($Folder);
if ($file_list == 0)
{
//die("Error : ".$new_zip->errorInfo(true));
return false;
}
return true;


}





public function Extract($Filename,$Folder){



// $Filename file want to extract

$archive = new PclZip($Filename);



//Folder Want to extract file in side

if ($archive->extract(PCLZIP_OPT_PATH,$Folder) == 0)

{

// Error Extract file

// die("Error : ".$archive->errorInfo(true));
return false;
}



return true;

}






































}




 
?>
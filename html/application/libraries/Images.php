<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images {

public function  Size($ImgSrc,$ImgTarget,$x,$y){
 if(function_exists('imagecreatefromjpeg'))
 {
 
 try
 {
switch (strtoupper($this->File_extension($ImgSrc))){
case "JPG":
case "JPEG" :
$im=@imagecreatefromjpeg($ImgSrc);
break;
case "GIF":
$im=@imagecreatefromgif($ImgSrc);
break;
case "PNG":
$im=@imagecreatefrompng($ImgSrc);
break;
} 
$canves=@imagecreatetruecolor($x,$y);
$width=@imagesx($im);
$height=@imagesy($im);

 
//$trans = imagecolorat($canves, 0, 0);
//$trans = imagecolorallocate ($canves, 255, 255, 255);
$trans = imagecolorresolve($canves, 0, 0, 0); 
imagecolortransparent($canves, $trans);

   
 @imagecopyresampled($canves,$im,0,0,0,0,$x,$y,$width,$height);
@imagegif($canves,$ImgTarget);
@imagedestroy($im);
@imagedestroy($canves); 
  
} 
catch(Exception  $e){
echo "<script>alert($e->getMessage())</script>"; 
}
}
else{
dir('GD Not Support in Server.........');
}

}
	
	
	
	
/*
 *
 * @Write text to an existing image
 *
 * @Author Kevin Waterson
 *
 * @access public
 *
 * @param string The image path
 *
 * @param string The text string
 *
 * @return resource
 *
 */
public function writeToImage($imagefile, $text){
/*** make sure the file exists ***/
if(file_exists($imagefile))
    {    
    /*** create image ***/
    $im = @imagecreatefromjpeg($imagefile);

    /*** create the text color ***/
    $text_color = imagecolorallocate($im, 233, 14, 91);

    /*** splatter the image with text ***/
    imagestring($im, 6, 25, 150,  "$text", $text_color);
    }
else
    {
    /*** if the file does not exist we will create our own image ***/
    /*** Create a black image ***/
    $im  = imagecreatetruecolor(150, 30); /* Create a black image */

    /*** the background color ***/
    $bgc = imagecolorallocate($im, 255, 255, 255);

    /*** the text color ***/
    $tc  = imagecolorallocate($im, 0, 0, 0);

    /*** a little rectangle ***/
    imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

    /*** output and error message ***/
    imagestring($im, 1, 5, 5, "Error loading $imagefile", $tc);
    }
return $im;
}	
	
	
	
	
	
	
	

/*
  Thumbnail with GD

  Function that makes a thumbnail of a imagen and keeps it's proportion.
  $the fourth parameter ($fill) makes that, if the image is smaller than
  the size we want, the function expands it. It shows the image directly
  to the browser, but can be easily modificed to save the imagen on a directory.
*/

function thumb($img, $w, $h, $fill = true)
{
        if (!extension_loaded('gd') && !extension_loaded('gd2')) {
                trigger_error("No dispones de la libreria GD para generar la imagen.", E_USER_WARNING);
                return false;
        }

        $imgInfo = getimagesize($img);
        switch ($imgInfo[2]) {
                case 1: $im = imagecreatefromgif($img); break;
                case 2: $im = imagecreatefromjpeg($img);  break;
                case 3: $im = imagecreatefrompng($img); break;
                default:  trigger_error('Tipo de imagen no reconocido.', E_USER_WARNING);  break;
        }

        if ($imgInfo[0] <= $w && $imgInfo[1] <= $h && !$fill) {
                $nHeight = $imgInfo[1];
                $nWidth = $imgInfo[0];
        }else{
                if ($w/$imgInfo[0] < $h/$imgInfo[1]) {
                        $nWidth = $w;
                        $nHeight = $imgInfo[1]*($w/$imgInfo[0]);
                }else{
                        $nWidth = $imgInfo[0]*($h/$imgInfo[1]);
                        $nHeight = $h;
                }
        }

        $nWidth = round($nWidth);
        $nHeight = round($nHeight);

        $newImg = imagecreatetruecolor($nWidth, $nHeight);

        imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);

     //   header("Content-type: ". $imgInfo['mime']);

        switch ($imgInfo[2]) {
                case 1: @imagegif($newImg,$newImg); break;
                case 2: @imagejpeg($newImg,100);  break;
                case 3: @imagepng($newImg,$newImg); break;
                default:  trigger_error('Imposible mostrar la imagen.', E_USER_WARNING);  break;
        }

    //    imagedestroy($newImg);
 
@imagedestroy($im);
@imagedestroy($newImg); 
		 
}	
	
	
	
	
	   /**
    *Mysql::File_extension() get File Exetention.......
    *@param filename string Filename &path file;
    *@return string 
    */
 
public function File_extension($filename){

$exe=end(explode(".","$filename")); 

return  $exe;
 
} 
	
	
	
	
	
	
	
public function   AddLogo($logo,$image){

$img = new img();
//variabili settabili (valori segnati default)
$img->name = "asd"; //nome immagine senza estensione, di default preso nome originale
$img->thumb_w = 172; // larghezza thumb in px
$img->thumb_h = 130; // altezza thumb in px
$img->max_w = 720; // larghezza max in px
$img->max_h = 540; // altezza max in px
$img->pos_x = "RIGHT"; // posizione logo -> RIGHT, LEFT, CENTER
$img->pos_y = "BOTTOM"; // posizione logo -> BOTTOM, TOP, MIDDLE
$img->img_folder = ""; // cartella immagine grande (default-> cartella dell'immagine originale)
$img->thumb_folder = ""; // cartella immagine thumb (default-> cartella dell'immagine originale)
$img->saveBIG = 1; //salvare immagine grande 1 o 0
$img->saveTHUMB = 1; //salvare thumb -> 1 o 0
$img->AddLogo($image, $logo);

//se necessario effettuare altre operazioni sulle immagini
//$img->new_image (risorse immagine)
//$img->thumb (risorsa thumb)
 
}	
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
	?>
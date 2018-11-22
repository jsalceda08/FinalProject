<?php
// This library file is made by webtechball
// Starting of function called webtechball_img_resize made by webtechball
function webtechball_img_resize($targett, $newcpy, $w, $h, $extn)
{

    list($origWidth, $origHeight) = getimagesize($targett);

    $ratio = $origWidth / $origHeight;

    if(($w / $h) > $ratio)
    {
        $w = $h * $raio;
    }
    else
    {
        $h = $w * $ratio;
    }
    
    $img="";
    $extn = strtolower($extn);
    if($extn == "gif")
    {
        $img = imagecreatefromgif($targett);
    }
    else if($extn == "png")
    {
        $img = imagecreatefrompng($targett);
    }
    else
    {
        $img = imagecreatefromjpeg($targett);
    }
    $a = imagecreatetruecolor($w, $h);
    
    imagecopyresampled($a,$img,0,0,0,0,$w,$h,$origWidth,$origHeight);
    imagejpeg($a,$newcpy,80);
}
// End of function called webtechball_img_resize made by webtechball
?>
<?php
session_start();
function creatcapchacode()
{

    $imagename = round(microtime(true) * 1000);
    $image = imagecreate(170, 50);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $line_color = imagecolorallocate($image, 100, 5, 75);
    $pixel_color = imagecolorallocate($image, 255, 0, 0);

    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);


    for ($i = 0; $i < 3; $i++) {

        imageline($image, 0, rand(0, 50), 170, rand(1, 50), $line_color);
    }

    for ($i = 0; $i < 1000; $i++){
        imagesetpixel($image, rand(1, 169), rand(1, 49), $pixel_color);
    }

    $letters="abcdefghmnjkflkwxyz1234567890";
    $lengthletter=strlen($letters);
    $font="font/arial.ttf";
    $word="";

    for ($i=0;$i<=4;$i++){

        $letter=$letters[rand(0,$lengthletter-1)];
        imagettftext($image,20,rand(-45,45),20+($i*30),35,$text_color,$font,$letter);
        $word=$word.$letter;
    }

    $_SESSION['capcha']=$word;
    echo $imagename;

    $pics=glob("*.png");
    foreach ($pics as $x){
        $creat_time=str_replace('.png','',$x);

        if ($imagename-$creat_time>10000){
            unlink($x) ;

        }

    }


    imagepng($image,$imagename.".png");


}
creatcapchacode();

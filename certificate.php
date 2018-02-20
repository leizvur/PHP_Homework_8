<?php

//Текст сертификата
$cert_text="Этот сертификат подтверждает, что ты на 33% рожден в СССР!";
session_start();
$_SESSION["code"]=$cert_text;

//Картинка сертификата
$image=imagecreatetruecolor(640, 320);
$background_color=imagecolorallocate($image, 255, 0, 0);
$text_color=imagecolorallocate($image, 0, 0, 255);

$cert_png=__DIR__ . "/certificate.png";
if (!file_exists($cert_png)) 
{
	echo "Файл с картинкой для сертификата не найден!";
	exit;
}


$font_ttf=__DIR__ . '/impact.ttf';
if (!file_exists($font_ttf)) 
{
	echo "Файл шрифта не найден!";
	exit;
}


$cert_file=imagecreatefrompng($cert_png);
imagefill($image, 20, 20, $background_color);
imagecopy($image, $cert_png, 0, 0, 630, 320, 630, 320);
imagettftext($image, 15, 0, 50, 100, $text_color, $font_ttf, $cert_text);
header('Content-Type: image/png');
imagepng($image);

?>
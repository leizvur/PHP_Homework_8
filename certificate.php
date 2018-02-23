<?php

//Текст сертификата
$certText="Этот сертификат подтверждает, что ты на 33,3% рожден в СССР!";
//session_start();
//$_SESSION["code"]=$certText;

//Картинка сертификата
$image=imagecreatetruecolor(640, 320);
$backgroundColor=imagecolorallocate($image, 255, 0, 0);
$textColor=imagecolorallocate($image, 0, 255, 0);

$certPng=__DIR__ . "/certificate.png";
if (!file_exists($certPng)) 
{
	echo "Файл с картинкой для сертификата не найден!";
	exit;
}


$fontTtf=__DIR__ . '/impact.ttf';
if (!file_exists($fontTtf)) 
{
	echo "Файл шрифта не найден!";
	exit;
}


$certFile=imagecreatefrompng($certPng);
imagefill($image, 20, 20, $backgroundColor);
imagecopy($image, $certFile, 0, 0, 0, 0, 640, 320);
imagettftext($image, 15, 0, 50, 200, $textColor, $fontTtf, $certText);
header('Content-Type: image/png');
imagepng($image);

?>
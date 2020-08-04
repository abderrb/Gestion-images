<?php
$image = 'sql-join-infographie.png';

$nomComplet = __DIR__.'/images/'.$image;

$dimensions = getimagesize($nomComplet);

// On vérifie le type Mime de l'image

switch($dimensions['mime']){
    case 'image/png':
        $imageTemp = imagecreatefrompng($nomComplet);
        break;
    case 'image/jpeg':
        $imageTemp = imagecreatefromjpeg($nomComplet);
}

// On créer une image vierge

$imageDest = imagecreatetruecolor($dimensions[0], $dimensions[1]);

// On copie la totalité de l'image source dans l'image de destination

imagecopyresampled(
    $imageDest,
    $imageTemp,
    0,
    0,
    0,
    0,
    $dimensions[0],
    $dimensions[1],
    $dimensions[0],
    $dimensions[1]
);

// On enregistre l'image (sur le disque)

switch($dimensions['mime']){
    case 'image/png':
        imagepng($imageDest, __DIR__.'/images/copie.png');
        break;
    case 'image/jpeg':
        imagejpeg($imageDest, __DIR__.'/images/copie.jpg');
}
<?php
$image = 'sql-join-infographie.png';

$nomComplet = __DIR__.'/images/'.$image;

$dimensions = getimagesize($nomComplet);

// Créer une miniature carrée de 300x300

// On définit l'orientation et les décalages qui en découlent
// On initialise les décalages
$decalageX = $decalageY = 0;

switch($dimensions[0] <=> $dimensions[1]){
    case -1: // Portrait
        $tailleCarre = $dimensions[0];
        $decalageY = ($dimensions[1] - $tailleCarre) / 2;
        break;
    case 0: // Carré
        $tailleCarre = $dimensions[0];
        break;
    case 1: // Paysage
        $tailleCarre = $dimensions[1];
        $decalageX = ($dimensions[0] - $tailleCarre) / 2;
}

// On vérifie le type Mime de l'image
switch($dimensions['mime']){
    case 'image/png':
        $imageTemp = imagecreatefrompng($nomComplet);
        break;
    case 'image/jpeg':
        $imageTemp = imagecreatefromjpeg($nomComplet);
}

// On crée une image temporaire en mémoire pour créer la copie

$imageDest = imagecreatetruecolor(300, 300);

// On copie la partie de l'image source dans l'image de destination
imagecopyresampled(
    $imageDest, // Image destination
    $imageTemp, // Image source
    0,          // point gauche de la zone de collage
    0,          // point supérieur de  la zone de collage  
    $decalageX, // point gauche de la zone de copie
    $decalageY, // point supérieur de  la zone de copie
    300,        // largeur de la zone de collage
    300,        // hauteur de la zone de collage
    $tailleCarre,// largeur de la zone de copie
    $tailleCarre// hauteur de la zone de copie
);

// On enregistre l'image (sur le disque)
switch($dimensions['mime']){
    case 'image/png':
        imagepng($imageDest, __DIR__.'/images/mini.png');
        break;
    case 'image/jpeg':
        imagejpeg($imageDest, __DIR__.'/images/mini.png');
}

<?php
$image = 'sql-join-infographie.png';

$nomComplet = __DIR__.'/images/'.$image;

$dimensions = getimagesize($nomComplet);

echo "<p>L'image a une largeur de $dimensions[0] pixels</p>";
echo "<p>L'image a une hauteur de $dimensions[1] pixels</p>";

switch($dimensions[0] <=> $dimensions[1]){
    case -1:
        echo "<p>l'image est un portrait</p>";
        break;
    case 0:
        echo "<p>l'image est un carré</p>";
        break;
    case 1:
        echo "<p>l'image est un paysage</p>";
}



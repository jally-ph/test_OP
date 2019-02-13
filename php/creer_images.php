<?php

//pour une img vide //ça fonctionnait pas car la balise php n'était pas tout en haut, à la 1ere ligne

header ("Content-type: image/png"); // 1 : on indique qu'on va envoyer une image PNG
$image = imagecreate(200,50); // 2 : on crée une nouvelle image de taille 200 x 50
// 3 : on s'amuse avec notre image (on va apprendre à le faire)



$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 5, 35, 15, "Cours php", $noir);
imagecolortransparent($image, $bleuclair); // On rend le fond orange transparent

imagepng($image); // 4 : on a fini de faire joujou, on demande à afficher l'image
?>

<!-- 

Donc, si la page PHP s'appelle « image.php », 
vous mettrez ce code HTML pour l'afficher depuis une autre page :

<img src="image.php" />


-->
<!--A mettre avant tout code html 


//pour une img existante
/*
header ("Content-type: image/jpeg");
$image = imagecreatefromjpeg("couchersoleil.jpg");
*/
-->

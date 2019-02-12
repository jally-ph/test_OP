<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jointures</title>
	<meta charset="utf-8">
	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<!-- Feuilles de styles -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>
	<!-- favicon -->
	<link rel="icon" href="images/favicon.jpg" />
</head>

<body>
	
	<?php


	//----------------WHERE (ancienne méthode)------------------///

	$reponse = $bdd->query('SELECT jeux_video.nom AS nom_jeu, proprietaires.prenom AS prenom_proprietaire
FROM proprietaires, jeux_video
WHERE jeux_video.ID_proprietaire = proprietaires.ID');

$donnees = $reponse->fetch();


while ($donnees = $reponse->fetch())
{	
		echo '<h5>A : ' .$donnees['prenom_proprietaire'] .'</h5>';
		echo '<p>'. $donnees['nom_jeu']; 
}


	
	var_dump($donnees['nom_jeu']);

	$reponse->closeCursor();
	?>

<p>___________________________________________________________</p>


<?php
//-----------------JOIN interne (nvelle méthode)-------------------///

$reponse = $bdd->query('
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
INNER JOIN jeux_video j
ON j.ID_proprietaire = p.ID');

$donnees = $reponse->fetch();

while ($donnees = $reponse->fetch())
{	
		echo '<h5>A : ' .$donnees['prenom_proprietaire'] .'</h5>';
		echo '<p>'. $donnees['nom_jeu']; 
}

$reponse->closeCursor();
?>

<p>___________________________________________________________</p>


<?php
//-----------------JOIN externe LEFT / RIGHT------------------///

$reponse = $bdd->query('
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
LEFT JOIN jeux_video j
ON j.ID_proprietaire = p.ID');



while ($donnees = $reponse->fetch())
{	
		echo '<h5>A : ' .$donnees['prenom_proprietaire'] .'</h5>';
		echo '<p>'. $donnees['nom_jeu']; 
}

$reponse->closeCursor();
?>





</body>
</html>
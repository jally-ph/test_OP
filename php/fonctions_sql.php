<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


//pour que les noms de jeux soient en majuscules

$reponse = $bdd->query('SELECT UPPER(nom) AS nom_maj FROM jeux_video');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom_maj'] . '<br />';
}

$reponse->closeCursor();


//---------------nouvelle requête --------------------->


$reponse = $bdd->query('SELECT UPPER(nom) AS nom_maj, possesseur, console, prix FROM jeux_video');

while ($donnees = $reponse->fetch())
{
	echo '<p>' .$donnees['nom_maj'] . '<br />' . $donnees['possesseur']. ' joue avec un ou une '. $donnees['console'] . ' qui lui a coûté '. $donnees['prix']. ' € </p>';
}

$reponse->closeCursor();


//---------------nouvelle requête --------------------->


$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen FROM jeux_video');

while ($donnees = $reponse->fetch())
{
	echo '<p> Prix moyen des jeux vidéo : ' .$donnees['prix_moyen']. ' € </p>';
}

$reponse->closeCursor();

//---------------nouvelle requête --------------------->
//façon + adapté de montrer le prix moyen ! pas la peine de faire une boucle !

$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen FROM jeux_video');

$donnees = $reponse->fetch();
echo $donnees['prix_moyen'];

$reponse->closeCursor();



//---------------nouvelle requête --------------------->


$reponse = $bdd->query('SELECT COUNT(DISTINCT console) AS nbconsoles FROM jeux_video');


$donnees = $reponse->fetch();
echo '<p> Nbre de consoles de la table : </p>'.$donnees['nbconsoles'];

$reponse->closeCursor();


//---------------nouvelle requête --------------------->


$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console');


while ($donnees = $reponse->fetch())
{
	echo '<p> Prix moyen par console : </p>'.$donnees['prix_moyen']. ' € avec '. $donnees['console'];
}


$reponse->closeCursor();


//---------------nouvelle requête --------------------->


$reponse = $bdd->query('SELECT SUM(prix) AS valeur_totale, possesseur FROM jeux_video GROUP BY possesseur');


while ($donnees = $reponse->fetch())
{
	echo '<p> Valeur totale des jeux pour chacun : </p>'.$donnees['possesseur']. ' - '. $donnees['valeur_totale'] . ' €';
}


$reponse->closeCursor();


//---------------nouvelle requête --------------------->


$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console HAVING prix_moyen <= 10');


while ($donnees = $reponse->fetch())
{
	echo '<p> cette req récupère la liste des consoles et leurs prix moyen SI ce prix ne dépasse pas 10€ : '.$donnees['console']. ' - '. $donnees['prix_moyen'] . ' € </p>';
}


$reponse->closeCursor();



?>

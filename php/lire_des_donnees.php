<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
?>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM jeux_video');

$donnees = $reponse->fetch();

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

//---------------nouvelle requête --------------------->

$reponse = $bdd->query('SELECT nom FROM jeux_video');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . '<br />';
}

$reponse->closeCursor();

//---------------nouvelle requête --------------------->

$reponse = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur=\'Patrick\'');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br />';
}

$reponse->closeCursor();

//---------------nouvelle requête --------------------->

$reponse = $bdd->query('SELECT nom, prix FROM jeux_video ORDER BY prix');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . ' coûte ' . $donnees['prix'] . ' EUR<br />';
}

$reponse->closeCursor();

//---------------nouvelle requête --------------------->

$reponse = $bdd->query('SELECT nom FROM jeux_video LIMIT 0, 10');

echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';
while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . '<br />';
}

$reponse->closeCursor();

//---------------nouvelle requête --------------------->

$reponse = $bdd->query("SELECT nom, possesseur, console, prix FROM jeux_video WHERE console='Xbox' OR console='PS2' ORDER BY prix DESC LIMIT 0,10");

while ($donnees = $reponse->fetch()) 
{
	echo '<p>' .$donnees['nom']. $donnees['possesseur'] . '<br>'.
	$donnees['console']. 'qui a coûté '. $donnees['prix'] .' € </p>';
}

$reponse->closeCursor();

?>








<!DOCTYPE html>
<html>
<head>
	<title>Lire des données</title>
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
	


	<p></p>
</body>
</html>
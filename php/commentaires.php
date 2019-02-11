<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
<!DOCTYPE html>
<html>
<head>
	<title>TP Blog</title>
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
	<link rel="icon" href="images/favicon.png" />
	<!--google fonts-->


</head>


<?php
//post

$req = $bdd->prepare('SELECT id, titre, auteur, contenu, date_creation FROM billets WHERE id = ? ');

$req->execute(array($_GET['billet']));
$donnees = $req->fetch();

echo $donnees['titre'] .'<br> par '. $donnees['auteur'] . ' le ' . $donnees['date_creation']. '<br>'. nl2br($donnees['contenu']) ;

$req->closeCursor();


//commentaires associés

$req = $bdd->prepare('SELECT auteur, commentaire, date_commentaire FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');

//pourquoi id_billet est associé à l'id des posts???

$req->execute(array($_GET['billet']));


while ($donnees = $req->fetch()) 
{
	echo '<p><h4>'. $donnees['auteur'].'</h4><br>'. $donnees['commentaire']. '<br>'. $donnees['date_commentaire']. '</p>';

}

$req->closeCursor();




?>





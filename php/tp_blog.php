<!--
TP BLOG :

	- afficher posts sur accueil
*- écrire des posts (INSERT INTO)
- dates sous les posts (DATETIME)
- mettre à jour les posts (UPDATE)
- supprimer des posts (DELETE)
- commentaires associés à chq post
- écrire des commentaires
- lien de retour sur l'index
- htmlspecialchars()

Il y aura deux pages à réaliser :
- index.php : liste des cinq derniers billets ;
- commentaires.php : affichage d'un billet et de ses commentaires.


-->

<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>


<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

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

<body>

	<div>
		<h1>TP Blog</h1>
	</div>

	<div class="zone_msg_blog">
		<?php

		$reponse = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');

		while ($donnees = $reponse->fetch())
		{	?>
			<div>
				<h2><?php echo $donnees['titre']; ?></h2>
				<p> par <?php echo $donnees['auteur']. ' le '.
				$donnees['date_creation']; ?></p>
				<p><?php echo $donnees['contenu']; ?></p>
				<p><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Lire plus...</a></p>
			</div>

		<?php

		}


		$reponse->closeCursor();
		?>
	</div>

</body>


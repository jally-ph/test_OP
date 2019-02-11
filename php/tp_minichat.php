<!--
TP MINICHAT on veut :
	- écrire un pseudo et un message (form)
	- bouton "envoyer"
	- publier ce pseudo et ce messg dans la même page, juste en dessus/dessous
	- partie msg : les 10 derniers messages seulement (LIMIT)
	- partie msg : msg du plus récent au plus ancien
	- mysql : la table doit être composé de 3 champs => ID (auto_increment) [type INT], pseudo [type VARCHAR], message [type VARCHAR]
	- pseudo et message : indiqué la taille maxi du champs (max-lengt: 255)
	- si message + long que 255 : mettre [type TEXT]
- 2 fichiers à utiliser :
minichat.php : contient le formulaire permettant d'ajouter un message et liste les 10 derniers messages ;

minichat_post.php : insère le message reçu avec$_POSTdans la base de données puis redirige versminichat.php.
- htmlspecialchars() pr protéger les chaines

	-->

<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// au cas où il y aurait une erreur à sql
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>TP Mini-chat</title>
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
	<link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">

</head>

<body>
	<div class="banniere_minichat">
		<h1>TP Mini chat</h1>
	</div>

	<div class="form_zonemsg">
		<div class="container">
			
			<div class="logo_minichat">
				<img src="images/favicon.png" >
			</div>

			<form action="minichat_post.php" method="POST" id="id_form_minichat">

				
				
				
				<label>votre pseudo</label>
				<input type="text" name="pseudo" class="form_minichat">

				<label>votre message</label>
				<textarea name="message" rows="5" class="form_minichat"></textarea>

				<input type="submit" name="submit" value="Envoyer le message" class="minichat_submit">

			</form>
		</div>



	<!-- là où s'affiche les messages -->
		<div class="container">
			<div class="zone_msg">
			
			<?php

			// On récupère tout le contenu de la table messages et range par ordre décroissant et on limite le nbre de msg
			$reponse = $bdd->query('SELECT * FROM messages ORDER BY ID DESC LIMIT 0, 5');

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
			    <p class="apparence_msg">
			    <span class="pseudos"><?php echo strip_tags($donnees['pseudo']) ?></span> <br> <span class="messages"><?php echo strip_tags($donnees['message']) ;?></span>
			    <p class="date_minichat"><?php echo $donnees['date'] ?></p>
			   </p>
			<?php
			}

			$reponse->closeCursor(); // Termine le traitement de la requête


			?>

			</div>
		</div>
	</div>




</body>

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
- 

	-->

<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



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
	<link rel="icon" href="images/favicon.jpg" />
</head>

<body>
	<div class="banniere_minichat">
		<h1>TP Mini chat</h1>
	</div>

	<form action="minichat_post.php" method="POST">
		
		<label>votre pseudo</label>
		<input type="text" name="pseudo" class="form_minichat">

		<label>votre message</label>
		<textarea name="message" class="form_minichat msg_minichat"></textarea>

		<input type="submit" name="submit" value="Envoyer le message">

	</form>


<!-- là où s'affiche les messages -->

	<div>
		

	</div>
	




</body>

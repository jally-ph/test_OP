<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


extract($_POST);


//requetes préparées
$req = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES( :pseudo, :message)');

$req->execute(array(
	'pseudo' => $pseudo,
	'message' => $message
	));

header('location:tp_minichat.php');


?>



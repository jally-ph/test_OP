
<!DOCTYPE html>
<html>
<head>
	<title>Exp Reg 1/2</title>
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

<body id="background_express_reg1">

<?php
if (preg_match("#guitare#", "J'aime jouer de la guitare."))
{
    echo 'VRAI';
}
else
{
    echo 'FAUX';
}

//avec option i : devient insensible à la casse!

if (preg_match("#guitare#i", "J'aime jouer de la Guitare."))
{
    echo '<p>VRAI : le mot que vous cherchez est là</p>';
}
else
{
    echo 'FAUX';
}

//avec ou | : si un des 2 est trouvé, renvoie true

if (preg_match("#guitare|piano#i", "J'aime jouer de la Guitare."))
{
    echo '<p>VRAI : un des mots est dans la phrase</p>';
}
else
{
    echo 'FAUX';
}

//début et fin de chaines

if (preg_match("#^Bonjour#i", "bonjour, J'aime jouer de la Guitare."))
{
    echo '<p>VRAI : le mot bonjour est en début de phrase</p>';
}
else
{
    echo 'FAUX';
}

if (preg_match("#Bonjour$#i", "bonjour, J'aime jouer de la Guitare."))
{
    echo '<p>VRAI</p>';
}
else
{
    echo '<p>FAUX : le mot bonjour n\'est pas en fin de phrase</p>';
}

//les classes de caractères

if (preg_match("#gr[ioa]s#i", "La nuit tous les chats sont gris."))
{
    echo '<p>VRAI : au moins un des mots possibles [gris, gras, gros] est présent</p>';
}
else
{
    echo '<p>FAUX : aucun mot possible n\'est présent</p>';
}


if (preg_match("#gr[ioa]s#i", "La nuit tous les chats sont là."))
{
    echo '<p>VRAI : au moins un des mots possibles [gris, gras, gros] est présent</p>';
}
else
{
    echo '<p>FAUX : aucun mot possible n\'est présent</p>';
}


if (preg_match("#[ioae]$#i", "La nuit est tendresse"))
{
    echo '<p>VRAI : au moins un des mots possibles [i o a e] est en fin de phrase</p>';
}
else
{
    echo '<p>FAUX : aucun mot possible n\'est présent</p>';
}


//les intervalles de classe

if (preg_match("#[a-z]$#i", "La nuit est tendressE"))
{
    echo '<p>VRAI : la phrase se termine par une lettre de l\'alphabet</p>';
}
else
{
    echo '<p>FAUX : </p>';
}

if (preg_match("#[a-z0-9]$#i", "La nuit est tendress45"))
{
    echo '<p>VRAI : la phrase se termine par une lettre de l\'alphabet ou par un chiffre</p>';
}
else
{
    echo '<p>FAUX : </p>';
}

if (preg_match("#^[<h1-6>]#", "<h3>La nuit est tendress45</h3>"))
{
    echo '<p>VRAI : la phrase commence par une des balises de titre </p>';
}
else
{
    echo '<p>FAUX : </p>';
}


//exclure des caractères par des classes

if (preg_match("#[^0-9]#", "45"))
{
    echo '<p>VRAI : Si cette phrase s\'affiche c\'est qu\'elle ne comporte pas de chiffres </p>';
}
else
{
    echo '<p>FAUX : Si cette phrase s\'affiche c\'est qu\'elle comporte des chiffres, rien que des chiffres</p>';
}


//les quantificateurs

if (preg_match("#Ay(ay)*#", "Ayayayayayayayay"))
{
    echo '<p>VRAI : Si cette phrase s\'affiche c\'est que ayaya... fonctionne</p>';
}
else
{
    echo '<p>FAUX : Si cette phrase s\'affiche c\'est que ayayay... fonctionne pas</p>';
}


if (preg_match("#jall?y#i", "Mon nom s'écrit Jaly"))
{
    echo '<p>VRAI : Si cette phrase s\'affiche c\'est que jally ou jaly a été trouvé</p>';
}
else
{
    echo '<p>FAUX : </p>';
}


if (preg_match("#^Bla(bla){4}$#", "Blablablabla"))
{
    echo '<p>VRAI : Si cette phrase s\'affiche c\'est que Blablablablabla a été trouvé</p>';
}
else
{
    echo '<p>FAUX : Blablablabla n\'a pas été trouvé</p>';
}


if (preg_match("#e{2,}#", "eeeee"))
{
    echo '<p>VRAI : Si cette phrase s\'affiche c\'est que eeeee a été trouvé</p>';
}
else
{
    echo '<p>FAUX : eeeee n\'a pas été trouvé</p>';
}


if (preg_match("#^[0-9]{6}$#", "148202"))
{
    echo '<p>VRAI : Si cette phrase s\'affiche c\'est que 6 chiffres ont été trouvés</p>';
}
else
{
    echo '<p>FAUX : 6 chiffres n\'ont pas été trouvé</p>';
}

?>
	



</body>
</html>
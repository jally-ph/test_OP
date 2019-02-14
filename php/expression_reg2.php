<!DOCTYPE html>
<html>
<head>
	<title>Exp Reg 2/2</title>
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

<body id="background_express_reg2">

	<?php
	
	//citer des métacaractères

if (preg_match("#\(très\) fatigué#", "Je suis (très) fatigué"))
{
    echo '<p>VRAI : (très) fatigué repéré</p>';
}
else
{
    echo '<p>FAUX : (très) fatigué non repéré</p>';
}


if (preg_match("#\!\!#", "Je suis rassassié !!"))
{
    echo '<p>VRAI : !! repéré</p>';
}
else
{
    echo '<p>FAUX : !! non repéré</p>';
}




?> 


</body>
</html>
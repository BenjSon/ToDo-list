<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

// On envoie l'entête Content-type correcte avec le bon charset
header('Content-Type: text/html;charset=utf-8');

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
	<title>TinyMVC</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>

</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body class="w3-content" style="max-width:1200px">

<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <a href="index.php?view=accueil" class="w3-bar-item w3-button">Accueil</a>
    <h3 class="w3-wide"><b>Ma TDL</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
  	<a href="index.php?view=tâche" class="w3-bar-item w3-button">Ajouter une tâche</a>

    <a href="index.php?view=users" class="w3-bar-item w3-button">Aujourd'hui et demain</a>

    </div>
    
    
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
</nav>




<div id="banniere">

<div id="logo">
<img src="ressources/ec-lille.png" />
</div>


<?php
// Si l'utilisateur n'est pas connecte, on affiche un lien de connexion 
if (!valider("connecte","SESSION"))
	echo "<a href=\"index.php?view=login\" class=\"w3-bar-item w3-button\">Se connecter</a>";
?>

<h1 id="stitre"> To Do List</h1>

</div>

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
	<title>Ma TDL</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_form.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

#addtask {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    -o-font-smoothing: antialiased;
    font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    font-family: "Roboto", Helvetica, Arial, sans-serif;
    font-weight: 100;
    font-size: 12px;
    line-height: 30px;
    color: black;
    background: #81F7F3;
}

#addtask.container {
    max-width: 400px;
    width: 100%;
    margin: 0 0;
    position: relative;
}

#form input[type="text"],
#form textarea,
#form button[type="submit"] {
    font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#form {
    background: #F9F9F9;
    padding: 25px;
    margin: 50px 0;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#form h3 {
    display: block;
    font-size: 30px;
    margin-bottom: 10px;
    position: center;
    font-weight: bold;
    left: 150px;

}

#addtask input {
    border: medium none !important;
    margin: 0 0 10px;
    min-width: 100%;
    padding: 0;
    width: 100%;
}

#form input[type="text"],
#form textarea {
    width: 100%;
    border: 1px solid #ccc;
    background: #FFF;
    margin: 0 0 5px;
    padding: 10px;
}

#form input[type="text"]:hover,
#form textarea:hover {
    -webkit-transition: border-color 0.3s ease-in-out;
    -moz-transition: border-color 0.3s ease-in-out;
    transition: border-color 0.3s ease-in-out;
    border: 1px solid #aaa;
}

#form textarea {
    height: 100px;
    max-width: 100%;
    resize: none;
}

#form input[type="submit"] {
    cursor: pointer;
    width: 100%;
    border: none;
    color: black;
    margin: 0 0 5px;
    padding: 10px;
    font-size: 20px;
}

#form input[type="submit"]:hover {
    background: #81F7F3;
    -webkit-transition: background 0.3s ease-in-out;
    -moz-transition: background 0.3s ease-in-out;
    transition: background-color 0.3s ease-in-out;
}

#form input[type="submit"]:active {
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}





#form input:focus,
#form textarea:focus {
    outline: 0;
    border: 1px solid #aaa;
}

::-webkit-input-placeholder {
    color: #888;
}

:-moz-placeholder {
    color: #888;
}

::-moz-placeholder {
    color: #888;
}

:-ms-input-placeholder {
    color: #888;

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
  	
  	<?php
		// Si l'utilisateur n'est pas connecte, on affiche un lien de connexion 
		if (!valider("connecte","SESSION"))
		echo "<a href=\"index.php?view=login\" class=\"w3-bar-item w3-button\">Se connecter</a>";
	?>
	<!-- <a href="index.php?view=taches" class="w3-bar-item w3-button">Ajouter une tâche</a>
	<a href="index.php?view=today" class="w3-bar-item w3-button">Aujourd'hui et demain</a>
	<a href="index.php?view=important" class="w3-bar-item w3-button">Important</a> -->


	<?php
		// Si l'utilisateur EST connecte, on affiche les liens 
		if (valider("connecte","SESSION")){
			echo "<a href=\"index.php?view=taches\" class=\"w3-bar-item w3-button\">Ajouter une tâche</a>";
            echo "<a href=\"index.php?view=all\" class=\"w3-bar-item w3-button\">Toutes mes tâches</a>";
			echo "<a href=\"index.php?view=today\" class=\"w3-bar-item w3-button\">Aujourd'hui et demain</a>";
			echo "<a href=\"index.php?view=important\" class=\"w3-bar-item w3-button\">Important</a>";
            echo "<a href=\"index.php?view=subjects\" class=\"w3-bar-item w3-button\">Matières et sections</a>";
		}
		
	?>

    </div>
    
    
  </div>
  

</nav>




<div id="banniere">





</div>

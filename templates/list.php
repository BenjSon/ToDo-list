<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=chat&" . $_SERVER["QUERY_STRING"]);
	// Il faut renvoyer le reste de la chaine de requete... 
	// A SUIVRE : ne marche que pour requetes GET
	// Un appel à http://localhost/chatISIG/templates/chat.php?idConv=2
	// renvoie vers http://localhost/chatISIG/index.php?view=chat&idConv=2
	
	die("");
}

include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...
include_once("libs/fonction TDL.php");

//On récupère les informations sur le sujet
$idSubject=getValue("idSubject");
$title=getSubject($idSubject,$_SESSION["idUser"]);

// On affiche le nom du sujet
echo "<h1 style=\"margin-left:250px\">"; 
echo $title;
echo "</h1>"; 

//On récupère les tâches du sujet et on les affiches
$tasks=listTasks($idSubject,$_SESSION["idUser"]);
mkTable($tasks);

 
?>
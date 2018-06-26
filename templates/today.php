<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "conversations.php")
{
	header("Location:../index.php?view=conversations");
	die("");
}

include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...
include_once("libs/fonction TDL.php");


?>

<h2 style="margin-left:250px">Mes tâches d'aujourd'hui : </h2>

<?php
$tasks = TDLtoday($_SESSION["idUser"]);
mkTable($tasks);
?>

<h2 style="margin-left:250px">Mes tâches de demain : </h1>

<?php
$tasks = TDLtmrw($_SESSION["idUser"]);
mkTable($tasks);
?>


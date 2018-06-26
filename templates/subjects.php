<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "subjects.php")
{
	header("Location:../index.php?view=subjects");
	die("");
}

include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...
include_once("libs/fonction TDL.php");


?>

<h1 style="margin-left:250px">Mes matières et sections</h1>
<?php
$subjects = listsubjects($_SESSION["idUser"]);
mkTable($subjects);
//mkLiens($conversations,"theme","id","index.php?view=chat","idConv");
foreach ($subjects as $sub) {	

	
			// Une URL de base : on l'utilise et on la complète 
			// par un paramètre supplémentaire venant de tabData
		$url = "index.php?view=list&idSubject" . urlencode($sub["id_subject"]);

		echo "<a href=\"$url\" >\n"; 
		echo $sub["title"]; 
		echo "</a> <br />\n";
	}
?>

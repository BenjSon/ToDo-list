<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "conversations.php")
{
	header("Location:../index.php?view=conversations");
	die("");
<<<<<<< HEAD
}

include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...



?>

<?php
// Si l'utilisateur n'est pas connecte, on affiche un lien de connexion
if (!valider("connecte","SESSION"))
    echo "<a href=\"index.php?view=login\">Se connecter</a>";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
    <title>TinyMVC</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body >

<div style="margin-left:250px">
=======
}?>
>>>>>>> 318f43cbb64810fc120e22a1fa85bef035ae17b8
    <div>Ajouter une tache</div>
    <form action="/ajout tâche" method="post">
        <div>
            <label for="name">Nom de la tâche:</label>
            <input type="text" id="nom_tache" name="nom_tache" required>
        </div>
        <div>
            <label for="Date">A faire avant le:</label>
            <input type="text" id="mail" name="user_mail" required>
        </div>

        <label for="matière" >Dans quelle matière ?</label>
        <select name="matières" id="matières" required>
            <option value="français">France</option>
            <option value="espagne">Espagne</option>
            <option value="etats-unis">États-Unis</option>
            <option value="chine">Chine</option>
            <option value="japon">Japon</option>
        </select><br />

        <label for="priorité">Quelle priorité?</label>
        <select name="priorité" id="pays" priorité>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        </form>


    </form>
</div>
<<<<<<< HEAD
</div>
</body>
</html>


=======
>>>>>>> 318f43cbb64810fc120e22a1fa85bef035ae17b8

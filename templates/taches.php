<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "conversations.php")
{
	header("Location:../index.php?view=conversations");
	die("");
}

?>



<div style="margin-left:250px" id="addtask" >


    <h3>Ajouter une tache</h3>
    <form action="/ajout tâche" method="post" id="form">
        <div>
            <label for="name">Nom de la tâche:</label>
            <input type="text" id="nom_tache" name="nom_tache" required>
        </div>
        <div>
            <label for="Date">A faire avant le:</label>
            <input type="text" id="mail" name="user_mail" required>
        </div>

        <label for="matière" >Dans quelle matière ?</label>
        <input type="checkbox"
               name="matière 1"
               value="choix1"> matière 1
        <input type="checkbox"
               name="matière 2"
               value="choix2"> matière 2
        <input type="checkbox"
               name="matière 3"
               value="choix3"> matière 3
        <input type="checkbox"
               name="matière 4"
               value="choix4"> matière 4
        <br />

        <label for="priorité">Quelle priorité?</label>
        <select name="priorité" id="pays" priorité>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <input type="submit" value="Envoyer" />


        </form>


    </form>
</div>




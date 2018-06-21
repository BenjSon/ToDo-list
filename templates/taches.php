<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "conversations.php")
{
	header("Location:../index.php?view=conversations");
	die("");
}?>
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
            <option value="Allemand">Espagne</option>
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

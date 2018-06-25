<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

?>

<div id="corps" class="w3-main" style="margin-left:250px">

<h1>Connexion</h1>

<div id="formLogin">
<form action="controleur.php" method="GET">
Login : <input type="text" name="login" /><br />
Passe : <input type="password" name="passe" /><br />
<input type="submit" name="action" value="Connexion" />
</form>
</div>

    <h1>Créer un compte</h1>
    <form action="controleur.php" method="GET">
        Login : <input type="text" name="login" /><br />
        Passe : <input type="password" name="passe" /><br />
        Check pass: <imput type="password" name="passe2"/><br/>
        <input type="submit" name="action" value="Créer compte" />
    </form>




</div>

<?php
// Ce fichier permet de tester les fonctions développées dans le fichier bdd.php (première partie)

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "users.php")
{
	header("Location:../index.php?view=users");
	die("");
}

include_once("libs/modele.php");
include_once("libs/maLibUtils.php"); // tprint

?>

<h1>Administration du site</h1>

<h2>Liste des utilisateurs de la base </h2>

<?php

echo "liste des utilisateurs autorises de la base :"; 
$users = listerUtilisateurs("nbl");
tprint($users);	// préférer un appel à mkTable($users);

echo "<hr />";
echo "liste des utilisateurs non autorises de la base :"; 
$users = listerUtilisateurs("bl");
tprint($users);	// préférer un appel à mkTable($users);

/*
// pseudo du premier utiliseur blacklisté ?
echo $users[0]["pseudo"];

// couleur du second
echo $users[1]["couleur"];

// tous les pseudos 
for($i=0;$i<count($users);$i++) {
	echo "<p>" . $users[$i]["pseudo"] . "</p>";
}

// tous les pseudos 
foreach( $users as $dataNextUser) {
	echo "<p>" . $dataNextUser["pseudo"] . "</p>";
}
*/

?>
<hr />
<h2>Changement de statut des utilisateurs</h2>

<form action="controleur.php">

<select name="idUser">
<?php
$users = listerUtilisateurs();

// préférer un appel à mkSelect("idUser",$users, ...)
// TODO: ajouter 'bl' ou 'nbl' à côté du nom de chaque user 

// 1) récupération de la valeur du dernier utilisateur édité 
// envoyé en chaine de requete avec le nom idLastUser
$identifiantDernierUtilisateur = valider("idLastUser");
// peut valoir false ou un identifiant numérique 

foreach ($users as $dataUser)
{
	// 2) à chaque itération, Est-ce le dernier manipulé ? 
	// si oui, on le présélectionne

	/// ATTENTION : dans certains cas, 
	// $identifiantDernierUtilisateur est false 
	// OR, (false == 0) est vrai 
	// Pas grave car les identifiants sont des champs auto-incrémentés
	// dont les valeurs commencent à 1 
	// Pour distinguer le booléen false de la valeur numérique 0 : 
	// utiliser l'opérateur === compare les types, puis les valeurs  
	// (false === 0) est faux 

	if ($identifiantDernierUtilisateur == $dataUser["id"])
		$s = "selected"; 
	else $s = "";

	echo "<option $s value=\"$dataUser[id]\">\n";
	echo  $dataUser["pseudo"];

	if ($dataUser["blacklist"]) echo " - bl"; 
	else echo " - nbl"; 

	echo "\n</option>\n"; 
}
?>
</select>

<input type="submit" name="action" value="Interdire" />
<input type="submit" name="action" value="Autoriser" />
</form>







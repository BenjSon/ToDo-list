<?php

/*
Dans ce fichier, on définit diverses fonctions permettant de récupérer des données utiles pour notre TP d'identification. Deux parties sont à compléter, en suivant les indications données dans le support de TP
*/


/********* EXERCICE 2 : prise en main de la base de données *********/


// inclure ici la librairie faciliant les requêtes SQL (en veillant à interdire les inclusions multiples)

include_once("libs/maLibSQL.pdo.php");

function listerUtilisateurs($classe = "both") {
	// Cette fonction liste les utilisateurs de la base de données 
	// et renvoie un tableau d'enregistrements. 
	// Chaque enregistrement est un tableau associatif contenant les champs 
	// id,pseudo,blacklist,couleur

	// Lorsque la variable $classe vaut "both", elle renvoie tous les utilisateurs
	// Lorsqu'elle vaut "bl", elle ne renvoie que les utilisateurs blacklistés
	// Lorsqu'elle vaut "nbl", elle ne renvoie que les utilisateurs non blacklistés

	$SQL = "SELECT * FROM users";
	if ($classe == "bl") $SQL = $SQL . " WHERE blacklist=1";
	if ($classe == "nbl") $SQL .= " WHERE blacklist=0";

	return parcoursRs(SQLSelect($SQL));
}

function interdireUtilisateur($idUser) {
	// cette fonction affecte le booléen "blacklist" à vrai 
	// DANGER !! Attention aux injections SQL !!!
	// HYP : $idUser ne peut pas contenir d'apostrophes
	// Elles ont été banalisées par la fonction addslashes auparavant
	// MIEUX : utiliser des requêtes préparées !!
	$SQL = "UPDATE users SET blacklist = 1 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function autoriserUtilisateur($idUser) {
	// cette fonction affecte le booléen "blacklist" à faux 
	$SQL = "UPDATE users SET blacklist = 0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function verifUserBdd($login,$passe)
{
    // Vérifie l'identité d'un utilisateur
    // dont les identifiants sont passes en paramètre
    // renvoie faux si user inconnu
    // renvoie l'id de l'utilisateur si succès
    $SQL = "SELECT id_user FROM users WHERE login='$login' AND password='$passe'";
    return SQLGetChamp($SQL);
}

	// On utilise SQLGetCHamp

function compterUtilisateurs(){
    $SQL ="SELECT COUNT * FROM users";
    return SQLGetChamp($SQL);

}

function addUser($login,$passe){
$SQL="INSERT INTO users(id_user,name,login,password) VALUES (5,'Bonjour','$login','$passe')";
return SQLGetCHamp($SQL);
}

function getConversation($idConv)
{	
	// Récupère les données de la conversation (theme, active)
	$SQL = "SELECT theme, active FROM conversations WHERE id='$idConv'";
	$listConversations = parcoursRs(SQLSelect($SQL));

	// Attention : parcoursRS nous renvoie un tableau contenant potentiellement PLUSIEURS CONVERSATIONS
	// Il faut renvoyer uniquement la première case de ce tableau, c'est à dire la case 0 
	// OU false si la conversation n'existe pas
	 
	if (count($listConversations) == 0) return false;
	else return $listConversations[0];
}

?>

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
    $SQL ="SELECT COUNT(id_user) FROM users";
    return SQLGetChamp($SQL)+1;

}

function compterConcern(){
    $SQL ="SELECT COUNT(id_concern) FROM concern";
    return SQLGetChamp($SQL)+1;
}
function compterTache(){
    $SQL ="SELECT COUNT(id_tasks) FROM tasks";
    return SQLGetChamp($SQL)+1;
}

function addUser($nb, $nom,$login,$passe){
    $SQL="INSERT INTO users(id_user,name,login,password) VALUES ('$nb','$nom','$login','$passe')";
    return SQLGetCHamp($SQL);
}

function addTask($nbtache,$nbconcern,$deux,$trois,$quatre,$idUser){
    $SQL="INSERT INTO tasks(id_task,title,date_end,priority, id_user) VALUES ('$nbtache','$deux','$trois','$quatre','$idUser')";
    $SQL="INSERT INTO concern(id_junction,id_task,id_subject) VALUES('$nbconcern','$nbtache','$idUser')";
    return SQLGetChamp($SQL);
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

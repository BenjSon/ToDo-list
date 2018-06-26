<?php
include_once "maLibUtils.php";
include_once "maLibSQL.php";

function recupTodo() {

	$SQL = "SELECT * FROM tasks";
	return parcoursRs(SQLSelect($SQL));
}


function compterUtilisateurs(){
    $SQL ="SELECT COUNT * FROM users";
    return SQLGetChamp($SQL)+1;

}
$nb=compterUtilisateurs();

function addUser($nb, $nom,$login,$passe){
    $SQL="INSERT INTO users(id_user,name,login,password) VALUES ('$nb','$nom','$login','$passe')";
    return SQLGetCHamp($SQL);
}










?>
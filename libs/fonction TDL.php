<?php
include_once "maLibUtils.php";
include_once "maLibSQL.php";

function recupTodo() {

	$SQL = "SELECT * FROM tasks";
	return parcoursRs(SQLSelect($SQL));
}








?>
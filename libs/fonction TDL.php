<?php
include_once "maLibUtils.php";
include_once "maLibSQL.php";

function TDLimportant($idUser) {

	$SQL = "SELECT title,date_end FROM tasks WHERE id_user='$idUser' AND priority='4' ORDER BY date_end DESC";
	return parcoursRs(SQLSelect($SQL));
}








?>
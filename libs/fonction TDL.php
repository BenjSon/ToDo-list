<?php
include_once "maLibUtils.php";
include_once "maLibSQL.php";

function TDLimportant($idUser) {

	$SQL = "SELECT title AS 'Libellé tâche' ,date_end as 'Deadline' FROM tasks WHERE id_user='$idUser' AND priority='4' ORDER BY date_end DESC";
	return parcoursRs(SQLSelect($SQL));
}

function TDLtoday($idUser) {
	$date=date("Y-m-d");

	$SQL = "SELECT title AS 'Libellé tâche' ,date_end as 'Deadline',priority as'Priorité' FROM tasks WHERE id_user='$idUser' AND date_end='$date' ORDER BY priority DESC";
	return parcoursRs(SQLSelect($SQL));
}

function TDLtmrw($idUser) {
	$tmrw = date('Y-m-d', strtotime('+1 day'));

	$SQL = "SELECT title AS 'Libellé tâche' ,date_end as 'Deadline',priority as'Priorité' FROM tasks WHERE id_user='$idUser' AND date_end='$tmrw' ORDER BY priority DESC";
	return parcoursRs(SQLSelect($SQL));
}
function TDLall($idUser) {
	$SQL = "SELECT title AS 'Libellé tâche' ,date_end as 'Deadline',priority as'Priorité' FROM tasks WHERE id_user='$idUser'  ORDER BY date_end DESC,priority DESC";
	return parcoursRs(SQLSelect($SQL));
}





?>
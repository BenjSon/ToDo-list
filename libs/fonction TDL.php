<?php
include_once "maLibUtils.php";
include_once "maLibSQL.pdo.php";

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
function TDLall2($idUser) {
	$SQL = "SELECT title AS 'Libellé tâche' ,date_end as 'Deadline',priority as'Priorité' FROM tasks WHERE id_user='$idUser'  ORDER BY date_end DESC,priority DESC";
	return parcoursRs(SQLSelect($SQL));
}

function TDLall($idUser) {
	$SQL = "SELECT subjects.title AS 'Matière ou Section',tasks.title AS 'Libellé tâche' ,tasks.date_end as 'Deadline',tasks.priority as'Priorité' FROM tasks JOIN concern ON concern.id_task=tasks.id_task JOIN subjects ON subjects.id_subject=concern.id_subject WHERE tasks.id_user='$idUser' ORDER BY subjects.title, tasks.date_end DESC,tasks.priority DESC";
	return parcoursRs(SQLSelect($SQL));
}

function listsubjects($idUser){
	$SQL = "SELECT DISTINCT subjects.id_subject,subjects.title FROM subjects JOIN concern ON subjects.id_subject=concern.id_subject JOIN tasks ON tasks.id_task=concern.id_task WHERE tasks.id_user='$idUser' ORDER BY subjects.title";
	return parcoursRs(SQLSelect($SQL));
}

function getSubject($idSub,$idUser){
	$SQL = "SELECT title FROM subjects WHERE id_subject='$idSub'";
	return SQLGetCHamp($SQL);
}


function listTasks($idSub,$idUser){
	$SQL = "SELECT tasks.title,tasks.date_end, tasks.priority FROM tasks JOIN concern ON concern.id_task=tasks.id_task JOIN subjects ON subjects.id_subject=concern.id_subject WHERE tasks.id_user='$idUser' AND subjects.id_subject='$idSub' ORDER BY tasks.priority DESC";
	return parcoursRs(SQLSelect($SQL));
}

function listLibelleTask($idUser){
	$SQL = "SELECT tasks.title FROM tasks JOIN concern ON concern.id_task=tasks.id_task JOIN subjects ON subjects.id_subject=concern.id_subject WHERE tasks.id_user='$idUser' ORDER BY tasks.priority DESC";
	return parcoursRs(SQLSelect($SQL));
}

?>
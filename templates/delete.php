<?php
// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "delete.php")
{
	header("Location:../index.php?view=delete");
	die("");
}

include_once"libs/fonction TDL.php";
include_once "libs/maLibForms.php";
//$tab=[1,2,3,4];

$tab=listLibelleTask($_SESSION["idUser"]);
mkTable($tab);

?>



<div>
	<form action="controleur.php" style="margin-left:250px" method="POST">
		<h3>choisissez la tâche à supprimer</h3>
		
		<select name="tache" id="choixDelete" value="tache:">
      		
      		<?php
      
      		foreach ($tab as $task) {
				echo "<option value=".$task['id_task'].">".$task['title']."</option>";   
					   		 
	   		 }

      		?>

        </select></br></br>

        <input type="submit" name="action" value="supprimer">
        </br></br>
		
	</form>
</div>
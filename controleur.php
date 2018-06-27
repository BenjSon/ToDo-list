<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$qs = "";




// fonction valider("nom") 
// vérifie la présence de "nom" dans le tableau $_REQUEST
// if (isset($_REQUEST["nom"]))
// ET que la valeur associée est non vide
// if ($_REQUEST["nom"] != "") 
// Si c'est le cas, elle renvoie la valeur après avoir banalisé 
// les caractères spéciaux SQL qu'elle contenait 
// Si ce n'est pas le cas, elle renvoie FAUX 

// ATTENTION : on utilise ici un opérateur d'affectation 
// et pas de comparaison !!!
// la valeur d'une affectation,  c'est la valeur affectée 

// EQUIVALENT à : 
// 1) $action = valider("action")
// 2) if ($action) { ...

	if ($action = valider("action")) {
        ob_start();

        echo "Action = '$action' <br />";

        // ATTENTION : le codage des caractères peut poser PB
        // si on utilise des actions comportant des accents...
        // A EVITER si on ne maitrise pas ce type de problématiques

        /* TODO: exercice 4
        // Dans tous les cas, il faut etre logue...
        // Sauf si on veut se connecter (action == Connexion)

        if ($action != "Connexion")
            securiser("login");
        */

        // Un paramètre action a été soumis, on fait le boulot...
        switch ($action) {

            // Interdire, Autoriser ///////////////////////////////////////

            case 'Interdire' :
                // récup idUser
                // SI (idUser est non vide)
                if ($idUser = valider("idUser")) {
                    // appeler la fonction métier interdireUtilisateur
                    // (couche modele)
                    interdireUtilisateur($idUser);
                }
                // sélectionner la prochaine vue : users
                // on lui envoie l'id de l'utilisateur
                // qui vient d'être manipulé
                $qs = "?view=users&idLastUser=$idUser";
                break;

            case 'Autoriser' :
                if ($idUser = valider("idUser")) autoriserUtilisateur($idUser);
                $qs = "?view=users&idLastUser=$idUser";
                break;


            // Connexion //////////////////////////////////////////////////

            case 'Connexion' :
                // On verifie la presence des champs login et passe
                $qs = "?view=login&msg=" . urlencode("Identifiant(s) absent(s)");
                if ($login = valider("login"))
                    if ($passe = valider("passe"))
                    {
                        // On verifie l'utilisateur,
                        // et on crée des variables de session si tout est OK
                        // Cf. maLibSecurisation
                        if (!verifUser($login,$passe)) {
                            $qs = "?view=login&msg=" . urlencode("Identifiants incorrects");
                        }
                        else $qs = "?view=login";
                    }
                break;

            case 'Logout' :
                session_destroy();
                $qs = "?view=login";
                break;

            case 'creer':

                $confirm = $_POST['confirm_pass'];
                $_SESSION["login"] = $_POST['login'];
                $_SESSION["passe"] = $_POST['passe'];
                $_SESSION["nom"] = $_POST['nom'];

                $nb = compterUtilisateurs();

                if ($_SESSION["login"] = valider("login"))
                    if ($_SESSION["passe"] = valider("passe"))
                        if ($_SESSION["passe"] == $confirm) {
                            addUser($nb, $_SESSION["nom"], $_SESSION["login"], $_SESSION["login"]);
                        }

                break;

            case 'addtask':
                $nbconcern = compterConcern();
                $nbtache= compterTache();
                $_SESSION['titre']=$_POST['title'];
                $_SESSION['date']=$_POST['date'];
                $matiere1=$_POST['matière1'];
                $matiere2=$_POST['matière2'];
                $matiere3=$_POST['matière3'];
                $matiere4=$_POST['matière4'];

                $_SESSION['priorite']=$_POST['priorite'];

                addTask($nbtache,$nbconcern, $_SESSION['titre'],$_SESSION['date'],$_SESSION['priorite'],$idUser);



        }






    }




	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $qs);
	//qs doit contenir le symbole '?'

	// On écrit seulement après cette entête
	ob_end_flush();

?>
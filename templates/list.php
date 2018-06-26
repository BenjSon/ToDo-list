<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=chat&" . $_SERVER["QUERY_STRING"]);
	// Il faut renvoyer le reste de la chaine de requete... 
	// A SUIVRE : ne marche que pour requetes GET
	// Un appel à http://localhost/chatISIG/templates/chat.php?idConv=2
	// renvoie vers http://localhost/chatISIG/index.php?view=chat&idConv=2
	
	die("");
}

include_once("libs/modele.php");
include_once("libs/maLibUtils.php");
include_once("libs/maLibForms.php");


// On récupère l'id de la conversation à afficher, dans idConv
$idSub = getValue("id_subject");
if (!$idConv)
{
	// pas d'identifiant ! On redirige vers la page de choix de la conversation

	// NB : pose quelques soucis car on a déjà envoyé la bannière... 
	// Il y a opportunité d'écrire cette bannière plus tard si on la place en absolu
	header("Location:index.php?view=conversations"); 
	die("idConv manquant");
}

// On récupère les paramètres de la conversation
$dataConv = getConversation($idConv); 
if (!$dataConv)
{
	// La conversation n'existe pas ! 
	header("Location:index.php?view=conversations");
	die("La conversation n'existe pas ");
}

// Afficher le thème de la conversation courante

//tprint($dataConv);
echo "<h1>"; 
echo $dataConv["theme"]; 
echo "</h1>"; 

// Les messages 
$messages = listerMessages($idConv);

foreach($messages as $dataMessage) {
	echo '<div style="color:' . $dataMessage["couleur"] . ';">';
	echo "[" . $dataMessage["auteur"] . "] " ;
	echo $dataMessage["contenu"];
	echo "</div>\n"; 
}

// Ajout d'un message ?
// Seulement si la conversation est active 
if ($dataConv["active"])
if (valider("connecte","SESSION")) {
	mkForm("controleur.php"); 
	mkInput("text","contenu");
	mkInput("hidden","idConv",$idConv); //permet d'envoyer l'identifiant de la conversation au serveur
	// pas besoin d'envoyer l'auteur du message car pour poster il faut être connecté! donc on trouve l'auteur du message dans SESSION 
	mkInput("hidden","action","Poster"); // vérifie si l'utilsateur est connecté et la conversation active
	mkInput("submit","","OK");
	endForm();
}
 
// et si l'utilisateur est identifié ... 
// Si la conversation est active, on écrit un peu de code javascript pour recharger la page régulièrement
?>


<script>

// DANS 10 SECONDES, Raffraichir la page
	window.setTimeout(fnReload,10000); //timeout est en ms

	function fnReload(){
		document.location.reload();
	}

// le pb: si le reload s'effectue au moment où on écrit, le message qu'on était en train d'écrire disparait!!
//Solution? WEB1.0: balise <ifrain> / WEB2.0 : ajax avec appel d'une fonction javascript, req HTTP asynchrone, réponse flux de données / HTML5 : API websocket, connexion permanente entre client et serveur (apache pas le mieux)


</script>

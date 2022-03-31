<?php
include('template.php');
include('./Connection.php');


if( !empty($_GET['nom']) ){

	$requete = $pdo->prepare("DELETE FROM `utilisateur` WHERE `nom` = :nom");
	$requete->bindParam(':nom', $_GET['nom']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le client est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}
reponse_json($success, $data);

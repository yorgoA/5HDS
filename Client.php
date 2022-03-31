<?php 
include('template.php');
include('./Connection.php');


if( !empty($_GET['nom']) ){
	$requete = $pdo->prepare("SELECT * FROM `utilisateur` WHERE `nom` LIKE :nom");
	$requete->bindParam(':nom', $_GET['nom']);
} else {
	$requete = $pdo->prepare("SELECT * FROM `utilisateur`");
}


if( $requete->execute() ){
	$resultats = $requete->fetchAll();	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['utilisateur'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

//reponse_json($success, $data);
echo json_encode($data);

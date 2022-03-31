<?php 
include('./template.php');
include('./Connection.php');


if( !empty($_GET['nom']) ){
	$requete = $pdo->prepare("SELECT * FROM `produit` WHERE `nom` LIKE :nom");
	$requete->bindParam(':nom', $_GET['nom']);
} else {
	$requete = $pdo->prepare("SELECT * FROM `produit`");
}


if( $requete->execute() ){
	$resultats = $requete->fetchAll();	
	$success = true;
} else {
	$msg = "Une erreur s'est produite";
}

//reponse_json($success, $data);
echo json_encode($resultats);


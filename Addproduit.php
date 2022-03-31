<?php
include('template.php');
include('./FunctionToken.php');
include('./Connection.php');

if( !empty($_GET['nom']) && !empty($_GET['description']) && !empty($_GET['prix']) && !empty($_GET['stock']) && !empty($_GET['reference']) && !empty($_GET['created_at']) && !empty($_GET['update_at'])  ){
	//Si toutes les données sont saisie par le client

	$requete = $pdo->prepare("INSERT INTO `produit` (`id`, `nom`, `description`, `token`, `prix`, `stock`,`reference`,`created_at`,`update_at`) VALUES (NULL, :nom, :description, token, :prix, :stock,:reference,:created_at,:update_at);");
	$requete->bindParam(':nom', $_GET['nom']);
	$requete->bindParam(':description', $_GET['description']);
	$requete->bindParam(':prix', $_GET['prix']);
	$requete->bindParam(':stock', $_GET['stock']);
    $requete->bindParam(':reference', $_GET['reference']);
    $requete->bindParam(':token', $_GET['token']);


    $requete->bindParam(':created_at', $_GET['created_at']);

    $requete->bindParam(':update_at', $_GET['update_at']);


	if( $requete->execute() ){
		$success = true;
		$msg = 'Le produit a bien été ajouté';
	} else {
		$msg = "Le produit a bien été ajouté";
	}
} else {
	$msg = "Il manque des informations";
}

//reponse_json($success, $data);
echo json_encode($msg);
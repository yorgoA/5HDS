<?php
include('template.php');
include('./FunctionToken.php');
include('./Connection.php');


if( !empty($_GET['nom']) ){

    $sql = "UPDATE produit SET nom=:nom, description=:description, prix=:prix , stock=:stock, reference=:reference, token=:token ,update_at=:update_at WHERE id=:id";
    $requete = $pdo->prepare($sql);

    $requete->bindParam(':nom', $_PUT['nom']);
	$requete->bindParam(':description', $_PUT['description']);
	$requete->bindParam(':prix', $_PUT['prix']);
	$requete->bindParam(':stock', $_PUT['stock']);
    $requete->bindParam(':reference', $_PUT['reference']);
    $requete->bindParam(':token', $_PUT['token']);


    $requete->bindParam(':created_at', $_PUT['created_at']);

    $requete->bindParam(':update_at', $_PUT['update_at']);



	if( $requete->execute() ){
		$success = true;
		$msg = 'Le produit a bien été modifié';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}
//reponse_json($success, $data);
echo json_encode($msg);
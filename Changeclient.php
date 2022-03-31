<?php
include('template.php');
include('./FunctionToken.php');
include('./Connection.php');


if( !empty($_GET['nom'])){
    $sql = "UPDATE utilisateur SET nom=:nom, token=:token,role=:role ,update_at=:update_at WHERE id=:id";
    $requete = $pdo->prepare($sql);
	$requete->bindParam(':nom', $_GET['nom']);
	$requete->bindParam(':prenom', $_GET['prenom']);
    $requete->bindParam(':token', $_GET['token']);

	$requete->bindParam(':role', $_GET['role']);
    
    $requete->bindParam(':created_at', $_GET['created_at']);

    $requete->bindParam(':update_at', $_GET['update_at']);



	if( $requete->execute() ){
		$success = true;
		$msg = 'Le client a bien été modifié';
	} else {
		$msg = "Le client n'a pas bien été modifié";
	}
} else {
	$msg = "Il manque des informations";
}
//reponse_json($success, $data);
echo json_encode($msg);
<?php
include('template.php');
include('./FunctionToken.php');
include('./Connection.php');
if( !empty($_GET['nom']) && !empty($_GET['prenom']) && !empty($_GET['role'])  && !empty($_GET['created_at']) && !empty($_GET['update_at'])  ){

	$requete = $pdo->prepare("INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `token`, `role`,`created_at`,`update_at`) VALUES (NULL, :nom, :prenom, :token ,:Rrole,:created_at,:update_at)");
	$requete->bindParam(':nom', $_GET['nom']);
	$requete->bindParam(':prenom', $_GET['prenom']);
    $requete->bindParam(':token', $_GET['token']);

	$requete->bindParam(':Rrole', $_GET['role']);
    
    $requete->bindParam(':created_at', $_GET['created_at']);

    $requete->bindParam(':update_at', $_GET['update_at']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le client a bien été ajouté';
	} else {
		$msg = "Le client a bien été ajouté";
	}
} else {
	$msg = "Il manque des informations";
}

//reponse_json($success, $data);
echo json_encode($msg);

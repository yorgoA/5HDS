<?php
$hote = '127.0.0.1';
$nom_bdd = 'examen';
$utilisateur = 'root';
$mot_de_passe ='';
$pdo ;
try {
    $pdo = new PDO('mysql:host='.$hote.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe);

} catch(Exception $e) {
	reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();

}
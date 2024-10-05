<?php

session_start();

if (isset($_GET['gestion'])&& isset($_GET['id'])) {
    $gestion = $_GET['gestion'];
    $id= $_GET['id'];
    include('connex.inc.php');
    $pdo = connexion('base.db');
    try {

        if(strcmp($gestion,"membre")==0){
            $stmt = $pdo->prepare("DELETE FROM users WHERE pseudo LIKE :ps");
            $stmt->bindParam(':ps',$id);
            $stmt->execute();
        }
        if(strcmp($gestion,"anime")==0){
            $stmt = $pdo->prepare("DELETE FROM anime WHERE nom LIKE :nom");
            $stmt->bindParam(':nom',$id);
            $stmt->execute();
        }
        if(strcmp($gestion,"commentaire")==0){
            $stmt = $pdo->prepare("DELETE FROM comment  WHERE id LIKE :id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
        }
    } 
    catch (PDOException $e) {
        echo 'Erreur supp';
        die();
    }
}
header("Location:gestion.php?gestion=".$gestion."");

?>
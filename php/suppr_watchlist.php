<?php

session_start();

if (isset($_GET['nom'])) {
    $nom = $_GET['nom'];
    include('connex.inc.php');
    $pdo = connexion('base.db');
    try {
        $stmt = $pdo->prepare("DELETE FROM watchlist WHERE anime LIKE :nom AND pseudo LIKE :ps");
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':ps',$_SESSION['pseudo']);
        $stmt->execute();      
    } 
catch (PDOException $e) {
        echo 'Erreur supp';
        die();
    }
}
 header('Location:watchlist.php');

    ?>
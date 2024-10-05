<?php
  session_start();
?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
    <meta charset="utf-8" />
    <title>Gestion</title>
	</head>

        <body>
          <form style="display: inline" action="site.php" method="get">
            <button>Accueil</button>
          </form>

    <br>

  <?php

         if(isset($_SESSION['pseudo']) && isset($_SESSION['statut'])){
             if(strcmp($_SESSION['statut'],"1")!=0){
                 echo "<p>Vous n'avez pas le droit d'accéder à cette page.</p>";
             }
             else{
                  echo" <form style=\"display: inline\" action=\"gestion.php?gestion=membre\" method=\"post\">
      <button>Membres</button>
      </form>";
                  echo" <form style=\"display: inline\" action=\"gestion.php?gestion=anime\" method=\"post\">
      <button>Animes</button>
      </form>";
                  echo" <form style=\"display: inline\" action=\"gestion.php?gestion=commentaire\" method=\"post\">
      <button>Commentaires</button>
      </form>";

                 
                
                  if(isset($_GET['gestion'])){

                     include_once("connex.inc.php");
                     $pdo = connexion("base.db");
    
                     //var_dump($_GET['nom']);
                     try{
                         $gestion=$_GET['gestion'];
                         if(strcmp($gestion,"membre")==0){
                             $req=$pdo->prepare("SELECT * FROM users");
                             $req->execute();
                             $user=$req->fetchAll();
                             foreach($user as $us){
                                 echo "<br>";
                                 echo $us['pseudo'];
                                 echo "<a href=\"suppr_gestion.php?gestion=".$gestion."&amp;id=".$us['pseudo']."\"> <button type=\"button\">Supprimer</button></a>";
                             }
                         }
                         if(strcmp($gestion,"anime")==0){
                             $req=$pdo->prepare("SELECT * FROM anime");
                             $req->execute();
                             $anime=$req->fetchAll();
                             foreach($anime as $an){
                                 echo "<br>";
                                 echo $an['nom'];
                                 echo "<a href=\"suppr_gestion.php?gestion=".$gestion."&amp;id=".$an['nom']."\"> <button type=\"button\">Supprimer</button></a>";
                             }
                         }
                         if(strcmp($gestion,"commentaire")==0){
                             $req=$pdo->prepare("SELECT * FROM comment");
                             $req->execute();
                             $com=$req->fetchAll();
                             foreach($com as $c){
                                 echo "<br>";
                                 echo $c['nom']."<br>";
                                 echo $c['anime']."<br>";
                                 echo $c['comment'];

                                 echo "<a href=\"suppr_gestion.php?gestion=".$gestion."&amp;id=".$c['id']."\"> <button type=\"button\">Supprimer</button></a>";
                             }
                         }   
                     }
                     catch (PDOException $e) {
                         echo "Probleme dans gestion.php";
                         die();
                     }
                 }
                 else{
                     echo " Bienvenue dans la page de gestion ";

                 }
                

             } 
         }
         else{
             echo "<p>Vous n'avez pas le droit d'accéder à cette page.</p>";

         }

?>

  </body>
</html>
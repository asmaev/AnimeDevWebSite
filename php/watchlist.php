<?php
session_start();
?>

<!DOCTYPE HTML>
    <html lang ="fr">
    <head>
    <meta charset="utf-8" />
    <title>WatchList</title>
    <link rel="stylesheet" href="css/watchlist.css">     
    </head>
    <body class="fond">
   <form style="display: inline" action="site.php" method="get">
            <button>Accueil</button>
          </form>
      
    <div class="watch_list">

    <?php
              
     if((isset($_SESSION['pseudo']))){
         include_once("connex.inc.php");
         $pdo = connexion("base.db");
         if(isset($_GET['nom'])){
             //var_dump($_GET['nom']);
             try{
                 $req=$pdo->prepare("INSERT INTO watchlist (pseudo,anime) VALUES (:ps,:anime)");
                 $req->bindParam(':ps',$_SESSION['pseudo']);
                 $req->bindParam(':anime',$_GET['nom']);
                 $req->execute();
             }
             catch (PDOException $e) {
                 echo "Probleme dans page.php";
                 die();
             }
             
         }
         try{
            
             $req = $pdo->prepare("SELECT * FROM watchlist WHERE pseudo LIKE :ps");
             $req->bindParam(':ps', $_SESSION['pseudo']);
             $req->execute();
             $res = $req->fetchAll();
             // var_dump($res);
             if(count($res)==0){
                 echo "<p style=\"text-indent: 35%\"> Votre watchlist est vide </p>";
             }
            
             foreach($res as $r){
                 $req = $pdo->prepare("SELECT * FROM anime WHERE nom LIKE :anime ");
                 $req->bindParam(':anime', $r[1]);
                 $req->execute();
                 $an = $req->fetchAll();
                 $img="image/".$an[0][1].".jpg";

                 // echo "<div>";
                 echo "<div class=\"image\" style=\"float: left\">";
                 echo "<img src=".$img." alt='' height='200' width='150'>";
                 echo "</div>";
       
                 echo "<br><div class=\"nom_anime\">";
                 echo $an[0][0]."<br><br><br><br><br><br><br><br><br></a>";
                 echo "<a href=\"suppr_watchlist.php?nom=".$an[0][0]."\"> <button type=\"button\">Supprimer</button></a>";
                 echo "<hr>";
                 echo "</div>";
               

             }
           
         }
         catch (PDOException $e) {
             echo "Probleme dans watchlist.php";
             die();
         } 
     }
     else{
         echo "Vous devez être connecté pour accéder a cette page";
     }
?>
    </div>
</body>
</html>
<?php
session_start();
  
function afficheFormulaireComment($p){
    $c="<form method=\"post\">";
    $c.="<p><label for=\"commentaire\">Commentaire : <br><textarea id=\"commentaire\" name=\"com\" value=\"".$p."\" rows=\"5\" cols=\"80\" maxlength=\"300\" required></textarea></label>";
    $c.="<br><a><input class=\"btn\" type=\"submit\" value=\"Commenter\" /></p>";
    $c.="</form>";
    echo $c;
}

function noter(){
    $c="<form method=\"post\">";
    $c.="<select name=\"note\"><option value=\"1\">1</option><option value=\"2\">2</option>o<option value=\"3\">3</option><option value=\"4\">4</option><option value=\"5\">5</option></select>";
    $c.="<br><a><input class=\"btn\" type=\"submit\" value=\"Noter\" /></p>";
    $c.="</form>";
    echo $c;
}

?>




<!DOCTYPE HTML>
    <html lang="fr">
<head>
<meta charset="utf-8" />
             <title>Page anime</title>
        <link rel="stylesheet" href="css/page.css">     
           </head>
<body class="fond_page">
   <form style="display: inline" action="site.php" method="get">
            <button>Accueil</button>
          </form>
     
           <div class="page_anime">
    <?php
      $nom=$_GET['nom'];
      
      
      include_once("connex.inc.php");
      $pdo = connexion("base.db");
      
        try{
            
            $sql = $pdo->query("SELECT * FROM anime WHERE nom = '".$nom."'");
            $an=$sql->fetchAll();
            $im="image/".$an[0][1].".jpg";
            
            echo "<div>";
            echo"<div class=\"img_a\" style=\"float: left\"> ";
            echo "<img src=".$im." alt='' height='300' width='200' >";
            echo"</div>";
            echo"<div>";
            echo "<br><b>Titre : </b>".$an[0][0]."<br>";
            echo "<br><b>Type : </b>".$an[0][2]."<br>";
            echo "<br><b>Nombre d'episodes : </b>".$an[0][3]."<br>";
            echo "<br><b>Année : </b>".$an[0][4]."<br>";       
            echo "<br><b>Note : </b>".$an[0][5]."<br>";

            $req=$pdo->prepare("SELECT * FROM note WHERE pseudo = :ps AND anime = :anime");
            $req->bindParam(':ps',$_SESSION['pseudo']);
            $req->bindParam(':anime',$_GET['nom']);
            $req->execute();
            $res = $req->fetchAll();
            
            if(count($res)==0){
                if(isset($_POST['note'])){

                    $req=$pdo->prepare("INSERT INTO note VALUES (:ps,:anime,:note)");
                    $req->bindParam(':ps',$_SESSION['pseudo']);
                    $req->bindParam(':anime',$_GET['nom']);
                    $req->bindParam(':note',$_POST['note']);
                    $req->execute();

                    $req=$pdo->prepare("SELECT AVG(note) FROM note WHERE anime = :anime");
                    $req->bindParam(':anime',$_GET['nom']);
                    $req->execute();
                    $note = $req->fetchAll();
                    $req=$pdo->prepare("UPDATE anime SET note=:note WHERE nom=:nom");
                    $req->bindParam(':note',$note[0][0]);
                    $req->bindParam(':nom',$_GET['nom']);
                    $req->execute();
                    header('Location:page.php?nom='.$_GET['nom'].'');
                    
                }else{
                    if(isset($_SESSION['pseudo'])){
                        noter();
                    }
                }
            }
            
            echo "</div>";
            echo "</div>";
            echo "<div class=\"resume\">";
            echo "<hr>";
            echo "<h4>Résumé :</h4>";
            echo $an[0][6];
            echo "</div>";
            echo "<hr>";
            
            //<input type=\"text\" id=\"commentaire\" required/>";
        }
        
catch (PDOException $e) {
    echo "Probleme dans page.php";
    die();
}
        
if(isset($_SESSION['pseudo'])){

    try{
        $sql = $pdo->prepare("SELECT * FROM watchlist WHERE pseudo = :ps AND anime = :anime");
        $sql->bindParam(':ps',$_SESSION['pseudo']);
        $sql->bindParam(':anime',$nom);
        $sql->execute();
        $results=$sql->fetchAll(); 
        if(count($results)==0){
            echo "<a href=\"watchlist.php?nom=".$nom."\"><button type=\"button\" >WatchList</button></a>";
                        
        }
    }
    catch (PDOException $e) {
        echo "Probleme dans page.php";
        die();
    }

    afficheFormulaireComment ("Commentaire");
    if(isset($_POST['com'])){
        $com=trim($_POST['com']);
        
        try{
            $req=$pdo->prepare("SELECT * FROM comment WHERE nom = :ps AND anime = :anime AND comment = :com ");
            $req->bindParam(':ps',$_SESSION['pseudo']);
            $req->bindParam(':anime',$nom);
            $req->bindParam(':com',$com);
            $req->execute();
            $results = $req->fetchAll();

            $stmt=$pdo->query("SELECT * FROM comment");
            $cm=$stmt->fetchAll();
            $id=count($cm);
            if(count($results)==0){
                $req=$pdo->prepare("INSERT INTO comment (id,nom,anime,comment) VALUES (:id,:nom,:anime,:com)");
                $req->bindParam(':nom',$_SESSION['pseudo']);
                $req->bindParam(':anime',$nom);
                $req->bindParam(':com',$com);
                $req->bindParam(':id',$id);
                $req->execute();
            }
        }catch (PDOException $e) {
            echo "Probleme dans page.php ";
            die();
        }       
    }
}else{
     echo "vous devez vous connecter pour commenter <br>";
 }
   
try{
            
    $req = $pdo->prepare("SELECT * FROM comment WHERE anime LIKE :anime");
    $req->bindParam(':anime', $nom);
    $req->execute();
    $comments = $req->fetchAll();
    //var_dump($comments);
            
            
    foreach($comments as $c){
        echo "<div  class=\"comment\">";
        echo $c[1]." : ";
        echo $c[3];
        echo "</div>";
        echo "<br>";
    }
           
}
    catch (PDOException $e) {
        echo "Probleme page.php";//PB ICI REGLE
        die();
    }

?>   
</div>
</body>
</html>
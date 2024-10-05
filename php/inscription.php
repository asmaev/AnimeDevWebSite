<?php
  session_start();
  
  function afficheFormulaire($p){
    $c="<form action=".$_SERVER['PHP_SELF']." method=\"post\">";
    $c.="<p class=\"alinea1\"><label>Pseudo : <input type=\"text\" name=\"pseudo\" value=\"".$p."\" required=\"required\"></label><br />";
    $c.="<p class=\"alinea1\"><label>Mot de passe : <input type=\"password\" name=\"pass\" required=\"required\"></label><br />";
    $c.="<br>";
    $c.="<input class=\"btn\" type=\"submit\" value=\"Inscription\" /></p>";
    $c.="</form>";
    echo $c;
  }   
?>

<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Inscription</title>
        <link rel="stylesheet" href="../css/user.css">
  </head>
  
  <body class="inscription_php">
         <form style="display: inline" action="site.php" method="get">
            <button>Accueil</button>
          </form>
    <div class="test1">
             <h1 class="alinea">Inscription</h1>
                
    <?php
      if(isset($_SESSION['pseudo'])){
          echo "<p>Vous ne pouvez pas vous inscrire si vous êtes connecté</p>";
      }
      else{
          if(isset($_POST['pseudo']) && isset($_POST['pass'])){
              $ps=trim($_POST['pseudo']);
              $mdp=trim($_POST['pass']);
              $results=NULL;
              include_once("connex.inc.php");
              $pdo = connexion("base.db");
              
              try{
                  $sql=$pdo->prepare("SELECT * FROM users WHERE pseudo = :ps");
                  $sql->bindParam(':ps',$ps);
                  $sql->execute();
                  $results = $sql->fetchAll(PDO::FETCH_ASSOC);
                  if(count($results)>0){
                      afficheFormulaire("pseudo deja utilisé");
                  }else{
                      $md=md5($mdp);
                    
                      $stmt=$pdo->prepare("INSERT INTO users (pseudo,pwd) VALUES (:ps,:md)");
                      $stmt->bindParam(':ps',$ps);
                      $stmt->bindParam(':md',$md);

                      $stmt->execute();
                      if($stmt->rowCount()==1){
                          echo "<p>Vous avez bien été inscrit.<br><a href=\"connexion.php\">Se connecter</a></p>";
                      }
                  }
              }
              catch (PDOException $e) {
                  echo "Probleme dans inscription.php";
                  die();
              }
          }else{
              afficheFormulaire(null);
          }
          
      }
    ?>
    </div>
  </body>
</html>
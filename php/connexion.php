<?php
  session_start();
  
  function afficheFormulaire($p){
      
      $c="<form action=".$_SERVER['PHP_SELF']." method=\"post\">";
      $c.="<p><label>Pseudo : <input type=\"text\" name=\"pseudo\" value=\"".$p."\" /></label><br />";
      $c.="<label>Mot de passe : <input type=\"password\" name=\"pass\" /></label><br />";
      $c.="<br>";
      $c.="<input class=\"btn\" type=\"submit\" value=\"Connexion\" /></p>";
      $c.="</form>";
      echo $c;
  }
?>

<!DOCTYPE HTML>
  <html lang="fr">
  <head>
  <meta charset="utf-8" />
  <title>Connexion</title>
  <link rel="stylesheet" href="../css/user.css">
  </head>
  
        <body class="connexion_php">
         
         <form style="display: inline" action="site.php" method="get">
            <button>Accueil</button>
          </form>

  <div class="test1">
  <h1 class="alinea">Connexion</h1>

<?php  
  if(isset($_SESSION['pseudo'])){
      echo "Vous êtes déjà connecté";
      
  }
  else{
    
      if(isset($_POST['pseudo']) && isset($_POST['pass'])){
          //on verifie que le membre existe et que le mdp est bon
          $ok=1;
          $ps=trim($_POST['pseudo']);
          $mdp=trim($_POST['pass']);
          $mp=md5($mdp);
          include_once("connex.inc.php");
          $pdo = connexion("base.db");
          
          try{
              $sql=$pdo->prepare("SELECT * FROM users WHERE pseudo = :ps AND pwd = :mp");
              $sql->bindParam(':ps',$ps);
              $sql->bindParam(':mp',$mp);
              $sql->execute();
              $results = $sql->fetchAll(PDO::FETCH_ASSOC);
              
              if(count($results) > 0){

                  $sql = $pdo->query("SELECT statut FROM users WHERE pseudo = '".$ps."'");
                  $st=$sql->fetchAll();
                  var_dump($st);
                  $ok=0;
                  $_SESSION['pseudo']=$ps;
                  $_SESSION['statut']=$st[0][0];
                  header('Location:site.php');
     
              }
          }
          catch (PDOException $e) {
              echo "Probleme dans connexion.php";
              die();
          }
          
          
          if($ok==1){
              

                  afficheFormulaire("erreur de pseudo ou mdp");
                 
                      }
      }
      else{
 
              afficheFormulaire(null);
              
                  }
      }
      
  
?>

</div>
</body>
</html>
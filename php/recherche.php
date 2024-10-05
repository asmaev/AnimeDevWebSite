<!DOCTYPE HTML>

    <html lang="fr">
<head>
<meta charset="utf-8">
   <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="../css/recherche.css">
    </head>

<body class="res_fond">
    
         <form style="display: inline" action="site.php" method="get">
            <button>Accueil</button>
         </form>
         
         <div class="resultat">
   <?php
                           
          if (isset($_POST['search'])) {
           
              include("connex.inc.php");
              $pdo = connexion('base.db');
              try {
                  $n=0;
                  $req = $pdo->prepare("SELECT * FROM anime WHERE nom LIKE :search");
                  $search = $_POST['search'].'%';
                  $req->bindParam(':search', $search);
                  $req->execute();
                  $an = $req->fetchAll(PDO::FETCH_ASSOC);
                  
                  
                  if(count($an)===0){
                      echo "<div class=\"vide\"><p style=\"text-indent: 15%\" >Aucun anime correspondant a votre recherche</p></div>";
                  }else{
                  
                  foreach($an as $anime) {
                      
                      $nom=$anime['nom'];
                      $img=$anime['image'];
                      
                      echo "<form style=\"display: inline\" action=\"/page.php?nom=".urlencode($nom)."\" method=\"post\">
             <button> <img src=\"image/".$img.".jpg\" alt=\"".$nom."\" height=\"200\" width=\"120\"><br>".$nom."</button>";
                      echo "</form> ";

                      $n++;
                      if($n % 4 == 0){
                          echo "<br>";
                      }
                  }
                  }
                  $req->closeCursor();
                  $pdo = null;
              } catch(PDOException $e) {
                  echo $e->getMessage();
                  echo '<p>Problème avec la base</p>';
              }
          } else {
              echo '<p>Problème de recherche, <a href="site.php">Retournez sur la page principale.</a></p>';
          }
     
 ?>
</div>
</body>
</html>
<?php
  session_start();

?>

<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Site</title>
    <link rel="stylesheet" href="css/site.css">
    <script src="java_script.js"> </script>
  </head>

     <body class="site">
  <div class="img_fond">
          
 
    <div class="entete">
     <br>
     <img src="image/logo.png"  alt="logo" height="100" width="150" style="float: left" >
     
    <?php
             
              if(isset($_SESSION['pseudo']) || isset($_SESSION['statut'])){
                                                                                 
                       echo "<button class=\"profil\" type=\"button\" onclick=\"afficheProfil()\"><img src=\"image/profil.png\" alt=\"profil\" height=\"20\" width=\"20\"></button>";
                                                                                 
                      echo "<div class=\"profil\"  id=\"profil\" style=\"display: none\">";
                       echo "<form  action=\"watchlist.php\" method=\"get\">
            <button>Watch List</button>
          </form>";
               
                                                                                 
               if($_SESSION['statut']=='1'){
                  echo "<form  action=\"gestion.php\" method=\"get\">
            <button>Gestion</button>
          </form>";
               
                     
          }
                       echo "<form  action=\"logout.php\" method=\"get\">
            <button>Se déconnecter</button>
          </form>";
                            echo " </div>";
       
                  }else{
                      echo "<div class=\"bouton\" >";
                      echo "<form  action=\"inscription.php\" >
            <button>Inscription</button>
          </form>";
                     
                      echo "<form  action=\"connexion.php\" method=\"get\">
            <button>Connexion</button>
          </form>";
                 
                   echo "</div>";
                }
          echo"<form  action=\"recherche.php\" method=\"post\">";
          echo "<label class=\"recherche\"><input type=\"search\" id=\"search\" placeholder=\"recherche\" name=\"search\"><button type=\"submit\">Rechercher</button></label>";
          echo "</form>";
    ?>
    
    </div>
    
    
    <div class="image">
      <br>
      <?php
          
          
          
          include("connex.inc.php");
        $pdo = connexion('base.db');
        try {
            $n=0;
            $req = $pdo->prepare("SELECT * FROM anime");
            $req->execute();
            $an = $req->fetchAll(PDO::FETCH_ASSOC);
            
            
            if(isset($_GET['page'])){
                $p=intval($_GET['page']);
            }else{
                $p=1;
            }
            
            $c=(count($an));
            $c=floor($c/16);
            
            for($i=0;$i<16;$i++) {
                
                if(strcmp($an[$i+(16*($p-1))]['nom'],"")!=0){
                    $nom=$an[$i+(16*($p-1))]['nom'];
                    $img=$an[$i+(16*($p-1))]['image'];
                    echo"<form style=\"display:inline\" action=\"/page.php?nom=".urlencode($nom)."\" method=\"post\">
        <button> <img src=\"image/".$img.".jpg\" alt=\"".$nom."\" height=\"200\" width=\"120\"><br>".$nom."</button></form>   ";
                                                                                
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
        
        echo "<div class=\"page_n\">";
        for($j=1;$j<=$c;$j++){
            echo" <form style=\"display: inline\" action=\"site.php?page=".$j."\" method=\"post\">
        <button>".$j."</button>
        </form>";
        }    
        
      ?>
    
    
     </div> 
     </div>
          </div>       
  </body>
  
</html>
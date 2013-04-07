<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Affichage des articles</title>
        <link rel="stylesheet" style="text/css" href="style.css" />
      
    </head>
    <body>
        <h1>Informations Entreprises<br/><hr/></h1>
        
        
        <div><br/>
        <?php
      
       include_once 'Utilisateur.php';
       include_once'bdd.php';
       include_once 'ListeArticle.php';
           $bdd= connexionBDD("root", "mysql");
          
           
       if(isset($_SESSION['pseudo'])&& isset($_SESSION['mdp']))
       {
           
           $a= new Utilisateur(); //constructeur test
           
          $bool= $a->verif_util_mdp_bdd($_SESSION['pseudo'], $_SESSION['mdp']);
          $_SESSION['droits']=$a->getdroit($_SESSION['pseudo']); // on réupère les droits de l'utilisateur
                   
          
                     if($bool==1)// si l'utilisateur correspond à un utilisateur de la bdd
                   {
                         $liste=new ListeArticle();
                         
                         $liste->afficheTabArticle();
                         echo '<br/>';
                         
                         
                         
                         
                         echo "<br/><a href='Ajouterunarticle.php'>Ajouter un article</a>";
                         
                 
                             
                       
                         
                          
                   }
                 else
                   {
                       echo "Erreur d'identification retourner à l'accueil pour vous connecter ! ";
                       
                   }
                        
       
       }
       
       else 
       {
           echo "Erreur d'identification retourner à l'accueil pour vous connecter ! "; // si variables pas initialisés 
           
       }
       
 
       
         ?>
            
            
            
        </div>
        <div><br/><hr/>
        <a href="index.php">Accueil</a>
        <?php
        if($_SESSION['droits']==1)
                {
                           
                echo '<br/><br/><a href="Suppression_article.php">Supprimer article (admin)</a>';
                }
        ?>
        </div>
    </body>
</html>

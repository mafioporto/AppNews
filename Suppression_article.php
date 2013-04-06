<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin Suppression-Articles</title>
    </head>
    <body>
        <h1>Informations Entreprises</h1>
        <p>Vous pouvez en tant qu'administrateur du site supprimer un ou plusieurs articles.</p>
        
        



        <div><br/>
        <?php
      
       include_once 'Utilisateur.php';
       include_once'bdd.php';
       include_once 'ListeArticle.php';
           
          
           
       if(isset($_SESSION['pseudo'])&& isset($_SESSION['mdp'])){
       
               if($_SESSION['droits']=1)
               {
                                 
                                 ?><p>Voici les articles entrer le titre pour le supprimer !</p>
                                
                                     
                                     
                                     <?php
                                 $liste= new ListeArticle();
                                 $liste->afficheTabArticle();
                                 $a= new Article("", "", "", "");
                                
                                 echo  "<strong>Total article: ".$liste->getNbarticle()."</strong>";
                                
                                 ?>
                   <form method="post"action="Suppression_article.php">
                             <SELECT name="nom_article" size="1">
                                 <?php 
                                 
                                 for ($i=0; $i<$liste->getNbarticle();$i++)
                                 {
                                     
                                      foreach ( $liste->GetlesTitres()as $titre)
                                         {
                                            echo  "<option value='$titre'>".$titre;
                                         }
                                    
                                 }
                                 
                                 
                                 ?>
                            
                                </SELECT
                                <br/>
                                <br/><br/>
                                              <input type="submit" name="suppression" value="Supprimer Article"/>
                                              
                   </form>
                                 
                                 
                                 
                                 
                                 <?php
                                 
                                 if(isset($_REQUEST['nom_article']))
                                 {
                                    
                              $a->supprimerArticle($_REQUEST['nom_article']);
                                 }
               }
                 
                             
                       
                         
                          
                   
                 else
                   {
                       echo "Vous n'êtes pas admin.";
                       
                   }
                        
       }
       
       
       else 
       {
           echo "Erreur d'identification retourner à l'accueil pour vous connecter ! "; // si variables pas initialisés 
           
       }
       
 
       
         ?>
            
            
            
        </div>
        <div><br/>
        <a href="index.php">Accueil</a>
        </div>
    </body>
</html>
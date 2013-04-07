<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin Suppression-Articles</title>
        <link rel="stylesheet" style="text/css" href="style.css" />
    </head>
    <body>
        <h1>Informations Entreprises<br/><hr/></h1>
        
       
        
        



        <div><br/>
        <?php
      
       include_once 'Utilisateur.php';
       include_once'bdd.php';
       include_once 'ListeArticle.php';
           
          
           
       if(isset($_SESSION['pseudo'])&& isset($_SESSION['mdp'])){
       
               if($_SESSION['droits']=1)
               {
                                 echo "<p>Vous pouvez en tant qu'administrateur du site supprimer un ou plusieurs articles.</p>";
                                 ?><p>Voici les articles choisir dans la liste déroulante afin de supprimer !</p>
                                
                                     
                                     
                                     <?php
                                 $liste= new ListeArticle();                             
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
                                 <script>alert("ATTENTION: une fois l'article supprimé il n'est plus possible de le \n\
                                                récupérer !");</script>
                                 
                                 
                                 
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
       <div><br/><hr/>
        <a href="index.php">Accueil</a>
        <a href="pageAffichage.php">afficher les articles</a>
        <a href='Ajouterunarticle.php'>Ajouter un article</a>
        </div>
    </body>
</html>
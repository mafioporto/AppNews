<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ajouter un article</title>
    </head>
    <body>
        <h1>Informations Entreprises</h1>
        <h4>Ajouter un article ici</h4>
        
        <div><br/>
        <?php
      
       
     
      include_once 'Utilisateur.php';
       include_once'bdd.php';
       include_once 'ListeArticle.php';
           $bdd= connexionBDD("root", "mysql");
         
           
         ?>
            
            <form method="post" action="Ajouterunarticle.php">
                <label>Titre: <input type="texte" name="titre"/><br/></label>
                <label>Texte: <input type="texte" name="texte"/></label>
                
                <input type="submit" name="envoyer" value="Ajouter l'article"/>
            </form>
        <?php 
        
        
        
        $date= date('c');
         if (isset($_REQUEST['titre'])&&isset($_REQUEST['texte']))
         
         {
             $art= new Article($_REQUEST['titre'],$_SESSION['pseudo'],$date,$_REQUEST['texte']);
             $test=$art->ajouterArticleBDD($art);
             if($test==1)
             {
                 ?><script>alert ("ajouté");</script><?php
             }
             else
             {
                  ?><script>alert ("déja");</script><?php
             
            
             
             
             }
           
         }
        ?>
            
            
        </div>
        <div><br/>
        <a href="index.php">Accueil</a>
        </div>
    </body>
</html>

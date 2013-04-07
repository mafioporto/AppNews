<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" style="text/css" href="style.css" />
        <title>Ajouter un article</title>
    </head>
    <body>
        <h1>Informations Entreprises<br/><hr/></h1>
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
                <label>Texte: <br/><textarea type="text" name="texte" rows="8" cols="40"/></textarea></label>
                <br/>
                <input type="submit" name="envoyer" value="Ajouter l'article"/>
            </form>
        <?php 
        
        
        
        $date= date('c');
         if (isset($_REQUEST['titre'])&&isset($_REQUEST['texte'])&& isset($_SESSION['pseudo']))
         
         {
             
             $art= new Article($_REQUEST['titre'],$_SESSION['pseudo'],$date,nl2br($_REQUEST['texte']));//nl2br prise en compte saut de ligne
             $art->ajouterArticleBDD($art);
             header("Location: pageAffichage.php"); 
                   
           
         }
        
        ?>
            
            
        </div>
        <div><br/><hr/>
        <a href="index.php">Accueil</a>
        <a href="pageAffichage.php">afficher les articles</a>
        <?php 
     
       if($_SESSION['droits']==1)
             {
                 echo '<a href="Suppression_article.php">Supprimer article (admin)</a>';
             }
                 
                ?>
        
        </div>
    </body>
</html>

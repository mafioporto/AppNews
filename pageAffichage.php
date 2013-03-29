<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Informations Entreprises</h1>
        
        
        <div><br/>
        <?php
      
       
     
      include_once 'Utilisateur.php';
       include_once'bdd.php';
       include_once 'ListeArticle.php';
           $bdd= connexionBDD("root", "mysql");
       if(isset($_REQUEST['pseudo'])&& isset($_REQUEST['mdp']))
       {
           
           $a= new Utilisateur(); //constructeur test
          $bool= $a->verif_util_mdp_bdd($_REQUEST['pseudo'], $_REQUEST['mdp']);
                   
          
                     if($bool==1)// si l'utilisateur correspond à un utilisateur de la bdd
                   {
                         echo 'affichage des articles ';
                   }
                 else
                   {
                       echo "Erreur d'identification retourner à l'accueil pour vous connecter ! ";
                   }
                        
       
       }
         ?>
            
            
            
        </div>
        <div><br/>
        <a href="index.php">Accueil</a>
        </div>
    </body>
</html>

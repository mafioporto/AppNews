<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inscription</title>
    </head>
    <body>
        <h1>Informations Entreprises<br/></h1>
        <h3>Inscription</h3>
        <p>Veuillez vous inscrire pour avoir accès aux news: </p>
        <form method="Post" action="Inscription_util.php">
            <label>Utilisateur <input type="text" name="pseudo"/><br/></label>
            <label>Mot de passe <input type="password"name="mdp"/><br/><br/></label>
            <input type="submit" value="S'inscrire" name="online"/>
        </form>
        <div><br/>
        <?php
        
        include 'Utilisateur.php';
       
         
        if(isset($_REQUEST['pseudo'])&&isset($_REQUEST['mdp'])) // vérifie les valeurs de pseudo et mdp
        {
           if($_REQUEST['pseudo']==""|| $_REQUEST['mdp']=="" || !is_string($_REQUEST['pseudo']) )
           {
            ?><script>alert ("Entrer un nom utilisateur valide et un mot de passe !");</script><?php
           }
                 else {
                      
                        $a= new Utilisateur();
                        $a->ajout_Util_bdd($_REQUEST['pseudo'], $_REQUEST['mdp'],0);
                        echo '<br/>';
                        echo 'Voici les membres du site: ';
                      
                       echo '<br/>'.'<br/>';
                  
                       
                        }     
        }
        
            
       
         ?>
            
            
             <a href="index.php">Accueil</a>
        </div>
    </body>
</html>

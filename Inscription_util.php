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
        include_once 'bdd.php';
         
        if(isset($_REQUEST['pseudo'])&&isset($_REQUEST['mdp'])) // vérifie les valeurs de pseudo et mdp
        {
            $mdp= $_REQUEST['mdp'];
            $pseudo= $_REQUEST['pseudo'];
            $a= new Utilisateur($pseudo, $mdp, 0);
            echo '<br/>';
            $a->afficher_util();
            
        }
        
        
        

       
     
       
       
         ?>
            
            
             <a href="index.php">Accueil</a>
        </div>
    </body>
</html>

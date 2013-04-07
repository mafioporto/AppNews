
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Accueil</title>
        <link rel="stylesheet" style="text/css" href="style.css" />
    </head>
    <body>
        <h1>Informations Entreprises<br/><hr/></h1>
        <p>Veuillez vous identifier pour avoir accès aux news: </p>
        <form method="Post" action="index.php">
            <label>Utilisateur <input type="text" name="pseudo"/><br/></label>
            <label>Mot de passe <input type="password"name="mdp"/><br/></label>
            <input type="submit" title="Connexion" name="online"/>
        </form>
        
        <a href="Inscription_util.php">Pas encore inscrit ?</a>
        <div><br/>
            <?php 
            if(isset($_REQUEST['pseudo'])&& isset($_REQUEST['mdp']))
        {
            session_start();
            $_SESSION['pseudo']=$_REQUEST['pseudo'];
            $_SESSION['mdp']=$_REQUEST['mdp'];
            $_SESSION['droits']=0; // gere les droits 
            header("Location: pageAffichage.php"); 
        }
            ?>
        
        </div>
    </body>
</html>

<?php

/**
 * Description of Utilisateur
 *
 * @author tony
 */

include_once 'bdd.php';
class Utilisateur {
   private $pseudo;
   private $mdp;
   private $droitUtil;
   
   
  /**
   * Contruit un utilisateur et l'ajoute à la base de donnée si il 
   * n'est pas présent dans celle ci
   * @param type $pseudo
   * @param type $mdp
   * @param type $droitUtil 1 si peux modifier, 0 si droit de lecture seul
   */
   
   function __construct($pseudo,$mdp,$droitUtil) 
   {
       
       $this->pseudo=$pseudo;
        $this->mdp=$mdp;
        $this->droitUtil=$droitUtil; 
       
       $bdd= connexionBDD("root", "mysql");
       $req= "insert into utilisateur(Pseudo,Mdp,Droit_util) values ('$this->pseudo','$this->mdp','$this->droitUtil');";
       
       $bdd->query($req)or die ("erreur");
     
    
    }
    
    function afficher_util()
    {
        echo $this->pseudo." votre inscription a été prise en compte vous pouvez maintenant
            avoir accès aux informations";
    }
    
    
}

?>

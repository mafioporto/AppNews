<?php

/**
 * Description of Utilisateur
 *
 * @author tony Villanova
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
     
       
       //a faire: ajouter le fait qu'on ne peux pas entrer deux meme pseudo bdd
    
    }
    
    function afficher_util()
    {
        echo "Pseudo ".$this->pseudo."<br/>Vos droit ".$this->droitUtil;
    }
    
    
}

?>

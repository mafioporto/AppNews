<?php

/**
 * Description of Utilisateur
 * Permet de créer un utilisateur, affiche et inscrit dans la base de donnée
 * protection contre doublons
 * @author tony Villanova
 */

include_once 'bdd.php';


class Utilisateur {
   private $pseudo;
   private $mdp;
   private $droitUtil;
  private $liste_Util= array(); // tableau d'utilisateur 

  
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
       // requête d'insertion
       $req= "insert into utilisateur(Pseudo,Mdp,Droit_util) values ('$this->pseudo','$this->mdp','$this->droitUtil');";
       // requete verif si dans bdd
       $req_verif="select Pseudo from utilisateur;"; 
       
       $verif=$bdd->query($req_verif);
       
       while ($donne = $verif->fetch() )
       {
           array_push($this->liste_Util, $donne['Pseudo']); // tout les pseudo dans un tableau 
       }
       
            $cpt=0;
                foreach ($this->liste_Util as $utilisateur)// on parcour le tableau
                    {
                             if($utilisateur==$pseudo)
                                 {
                                 $cpt++;
                                         
                                 }
                     
                     }
      
                if($cpt==0)
                {
                    $bdd->query($req);
                }
                        else {
                                    echo "<script>alert('Pseudo déjà utilisé');</script>";
                             }
    
    }
    
    /**
     * affiche un utilisateur 
     * 
     */
    function afficher_util()
    {
        echo "Pseudo ".$this->pseudo."<br/>Vos droit ".$this->droitUtil;
    }
    
    
    /**
     * 
     * affiche tous les membres inscrits
     */
    function afficher_membres()
    {
        foreach ($this->liste_Util as $un_util)
        {
            echo $un_util;
        }
    }
}

?>

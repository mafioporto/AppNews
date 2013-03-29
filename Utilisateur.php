<?php

/**
 * Description of Utilisateur
 * Permet de créer un utilisateur, affiche et inscrit dans la base de donnée
 * protection contre doublons
 * @author tony Villanova
 */

include 'bdd.php';


class Utilisateur {
   private $pseudo;
   private $mdp;
   private $droitUtil;
   private $liste_Util= array(); // tableau d'utilisateur
   private $liste_util_mdp=array(); // tableau utilisateur avec mdp 


   /**
   * Contruit un utilisateur
   * @param type $pseudo
   * @param type $mdp
   * @param type $droitUtil 1 si peux modifier, 0 si droit de lecture seul
   */
  
   function __construct($pseudo,$mdp,$droitUtil) 
   {
       
        $this->pseudo=$pseudo;
        $this->mdp=$mdp;
        $this->droitUtil=$droitUtil; 
       
   }
    
   
   
    /**
     * Ajoute l'utilisateur à la base de donnée
     * @param Utilisateur $Util
     */
    
    function ajout_Util_bdd(Utilisateur $Util)
    {
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
                             if($utilisateur==$Util->pseudo)
                                 {
                                 $cpt++;
                                         
                                 }
                     }
      
                if($cpt==0)
                {
                    $bdd->query($req);
                    echo "<script>alert('Enregistrement effectué');</script>";
                    
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
     * affiche tous les membres inscrit
     */
    function afficher_membres()
    {
        foreach ($this->liste_Util as $un_util)
        {
            echo $un_util.'<br/>';
        }
    }
    
    
    /**
     * 
     * permet de vérifier le mot de passe et le pseudo de l'utilisateur dans la bdd
     * @param String $pseudo
     * @param String $mdp
     * @return int 1 si le mot pseudo et le mot de passe sont dans la base de donnée sinon 0
     */
    
    function verif_util_mdp_bdd($pseudo,$mdp)
    {
        $bdo= connexionBDD("root", "mysql");
        $req= "select Pseudo,Mdp from utilisateur where Pseudo='$pseudo' AND Mdp='$mdp';";
        $var_verif=$bdo->query($req) or die ('pbm requete');
      while($donne=$var_verif->fetch())
      {
         if($donne['Pseudo']==$pseudo && $donne['Mdp']==$mdp)
         {
            return 1;
         }
            else {
                    return 0;
                }
      }
       
    }
}

?>

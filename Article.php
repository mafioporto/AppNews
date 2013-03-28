<?php

/**
 * Description of Article
 *Article pouvant être affiché et ajouté à la base de donnée 
 * @author tony Villanova
 */

include_once'bdd.php';

class Article {
    
    private $titre;
    private $Auteur;
    private $Date;
    private $texte;
    private $cpt;
    
    private $verif;
            
    
    
  
   function __construct($title,$Auteur,$Date,$texte) 
   {
        
            $this->titre=$title;
            $this->Auteur=$Auteur;
            $this->Date=$Date;
            $this->texte=$texte;
               
        
    }
    
    
    /**
     * Affiche,date_article,texte_art l'article sur la base du constructeur
     */
    function afficher_article()
    {
        
       echo "TITRE: <h3>".$this->titre."</h3><br/> ".$this->texte."<br/> ".$this->Date."<br/>L'auteur est :  ".$this->Auteur;
    }
    
    
    /**
     * fonction qui ajoute un article à la base de donnée 
     * et qui vérifie si le titre de l'article n'est pas déja présent
     * @param Article $A
     */
    function ajouterArticleBDD(Article $A)
    {
        
        $bd= connexionBDD("root", "mysql");
      
      
      
        
        $req_verif="select Titre from Article; ";
        $a=$bd->query($req_verif);
        while ($donne = $a->fetch())
        {
            $this->verif=$donne['Titre'];
        }
        
        
        if ($this->verif != $A->titre)// verifie si le titre rentré en argument n'est pas déjà présent 
        {
             $req=("insert into Article (Titre,date_article,texte_art)values('$A->titre','$A->Date','$A->texte');");
        $bd->query($req)or die("impossible constructeur article");
       
        }
    }
    
}

?>
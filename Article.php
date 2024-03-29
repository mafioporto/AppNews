<?php

/**
 * Description of Article
 * Article pouvant être affiché et ajouté à la base de donnée 
 * @author tony Villanova
 */

include_once'bdd.php';

class Article {
    
    private $titre;
    private $Auteur;
    private $Date;
    private $texte;
    
    
    private $verif;
            
    
    
  /**
   * Construit un article 
   * @param String $title
   * @param String $Auteur
   * @param String $Date
   * @param String $texte
   */
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
        
       echo "<p><h3>".$this->titre."</h3><br/> ".$this->texte."<br/><br/> ".$this->Date."<br/>L'auteur est :  <strong>".$this->Auteur.'</strong></p>';
    }
    
    
    /**
     * fonction qui ajoute un article à la base de donnée 
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
            
        $req=("insert into Article (Titre,date_article,texte_art,Pseudo)values('$A->titre','$A->Date','$A->texte','$A->Auteur');");
        $bd->query($req);
                
        }
              
        
    }
    /**
     * permet de supprimer un article en entrant son titre
     * @param String $titre
     */
    function supprimerArticle($titre)
    {
        $bdd= connexionBDD('root','mysql');
        $req_supp="delete from Article where Titre='$titre' ;";
        $bdd->query($req_supp);
    }
    
    
    
    /**
     * retourne le titre de l'article
     * @return String
     */
    public function getTitre()
    {
        return $this->titre;
    }
    
}

?>

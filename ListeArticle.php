<?php

/**
 * Description of ListeArticle
 *
 * @author tony Villanova
 */
include_once "bdd.php";
require 'Article.php';

class ListeArticle {
    
    private $listeArticle= array();
    private $listeTitre=array();
  
    
    /**
     * constructeur connexion à la base de donnée requete 
     * d'affichage de la liste des articles et place dans le tableau $listeArticle
     */
    public function __construct() 
    {
        
            
        
        $bdd= connexionBDD("root", "mysql");
        $req= "SELECT *
            FROM `Article`
            ORDER BY `id_article` DESC
            LIMIT 0 , 5;";
        $tri=$bdd->query($req);
       
        
        
        while($donne=$tri->fetch())
        {
            
            $a= new Article ($donne['Titre'],$donne['Pseudo'],$donne['date_article'],$donne['texte_art']);
               array_push($this->listeArticle, $a);
        }
      
      
    }
   
    /**
     * Affiche un tableau d'article 
     */
    
    public function afficheTabArticle()
    {
      foreach ($this->listeArticle as $unarticle )
      {
          
          $unarticle->afficher_article();
      }
       
    }
    
    
    
    /**
     * ajoute un article dans la tableau, passé en argument
     * @param Article $A  de type Article
     */
    public  function ajouterUnarticle(Article $A)
    {
        
        array_push($this->listeArticle, $A);
        
    }
    
    /**
     * retourne le nombre d'article du tableau
     * @return int
     */
    public function getNbarticle()
    {
        return \count($this->listeArticle);
    }
    
    /**
     * retourne un tableau des titre de la liste d'article
     * @return array
     */
    public function GetlesTitres()
    {
        
        foreach ($this->listeArticle as $untitre)
        {
           array_push($this->listeTitre, $untitre->getTitre());
        }
        return $this->listeTitre;
    }
    
}

?>

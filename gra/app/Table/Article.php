<?php 

namespace App\Table;

use App\App;

class Article extends Table  {

   
    public static function getLast(){
        
        return self::query(
            // Je selectionne les id,tites,contenu et titre 
      " SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
        FROM articles 
        LEFT JOIN categories 
        ON category_id = categories.id
        ", __CLASS__);
    }


     public static function lastbyCategory($category_id){

  
        return self::query(
            // Je selectionne les id,tites,contenu et titre 
      " SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
        FROM articles 
        LEFT JOIN categories 
        ON category_id = categories.id

        WHERE category_id =  ?
        ", [$category_id]);
     }


//pour obtenir l'url
public function getUrl(){
      // return l'url  pour chaque id 
        return 'index.php?p=article&id='  .$this->id;
}


public function getExtrait(){
// Affiche  le texte de contenu pour la mettre sur la page home.php 
// la function native substr c'est pour affciher le texte du 0 caractére au 100
    $html =  '<p>' .  substr($this->contenu, 0,100)  .  '</p>';
    $html .=  '<p><a href="'  .$this->getURL()   . '"> Voir la suite </a></p>';
    return $html;
    }



}
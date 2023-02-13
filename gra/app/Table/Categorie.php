<?php

namespace App\Table;

use App\App;

class Categorie extends Table {

    // c'est la varibale qui stoke la table categorie dans la bdd 
    protected static $table = "categories";



      //pour obtenir l'url
public function getUrl(){
    // return l'url  pour chaque id 
      return 'index.php?p=categorie&id='  .$this->id;
}


}
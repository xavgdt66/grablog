<?php 

namespace App\Table;

use App\App;

// video arretr a 20:23
class Table {


    protected static $table;

    private static function getTable(){

        if(static::$table === null){
         $class_name = explode("\\", get_called_class());
         static::$table = strtolower(end($class_name)) . 's';
        
        }
        //die(static::$table);
        return static::$table;
    }



    public static function find($id){
        return App::getDB()->prepare("SELECT * FROM " . static::getTable() . "
         WHERE id = ? 
         ", [$id], get_called_class(), true);
    }


// Permet de faire une requete sql et de lui passer des attributs 
    public static function query($statement, $attributes = null, $one = false ){
        if($attributes){
                return App::getDB()->prepare($statement, $attributes, get_called_class(), $one);
        } else  {
                return App::getDB()->query($statement, get_called_class(), $one);
        }
       
    
        

    }






    public static  function all(){
        // get db est la function qui est la bdd dans App.php 
       return App::getDB()->query( " SELECT * FROM " . static::getTable() . " 
       ", get_called_class());
   

   }





//méthode magique appelée __get(). Elle est appelée automatiquement lorsqu'une propriété inaccessible est appelée sur une instance d'objet.
public function __get($key){
// Il définit une variable $method en utilisant la valeur de $key et en concaténant le préfixe "get" et en utilisant ucfirst() pour mettre en majuscule le premier caractère du nom de la propriété.
    $method = 'get' . ucfirst($key);
// Il affecte la valeur retournée par l'appel de la méthode définie par $method à la propriété $key de l'objet courant.
    $this->$key = $this->$method();
//  La valeur de la propriété $key est retournée en fin de méthode.
    return $this->$key;
}








}


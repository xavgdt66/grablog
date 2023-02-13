<?php 

namespace App;


class App {

const  DB_NAME = "blog";
const  DB_USER = "root";
const  DB_PASS = " ";
const  DB_HOST = "localhost";


// variable qui permet de sauvegarder  la connecsion a la bdd 
    private static $database;

// Getter qui recupere la connection a la bdd 
    public static function getDB(){
     if( self::$database === null){
         self::$database =  new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
     }
        
        return self::$database;
    }
}
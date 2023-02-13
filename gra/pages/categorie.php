<?php 
use App\Table\Article;
use App\Table\Categorie;



//charge la catégorie avec l'identifiant (ID) 1 à partir de la base de données à l'aide de la méthode statique finds() 
//de la classe Categorie située dans le dossier Table de l'application. Le résultat est stocké dans la variable $categorie.
$categorie = Categorie::find($_GET['id']);
// je récupere les artciles 
$articles = Article::lastbyCategory($_GET['id']);

// la liste des categories sur le coté à droite de la page 
$categories= Categorie::all();

?>
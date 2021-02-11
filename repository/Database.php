<?php

namespace Repository;

use \PDO;

class Database
{
	
    protected function connectDB()
    {
    
    	$bdd = new PDO('mysql:host=localhost;dbname=blogphp1;charset=utf8', 'root', '');
        
    	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Cf. https://www.php.net/manual/fr/pdo.setattribute.php
        // setAttribute -> permet par ex. de gérer le type d'erreurs lors de la connexion à la BDD - l'option ERRMODE_SILENT est l'option par défaut qui assigne simplement les messages d'erreurs (ERRMODE_SILENT - voir la documentation MySQL)
        // PDO::ATTR_ERRMODE -> renvoie un rapport d'erreurs
        // PDO::ERRMODE_EXCEPTION -> Représente une erreur émise par PDO. Pas besoin de lancer une exception PDOException depuis votre propre code
        
        $bdd->setAttribute(PDO::FETCH_ASSOC, false);
        // PDO::FETCH_ASSOC -> Chaque entrée sera récupérée et placée dans un array
        
    	return $bdd;
    }
}   

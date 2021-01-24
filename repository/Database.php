<?php

class Database
{
	
    protected function connectDB()
    {
    
    	$db = new PDO('mysql:host=localhost;dbname=blogphp1;charset=utf8', 'root', '');
        
    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Cf. https://www.php.net/manual/fr/pdo.setattribute.php
        // setAttribute -> permet par ex. de gérer le type d'erreurs lors de la connexion à la BDD - l'option ERRMODE_SILENT est l'option par défaut qui assigne simplement les messages d'erreurs (ERRMODE_SILENT - voir la documentation MySQL)
        // PDO::ATTR_ERRMODE -> renvoie un rapport d'erreurs
        // PDO::ERRMODE_EXCEPTION -> Représente une erreur émise par PDO. Pas besoin de lancer une exception PDOException depuis votre propre code
        
        $db->setAttribute(PDO::FETCH_ASSOC, false);
        // PDO::FETCH_ASSOC -> Chaque entrée sera récupérée et placée dans un array
        
    	return $db;
    }
}

// Connexion à la base de données

// A placer dans le Modèle : cette partie gère les données de votre site. Son rôle est d'aller récupérer les informations « brutes » dans la base de données, de les organiser et de les assembler pour qu'elles puissent ensuite être traitées par le contrôleur. On y trouve donc entre autres les requêtes SQL.    

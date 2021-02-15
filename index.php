<?php

// ROUTER : AUTOLOAD ET INSTANCIATION AUTOMATIQUE DES CONTROLLERS

// dirname() — Renvoie le chemin du dossier parent
define('ROOT', dirname(__FILE__));

// "define root dirname.." signifie "donne moi l'URL du fichier"
// "ROOT" signifie le dossier qui contient toute l'application
$self = htmlentities($_SERVER['PHP_SELF']);

// "define URL.." permet de définir le chemin de la racine -> la variable 'URL' est utilisée dans les vues pour établir un lien de redirection vers la page d'accueil
// Ici le str_replace remplace/masque la mention index.php en page d'accueil du site
define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$self"));

// $_SERVER -> Variables de serveur et d'exécution
// $_SERVER est un tableau contenant des informations comme les en-têtes, dossiers et chemins du script

// PHP ne sait pas qu'il doit appeler une fonction lorsqu'on essaye d'instancier une classe non déclarée. On va donc utiliser la fonction spl_autoload_register en spécifiant en premier paramètre le nom de la fonction à charger //cf.tuto OpenC https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1666060-utiliser-la-classe //Les classes sont chargées dynamiquement avec la fonction spl_autoload_register

// Voir sur php.net : https://www.php.net/manual/fr/language.oop5.autoload.php
// Voir cette méthode indiquée sur php.net : https://www.php.net/manual/fr/function.spl-autoload-register.php

spl_autoload_register(function ($autoClass) {

    $dir_separator = DIRECTORY_SEPARATOR;
    $directory = __DIR__;

    $autoClass = str_replace('\\', $dir_separator, $autoClass);

    $file_path = "{$directory}{$dir_separator}{$autoClass}.php";

    if (is_readable($file_path)) 
        require_once $file_path;

});

// CONTRÔLE DE L'AFFICHAGE DES PAGES
// ÉTAPES
// 1 : On contrôle l'action $_GET dans l'URL (exemple ../blog/posts)
// 2 : On vérifie si le $_GET en cours (ex : "posts") correspond bien à un nom de fichier dans le dossier \controllers (ex : présence de "controllerPosts")
// 3 : Si oui on active via une concaténation du namespace l'instanciation de la classe du fichier trouvé (ex : " $instance = new Controllers\ControllerPosts(); ControllerPosts(); )
// 4 : Si le param GET est vide (ex : ../blog/index.php ou simplement ../blog/) alors on instancie le controller de la homepage (voir : $controllerHome();)
// 5 : Si l'Url indiquée par l'internaute n'existe pas, message d'erreur "Adresse url erronée"
try
{
    $getAction = filter_input(INPUT_GET, 'action');
    // Appel des pages via les fichiers controllers en cas d'actions utilisateurs
    if(isset($getAction))
    {
        // Ensuite, cette variable sert aussi à l'instanciation de tous les controllers..
        $className = ucfirst($getAction);
        // $className = $getAction;

        // Les caractères passés dans l'URL correspondent-ils à l'existence d'un fichier Controller ?
        // Si oui..
        if(file_exists('controllers/controller'. $className .'.php')) 
        {
            // Appel de session_start() pour éviter de dupliquer le code dans tous les controllers
            session_start();
            
            // INSTANCIATION AUTOMATIQUE DES CLASSES CONTROLLERS VIA UNE CONCATÉNATION DES NAMESPACES CONTROLLERS :

            $concat = '\Controllers\\Controller'.$className.'';
            // Ça donne ensuite par exemple : 
            // $instance = new Controllers\ControllerBackoff();
            $instance = new $concat();

            $instance();

            // var_dump($className);
            // var_dump($concat);
            // var_dump($instance);
        }
            
        else {

            throw new Exception('');

        } 

    }
    
    else {
        session_start();
        $controllerHome = new Controllers\ControllerHome();
        $controllerHome();

    }

}

// En cas d'erreurs..
// Une exception est une erreur que l'on peut attraper grâce aux mots-clé try et catch 
// Une exception se lance grâce au mot-clé throw.

catch(Exception $e)
{
    $errorMsg = $e->getMessage();
    
    // On utilise la fonction require_once pour éviter de recharger plusieurs fois le même fichier
    require_once 'views/viewError.php';
}
     

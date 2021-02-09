<?php

// La page Index sert de router 
// La page appelle les classes et les fonctions des Controllers
// La page Index sert aussi de chargement des classes Models et des Classes Repository
// Le fichier index.php sert à opérer les redirections pour le bon fonctionnement du blog

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

// APPEL DE TOUTES LES CLASSES DES DOSSIERS MODELS ET REPOSITORY
spl_autoload_register(function($modelClass) {

    $dirs = array(
        'models/',
        'repository/', 
    );

    foreach( $dirs as $dir ) {
        if (file_exists($dir.$modelClass.'.php')) {

            require_once $dir.$modelClass.'.php';
            return;
        }
    }

});

// CONTRÔLE DE L'AFFICHAGE DES PAGES
try
{
    $getAction = filter_input(INPUT_GET, 'action');
    // Appel des pages via les fichiers controllers en cas d'actions utilisateurs
    if(isset($getAction))
    {
        // Ensuite, cette variable sert aussi à l'instanciation de tous les controllers..
        $className = ucfirst($getAction);
        
        if(file_exists('controllers/controller' . $className . '.php')) {
            require_once 'controllers/controller' . $className . '.php';
            // Appel de session_start() pour éviter de dupliquer le code dans tous les controllers
            session_start();
            // Appel de la Classe Session
            require_once 'utils/Session.php';
        }
        // https://www.php.net/manual/fr/function.ucfirst.php
            
        else {
            throw new Exception('');
        } 

        // Instanciations de tous les controllers :
        $class = 'Controller'.$className;
        $instance = new $class();
        // Appel des fonctions (cf. méthode __invoke()) :
        $instance();

    }
    
    else {
        // Appel de la vue racine du site (Accueil)
        require_once 'controllers/controllerHome.php';
        session_start();
        
        $controllerHome = new ControllerHome();
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

    

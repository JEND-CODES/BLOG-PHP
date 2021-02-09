<?php

// require_once 'utils/Session.php';

// LOGIN ET SESSIONS POUR LES MEMBRES PREMIUM DU BLOG

class ControllerAccess
{
    private $member_log;
    
    public function __construct()
    {
        
        $this->member_log = new RepositoryConnect();
    }
    
    public function __invoke()
    {

        // session_start();
        
        // Si la session est en cours pour un membre
        // if(!empty($_SESSION['premium']))
            // Go to Back office Membres
            // header('Location:'.URL.'backoff');

        $session = new Session();

        if(!empty($session->vars['premium']))
            header('Location:'.URL.'backoff');
        

        // Filtres de traitements de $_POST
        // Filtrage de la superglobale au cas où elle aurait un contenu empoisonné
        // Filtres de nettoyages
        // https://www.php.net/manual/en/function.filter-input.php
        // https://www.php.net/manual/en/function.filter-input-array.php
        // https://www.php.net/manual/en/filter.filters.sanitize.php
        // https://stackoverflow.com/questions/19767894/warning-do-not-access-superglobal-post-array-directly-on-netbeans-7-4-for-ph
        // $post = filter_input(INPUT_POST, 'var_name', FILTER_SANITIZE_STRING);
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(!empty($post))
        {
            extract($post);
            
            $errors = array();

            // Sécurisations contre injections
            $member = htmlentities($member);

            $member_password = htmlentities($member_password);

            if(empty($member))
                array_push($errors, 'Identifiant manquant');

            if(empty($member_password))
                array_push($errors, 'Mot de passe manquant');


            if(!empty($member) && !empty($member_password))
            { 
                
                $return = $this->member_log->checkMember($member, $member_password);

                if(!$return)
                    array_push($errors, 'Mauvais identifiants ou compte en attente de validation');
                else
                {

                    // Activation de $_SESSION 
                    // https://www.php.net/manual/fr/reserved.variables.session.php
                    // https://www.php.net/manual/fr/ref.session.php
                    
                    // $session = new Session();
        
                    // Stockage en SESSION du Pseudo du membre connecté
                    $session->vars['premium'] = $member;
                    // $_SESSION['premium'] = $member;

                    // Stockage en SESSION de l'ID du membre connecté
                    $session->vars['member_id'] = $return;
                    // $_SESSION['member_id'] = $return;
                    
                    // L'accès au Back Office est dédié uniquement aux membres premium
                    header('Location:'.URL.'backoff');
                    
                }
            }
        }

        require_once 'views/viewAccess.php';
            
    }
}

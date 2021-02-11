<?php

namespace Controllers;

use Repository\RepositoryConnect;

use Utils\Session;

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

        $session = new Session();

        if(!empty($session->vars['premium']))
            header('Location:'.URL.'backoff');

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(!empty($form))
        {
            extract($form);
            
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
                    // Stockage en SESSION du Pseudo du membre connecté
                    $session->vars['premium'] = $member;

                    // Stockage en SESSION de l'ID du membre connecté
                    $session->vars['member_id'] = $return;
                    
                    // L'accès au Back Office est dédié uniquement aux membres premium
                    header('Location:'.URL.'backoff');
                    
                }
            }
        }

        require_once 'views/viewAccess.php';
            
    }
}

<?php

// Login et Session pour les membres premium du blog

class ControllerAccess
{
    private $member_log;
    
    public function __construct()
    {
        
        $this->member_log = new RepositoryConnect();
    }
    
    public function __invoke()
    {

        session_start();
        
        // Si la session est en cours pour un membre
        if(!empty($_SESSION['premium']))

        // Go to Back office Membres !!!
        header('Location:'.URL.'backmember');

        // NEW !! Si la session Admin est en cours
        // if(!empty($_SESSION['connect']))
        // Alors redirection au Back off Admin
            // header('Location:'.URL.'connect');

        if(!empty($_POST))
        {
            extract($_POST);
            
            $errors = array();

            // Sécurisation contre injections

            $member = htmlentities($member);

            $member_password = htmlentities($member_password);

            if(empty($member))
                array_push($errors, 'Identifiant manquant');

            if(empty($member_password))
                array_push($errors, 'Mot de passe manquant');


            if(!empty($member) && !empty($member_password))
            { 
                
                $return = $this->member_log->checkMember($member, $member_password);

                // if(!$this->member_log->checkMember($member, $member_password))

                if(!$return)
                    array_push($errors, 'Mauvais identifiants ou compte en attente de validation');
                else
                {

                    //Activation de $_SESSION 
                    //https://www.php.net/manual/fr/reserved.variables.session.php
                    //https://www.php.net/manual/fr/ref.session.php
                    
                    // Stockage en SESSION du Pseudo du membre connecté
                    $_SESSION['premium'] = $member;

                    //$_SESSION['truc'] = ['username' => $member, 'password' => $member_password];

                    // Stockage en SESSION de l'ID du membre connecté
                    $_SESSION['member_id'] = $return;
                    
                    // Ici il faut définir un accès au Back Office dédié uniquement aux membres premium
                    header('Location:'.URL.'backmember');

                    
                }
            }
        }

        require_once('views/viewAccess.php');
            
    }
}

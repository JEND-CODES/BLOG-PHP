<?php

// CHANGEMENT DE MOT DE PASSE EN BACK OFFICE POUR L'ADMINISTRATEUR

class ControllerPassword
{
    private $new_pass;
    
    public function __construct()
    {
        
        $this->new_pass = new RepositoryConnect();
    }
    
    public function __invoke()
    {

        session_start();

        if($_SESSION['member_id'] != 1)
            header('Location:'.URL.'home');
        
        $connect = $this->new_pass->selectUser($_SESSION['premium']);

        if(!empty($_POST))
        {
            extract($_POST);
            $errors = array();

            $password = htmlentities($password);

            $password2 = htmlentities($password2);

            $checkpwd2 = htmlentities($checkpwd2);

            if(empty($password))
                array_push($errors, 'Entrez le mot de passe actuel');

            if(!empty($password) && hash('sha256', $password) != $connect->getPassword())
                array_push($errors, 'Mot de passe actuel inexact');

            if(empty($password2))
                array_push($errors, 'Nouveau mot de passe manquant');

            if(!empty($password2) && strlen($password2)>15)
                array_push($errors, 'Nouveau mot de passe trop long');
            
            if(!empty($password2) && strlen($password2)<5)
                array_push($errors, 'Nouveau mot de passe trop court');

            if($checkpwd2 != $password2)
                array_push($errors, 'Champ de confirmation inexact');

            if(count($errors) == 0)
            { 
                $connect->setPassword(hash('sha256', $password2));

                $this->new_pass->updatePassword($connect);

                $nouveau = 'Mot de passe modifié';

                unset($password);
                unset($password2);
                unset($checkpwd2);
            }
        }

        require_once('views/viewPassword.php');
            
    }
}

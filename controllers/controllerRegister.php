<?php

namespace Controllers;

use Repository\RepositoryConnect;

use Models\Connect;

use Utils\Session;

// ENREGISTREMENTS DE NOUVEAUX MEMBRES

class ControllerRegister
{
    private $new_user;
    
    public function __construct()
    {
        
        $this->new_user = new RepositoryConnect();
    }
    
    public function __invoke()
    {

        $session = new Session();

        if(!empty($session->vars['premium']))
            header('Location:'.URL.'backoff');


        $user = '';

        $password = '';

        // Le Pseudo doit nécessairement être unique !
        // On empêche ici l'injection de doublons et aussi dans la Base de données avec l'ajout de l'index UNIQUE ajouté à la colonne "user" de la table SQL cv_managers (ALTER TABLE `cv_managers` ADD UNIQUE( `user`);)

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $formPseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        
        if(!empty($formPseudo))
        {
            extract($form);  

            $pseudo = htmlentities($pseudo);

            // $pseudo -> $_POST['pseudo'] -> peut être passé en paramètre ici plutôt que dans la fonction checkUsername du repositoryConnect (modification du 6 février suite à l'analyse CODACY du projet)
            $getUsernames = $this->new_user->checkUsername($pseudo);
            
            $gotoregister = '<p>PSEUDO DISPONIBLE</p>';

            $registerForm = '<form action="register" method="post" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5 special-form-registration">
            <p>
              <label class="sr-only">Identifiant</label>
              <input id="input_checked" name="user" placeholder="Pseudo membre" class="form-control" type="text" readonly>
            </p>

            <p>
              <label class="sr-only">Mot de passe</label>
              <input name="password" placeholder="CHOIX DU MOT DE PASSE" class="form-control" type="password" required>
            </p>
           
            <button class="btn btn-success btn-block" type="submit">INSCRIPTION</button>
            
          </form>';
        }

        $formUser = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

        $formPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if(!empty($formUser) && !empty($formPassword))
        {
            extract($form);  
            
            $errors = array();

            $user = htmlentities($user);

            $password = htmlentities($password);

            if(empty($user))
                array_push($errors, 'Pseudo manquant');
            
            if(empty($password))
                array_push($errors, "Mot de passe manquant");

            if(!empty($password) && strlen($password)>15)
                array_push($errors, 'Mot de passe trop long');
            
            if(!empty($password) && strlen($password)<5)
                array_push($errors, 'Mot de passe trop court');

            if(count($errors) == 0)
            { 
                $insert_user = new Connect(array('user'=>$user, 'password'=>$password));

                $this->new_user->insertUser($insert_user);

                $user_message = '<p class="para-registration">Inscription enregistrée. Vous recevrez une confirmation prochainement pour commencer à publier sur le site.</p>';

                unset($user);
                unset($password);
            }
        }

        require_once 'views/viewRegister.php';

    }
}
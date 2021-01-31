<?php

// ENREGISTREMENTS DE NOUVEAUX MEMBRES

class ControllerCheckUserName
{
    private $new_user;
    
    public function __construct()
    {
        
        $this->new_user = new RepositoryConnect();
    }
    
    public function __invoke()
    {

        session_start();

        if(!empty($_SESSION['premium']))
            header('Location:'.URL.'backmember');

        $user = '';

        $password = '';

        // Le Pseudo doit nécessairement être unique !
        // On empêche ici l'injection de doublons et aussi dans la Base de données avec l'ajout de l'index UNIQUE ajouté à la colonne "user" de la table SQL cv_managers (ALTER TABLE `cv_managers` ADD UNIQUE( `user`);)

        if(!empty($_POST['pseudo']))
        {
            extract($_POST);

            $pseudo = htmlentities($pseudo);

            $getUsernames = $this->new_user->checkUsername();
            
            $gotoregister = '<p>PSEUDO DISPONIBLE</p>';

            $registerForm = '<form action="checkusername" method="post" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5 special-form-registration">
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

        if(!empty($_POST['user']) && !empty($_POST['password']))
        {
            extract($_POST);
            
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

        require_once('views/viewCheckUserName.php');

    }
}
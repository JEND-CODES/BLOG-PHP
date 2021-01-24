<?php

// Enregistrements de nouveaux membres

class ControllerCheckusername
{
    private $new_user;
    
    public function __construct()
    {
        
        $this->new_user = new RepositoryConnect();
    }
    
    public function __invoke()
    {

        session_start();
        
        // if(empty($_SESSION['connect']))
            // header('Location:'.URL.'login');

        // Si la session est en cours pour un membre
        if(!empty($_SESSION['premium']))

        // Go to Back office Member !!!
            header('Location:'.URL.'backmember');

        // Si la session Admin est en cours
        //if(!empty($_SESSION['connect']))

        // Go to Back office Admin !!!
        //header('Location:'.URL.'connect');

  
        $user = '';

        $password = '';

        if(!empty($_POST['pseudo']))
        {
            extract($_POST);

            $pseudo = htmlentities($pseudo);

            //unset($pseudo);

            $getUsernames = $this->new_user->checkUsername();
            
            $gotoregister = '<p style="color:black !important;">PSEUDO DISPONIBLE</p>';

            $registerForm = '<form action="checkusername" method="post" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5" style="margin-top:30px !important;">
            <p>
              <label class="sr-only" for="">Identifiant</label>
              <input id="input_checked" name="user" placeholder="Pseudo membre" class="form-control" type="text" readonly>
            </p>

            <p>
              <label class="sr-only" for="">Mot de passe</label>
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

            if(count($errors) == 0)
            { 
                $insert_user = new Connect(array('user'=>$user, 'password'=>$password));

                $this->new_user->insertUser($insert_user);

                $user_message = '<p style="color:black !important;font-size:16px !important;">Inscription enregistrée. Vous recevrez une confirmation prochainement pour commencer à publier sur le site.</p>';

                unset($user);
                unset($password);
            }
        }

        require_once('views/viewCheckusername.php');

    }
}
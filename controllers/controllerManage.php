<?php

class ControllerManage
{
    private $admin_connect;

    // Récupération infos utilisateurs
    private $admin_infos;
    
    public function __construct()
    {
     
        $this->admin_infos = new RepositoryConnect();

    }
    
    public function __invoke()
    {
  
        session_start();
        
        // Si la session Admin n'est pas en cours
        //if(empty($_SESSION['connect']))
            // Alors redirection à la page de Connexion Admin
            //header('Location:'.URL.'login');

        // Si la session Admin n'est pas en cours
        //if(empty($_SESSION['premium']))
            // Alors redirection à la page de Connexion Admin
            //header('Location:'.URL.'home');

        if($_SESSION['member_id'] != 1)
            header('Location:'.URL.'home');

        // NEW !! Pour affichage de toutes les infos des utilisateurs inscrits sur le blog

        // Les membres premium
        $getManagers = $this->admin_infos->infoManagers();
        
        // Les nouveaux inscrits en attente de validation
        $getFutureMembers = $this->admin_infos->newRegistered();
        

        // Méthode pour supprimer un utilisateur -> il faut que l'on retrouve dans le formulaire les infos name=trash_user + name=deleteuser
        
        if(!empty($_POST['trash_user']))
        {
            extract($_POST);    

            $this->admin_infos->deleteUser($delete_user);

            header("Refresh:0");
        }
        

        // Méthode pour mettre à jour un utilisateur -> il faut que l'on retrouve dans le formulaire les infos name=premium_user + name=update_role
        
        if(!empty($_POST['premium_user']))
        {
            extract($_POST);    

            $this->admin_infos->updateRole($update_role);

            header("Refresh:0");
        }
        

        require_once('views/viewManage.php');

    }
}
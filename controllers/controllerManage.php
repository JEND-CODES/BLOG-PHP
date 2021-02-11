<?php

namespace Controllers;

use Repository\RepositoryConnect;

use Utils\Session;

// GESTION DES MEMBRES EN BACK OFFICE

class ControllerManage
{
    // Récupération infos utilisateurs
    private $admin_infos;
    
    public function __construct()
    {
     
        $this->admin_infos = new RepositoryConnect();

    }
    
    public function __invoke()
    {

        $session = new Session();

        if($session->vars['member_id'] != 1)
            header('Location:'.URL.'home');


        // Affichage des nouveaux inscrits en attente de validation
        $getFutureMembers = $this->admin_infos->newRegistered();

        // Renvoi du nombre total de managers validés
        $count_managers = $this->admin_infos->countManagers();

        $getPage = filter_input(INPUT_GET, 'page');

        // Affichage des membres premium (avec pagination)
        if(isset($getPage) && !empty($getPage)){

            $limit = (int) strip_tags($getPage);

            $new_limit = $limit * 2;

            $getManagers = $this->admin_infos->infoManagers($new_limit); 
    
        }else{

            $new_limit = 0;

            $limit = 0;

            $getManagers = $this->admin_infos->infoManagers($limit);
        }
        
        // Méthode pour supprimer un utilisateur -> il faut que l'on retrouve dans le formulaire les infos name=trash_user + name=deleteuser
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $formTrash = filter_input(INPUT_POST, 'trash_user', FILTER_SANITIZE_STRING);
        
        if(!empty($formTrash))
        {
            extract($form);     

            $this->admin_infos->deleteUser($delete_user);

            header("Refresh:0");
        }
        

        // Méthode pour mettre à jour un utilisateur -> il faut que l'on retrouve dans le formulaire les infos name=premium_user + name=update_role
        $formPremium = filter_input(INPUT_POST, 'premium_user', FILTER_SANITIZE_STRING);
        
        if(!empty($formPremium))
        {
            extract($form);      

            $this->admin_infos->updateRole($update_role);

            header("Refresh:0");
        }
        

        require_once 'views/viewManage.php';

    }
    
}
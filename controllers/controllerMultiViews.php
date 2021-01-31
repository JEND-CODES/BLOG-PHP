<?php

// TESTS DE CHARGEMENT DE PLUSIEURS VUES AVEC LE MÊME CONTROLLER EN FONCTION DE CONDITIONS

class ControllerMultiViews
{
   
    // https://stackoverflow.com/questions/10183874/php-mvc-adding-more-views
    public function __invoke()
    {

        session_start();

        // isset — Détermine si une variable est déclarée et est différente de null
        if(!isset($_GET['type']))
        {
            // URL -> ../blog/multiviews
            require_once('views/One.php');
        }
        else
        {
            // URL -> ../blog/multiviews?type
            require_once('views/Two.php');
        }



        /*
        // empty — Détermine si une variable est vide
        if(!empty($_GET['first']))
        {
            require_once('views/One.php');
        }
        else
        {
            require_once('views/Two.php');
        }
        */



        // Condition d'affichage des views en fonction des sessions en cours ou non
        /*
        if(empty($_SESSION['member_id']))
        {
            require_once('views/One.php');
        }
        else
        {
            require_once('views/Two.php');
        }
        */

        

    }
  
}

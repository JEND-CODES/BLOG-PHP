<?php

namespace Controllers;

use Utils\Session;

// FIN DE SESSIONS

class ControllerLogout
{
    
    public function __invoke()
    {

        $session = new Session();

        unset($session->vars['premium']);

        unset($session->vars['member_id']);

        session_destroy();

        header('Location:'.URL.'home');

   }
   
}
<?php

require_once 'utils/Session.php';

// FIN DE SESSIONS

class ControllerLogout
{
    
    public function __invoke()
    {
  
        // session_start — Démarre une nouvelle session ou reprend une session existante
        // https://www.php.net/manual/fr/function.session-start.php
        // session_start();

        // Désactivation de la SESSION Membres Premium
        // unset($_SESSION['premium']);
        // unset($_SESSION['member_id']);

        $session = new Session();

        unset($session->vars['premium']);
        unset($session->vars['member_id']);

        //https://www.php.net/manual/fr/function.session-destroy.php
        session_destroy();

        header('Location:'.URL.'home');

   }
}
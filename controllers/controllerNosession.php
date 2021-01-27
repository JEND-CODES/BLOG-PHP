<?php

// FIN DE SESSIONS

class ControllerNosession
{
    
    public function __invoke()
    {
  
        // session_start — Démarre une nouvelle session ou reprend une session existante
        // https://www.php.net/manual/fr/function.session-start.php
        session_start();

        // Désactivation de la SESSION Membres Premium
        unset($_SESSION['premium']);
        unset($_SESSION['member_id']);

        //https://www.php.net/manual/fr/function.session-destroy.php
        session_destroy();

        header('Location:'.URL.'home');

   }
}
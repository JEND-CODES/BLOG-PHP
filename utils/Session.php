<?php

// CLASSE SESSION

// Création d'une classe Session suite aux messages d'erreur Codacy repérés dans les controllers : "Direct use of $_SESSION Superglobal detected..."

// https://stackoverflow.com/questions/38423954/how-to-access-superglobals-in-correct-way

class Session
{
    public $vars;

    public function __construct() {

        $this->vars = &$_SESSION;
    }
    /*

    Après il suffit d'instancier cette classe dans les controllers

    $session = new Session();
    $session->vars['value'] = "newValue";

    */

}


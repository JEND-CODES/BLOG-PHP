<?php

// PAGE D'ACCUEIL

class ControllerHome
{
   
    public function __invoke()
    {

        session_start();

        require_once('views/viewHome.php');

    }
  
}

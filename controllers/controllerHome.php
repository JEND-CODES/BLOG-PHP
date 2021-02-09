<?php

// PAGE D'ACCUEIL

class ControllerHome
{
   
    public function __invoke()
    {

        // session_start();

        require 'views/viewHome.php';

    }
  
}

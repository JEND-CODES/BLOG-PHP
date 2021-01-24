<?php

// Test de pagination

class ControllerAbc
{
    private $paginate;
    
    public function __construct()
    {
        
        $this->paginate = new RepositoryComment();
    }
    
    public function __invoke()
    {

        session_start();

        
        $count_comments = $this->paginate->totalComments();


        $select_all_comments = $this->paginate->selectAllComments();
        
        

        require_once('views/viewAbc.php');
            
    }
}

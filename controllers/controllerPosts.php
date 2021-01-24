<?php

class ControllerPosts
{
    private $posts;

    public function __construct()
    {

        $this->posts = new RepositoryChapter;
        
    }
    
    public function __invoke()
    {
        
        session_start();
        
        $chapters = $this->posts->selectChaptersDesc();
        
       
        require_once('views/viewPosts.php');

    }
  
}

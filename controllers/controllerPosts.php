<?php

// LISTE DES DERNIERS ARTICLES

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

        $count_chapters = $this->posts->totalChapters();

        if(empty($_POST['next_page']))
        {   

            $limit = 0;

            $chapters = $this->posts->paginateChapters($limit);     
        }
        
        for ($i = 0; $i < $count_chapters; $i++) {

            if(!empty($_POST['next_page_'.$i]))
            {

                $new_limit = $i * 5;

                $chapters = $this->posts->paginateChapters($new_limit); 

            }
        }
        
        // $chapters = $this->posts->selectChaptersDesc();
        
        require_once('views/viewPosts.php');

    }
  
}

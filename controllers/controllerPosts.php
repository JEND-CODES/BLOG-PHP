<?php

namespace Controllers;

use Repository\RepositoryChapter;

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

        $count_chapters = $this->posts->totalChapters();

        $getPage = filter_input(INPUT_GET, 'page');

        if(isset($getPage) && !empty($getPage)){

            $limit = (int) strip_tags($getPage);

            $new_limit = $limit * 5;

            $chapters = $this->posts->paginateChapters($new_limit); 
    
        } else
        {

            $new_limit = 0;

            $limit = 0;

            $chapters = $this->posts->paginateChapters($limit);
        }
        
        require_once 'views/viewPosts.php';

    }
  
}

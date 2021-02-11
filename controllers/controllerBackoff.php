<?php

namespace Controllers;

use Repository\RepositoryConnect;

use Repository\RepositoryChapter;

use Utils\Session;

// ACCÈS AU BACK OFFICE

class ControllerBackoff
{
    private $member_connect;
 
    private $filter_chapters;
    
    public function __construct()
    {
        // Appel au RepositoryConnect pour afficher le nom de l'utilisateur en cours
        $this->member_connect = new RepositoryConnect();

        // Appel au RepositoryChapter pour filtrer les publications en fonction de l'ID du membre connecté
        $this->filter_chapters = new RepositoryChapter();

    }
    
    public function __invoke()
    {

        $session = new Session();

        if(empty($session->vars['premium']))
            header('Location:'.URL.'home');

        if($session->vars['member_id'] == 1)
        {

            // Renvoi du nombre total d'articles
            $count_chapters = $this->filter_chapters->totalChapters();

            $getPage = filter_input(INPUT_GET, 'page');

            // Gestion de la pagination pour l'administrateur
            if(isset($getPage) && !empty($getPage)){

                $limit = (int) strip_tags($getPage);
    
                $new_limit = $limit * 5;
    
                $postsAuthors = $this->filter_chapters->selectAllPosts($new_limit); 
        
            }else{
    
                $new_limit = 0;
    
                $limit = 0;
    
                $postsAuthors = $this->filter_chapters->selectAllPosts($limit);
            }

        } else 
        {

            // Renvoi du nombre total d'articles publiés par un membre
            $count_chapters = $this->filter_chapters->countPostsByUser();

            // Gestion de la pagination pour un membre
            if(isset($getPage) && !empty($getPage)){

                $limit = (int) strip_tags($getPage);
    
                $new_limit = $limit * 5;
    
                $postsAuthors = $this->filter_chapters->selectPostsByUserId($new_limit); 
        
            }else{
    
                $new_limit = 0;
    
                $limit = 0;
    
                $postsAuthors = $this->filter_chapters->selectPostsByUserId($limit);
            }

        }

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $formDelete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);

        if(!empty($formDelete))
        {
            extract($form); 

            $this->filter_chapters->deleteChapter($edit);

            $supprime = 'Article supprimé';     
        }

        require_once 'views/viewBackoff.php';

    }
    
}
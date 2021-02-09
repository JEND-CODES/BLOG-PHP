<?php

require_once 'utils/Session.php';

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
        
        // session_start();

        /*
        if(empty($_SESSION['premium']))
            header('Location:'.URL.'home');
        */

        $session = new Session();

        if(empty($session->vars['premium']))
            header('Location:'.URL.'home');

        // if($_SESSION['member_id'] == 1)
        if($session->vars['member_id'] == 1)
        {

            // Renvoi du nombre total d'articles
            $count_chapters = $this->filter_chapters->totalChapters();

            /*
            // Gestion de la pagination pour l'administrateur
            if(empty($_POST['next_page']))
            {   

                $limit = 0;

                $postsAuthors = $this->filter_chapters->selectAllPosts($limit);     
            }
        
            for ($i = 0; $i < $count_chapters; $i++) {

                if(!empty($_POST['next_page_'.$i]))
                {

                    $new_limit = $i * 5;

                    $postsAuthors = $this->filter_chapters->selectAllPosts($new_limit); 

                }
            }
            */

            // Gestion de la pagination pour l'administrateur
            if(isset($_GET['page']) && !empty($_GET['page'])){

                $limit = (int) strip_tags($_GET['page']);
    
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

            /*
            // Gestion de la pagination pour un membre
            if(empty($_POST['next_page']))
            {   

                $limit = 0;

                $postsAuthors = $this->filter_chapters->selectPostsByUserId($limit);     
            }
        
            for ($i = 0; $i < $count_chapters; $i++) {

                if(!empty($_POST['next_page_'.$i]))
                {

                    $new_limit = $i * 5;

                    $postsAuthors = $this->filter_chapters->selectPostsByUserId($new_limit); 

                }
            }
            */

            // Gestion de la pagination pour un membre
            if(isset($_GET['page']) && !empty($_GET['page'])){

                $limit = (int) strip_tags($_GET['page']);
    
                $new_limit = $limit * 5;
    
                $postsAuthors = $this->filter_chapters->selectPostsByUserId($new_limit); 
        
            }else{
    
                $new_limit = 0;
    
                $limit = 0;
    
                $postsAuthors = $this->filter_chapters->selectPostsByUserId($limit);
            }

        }

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $postDelete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);

        /* 
        if(!empty($_POST['delete']))
        {
            extract($_POST);    
        */

        if(!empty($postDelete))
        {
            extract($post); 

            $this->filter_chapters->deleteChapter($edit);

            $supprime = 'Article supprimé';     
        }

        require_once 'views/viewBackoff.php';

    }
}
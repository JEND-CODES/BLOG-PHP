<?php

// ACCÈS AU BACK OFFICE

class ControllerBackmember
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
  
        session_start();

        if(empty($_SESSION['premium']))
            header('Location:'.URL.'home');

        if($_SESSION['member_id'] == 1)
        {
            $postsAuthors = $this->filter_chapters->selectAllPosts();
        } else 
        {
            $postsAuthors = $this->filter_chapters->selectPostsByUserId();
        }

        if(!empty($_POST['delete']))
        {
            extract($_POST);    

            $this->filter_chapters->deleteChapter($edit);

            $supprime = 'Article supprimé';     
        }

        require_once('views/viewBackmember.php');

    }
}
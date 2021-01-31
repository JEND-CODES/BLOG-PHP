<?php

// MISE À JOUR D'UN ARTICLE EN BACK OFFICE

class ControllerChangePost
{ 
    private $post_bis;
    
    public function __construct()
    {
        $this->post_bis = new RepositoryChapter();
    }
    
    public function __invoke()
    {
   
        session_start();
        
        if(empty($_SESSION['premium']))
            header('Location:'.URL.'home');

        if(empty($_GET['id']) OR !is_numeric($_GET['id']))
            throw new Exception('Page introuvable'); 
        else
        {
            extract($_GET);
            $id = htmlentities($id);

            $chapter = $this->post_bis->selectChapter($id); 

            if(!empty($_POST))
            {
                extract ($_POST);
                $errors = array();

                $title = htmlentities($title);

                $chapi = htmlentities($chapi);

                $zerolink = htmlentities($zerolink);

                $author = htmlentities($author);

                if(empty($title))
                    array_push($errors, 'Le titre est manquant');
                
                if(!empty($title) && strlen($title)>400)
                array_push($errors, "Titre trop long");

                if(empty($chapi))
                    array_push($errors, 'Précisez le résumé du post');

                if(empty($author))
                    array_push($errors, 'Précisez l\'auteur du post');

                if(empty($content))
                    array_push($errors, 'Le contenu est manquant');

                if(count($errors) == 0)
                { 
                    $chapter->setTitle($title);
                    $chapter->setContent($content);
                    $chapter->setChapi($chapi);
                    $chapter->setZerolink($zerolink);
                    $chapter->setAuthor($author);

                    $this->post_bis->updateChapter($chapter);

                    $checked = 'Article modifié';

                }
            }


        }

        require_once('views/viewChangePost.php');

    }
}
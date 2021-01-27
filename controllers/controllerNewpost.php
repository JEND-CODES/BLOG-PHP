<?php

// EDITION D'UN NOUVEL ARTICLE EN BACK OFFICE

class ControllerNewpost
{
    private $new_chapter;
    
    public function __construct()
    {
        
        $this->new_chapter = new RepositoryChapter();
    }
    
    public function __invoke()
    {

        session_start();
        
        if(empty($_SESSION['premium']))
            header('Location:'.URL.'home');

        if(!empty($_POST))
        {
            extract($_POST);
            $errors = array();

            $title = htmlentities($title);

            $chapi = htmlentities($chapi);

            $zerolink = htmlentities($zerolink);

            //$author = htmlentities($author);

            //$userid = htmlentities($userid);

            if(empty($title))
                array_push($errors, 'Titre manquant');
            
            if(!empty($title) && strlen($title)>400)
                array_push($errors, "Titre trop long");

            if(empty($chapi))
                array_push($errors, 'Précisez le numéro du chapitre');

            if(empty($content))
                array_push($errors, 'Contenu manquant');

            if(count($errors) == 0)
            { 
                //$edit = new Chapter(array('title'=>$title, 'content'=>$content,'chapi'=>$chapi,'zerolink'=>$zerolink,'author'=>$author,'userid'=>$userid));

                $edit = new Chapter(array('title'=>$title, 'content'=>$content,'chapi'=>$chapi,'zerolink'=>$zerolink));

                $this->new_chapter->insertChapter($edit);

                $increase = 'Post publié';

                unset($title);
                unset($chapi);
                unset($content);
                unset($zerolink);
            }
        }

        require_once('views/viewNewpost.php');

    }
}
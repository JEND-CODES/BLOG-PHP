<?php

require_once 'utils/Session.php';

// EDITION D'UN NOUVEL ARTICLE EN BACK OFFICE

class ControllerNew
{
    private $new_chapter;
    
    public function __construct()
    {
        
        $this->new_chapter = new RepositoryChapter();
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

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        /*
        if(!empty($_POST))
        {
            extract($_POST);
        */

        if(!empty($post))
        {
            extract($post);

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

        require_once 'views/viewNew.php';

    }
}
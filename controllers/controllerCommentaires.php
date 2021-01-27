<?php

// GESTION DES COMMENTAIRES EN BACK OFFICE

class ControllerCommentaires
{
    private $back_comment;
    
    public function __construct()
    {
        $this->back_comment = new RepositoryComment();
    }
    
    public function __invoke()
    {
      
        session_start();
        
        //if(empty($_SESSION['connect']))
            //header('Location:'.URL.'login');

        //if(empty($_SESSION['premium']))
            //header('Location:'.URL.'access');

        if($_SESSION['member_id'] != 1)
            header('Location:'.URL.'home');    

        if(!empty($_POST['delete']))
        {
            extract($_POST);

            $this->back_comment->deleteComment($act);

            $drop = 'Commentaire supprimé';     
        }

        $alarmComments = $this->back_comment->selectAlarmComments();

        $alarmComments2 = $this->back_comment->selectAlarmCommentsDesc();

        if(!empty($_POST['show']))
            {
                extract($_POST);

                $this->back_comment->freeComment($act);

                $freely = 'Commentaire autorisé';     
            }

        require_once('views/viewCommentaires.php');
      
    }
}
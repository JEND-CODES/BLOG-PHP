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

        if($_SESSION['member_id'] != 1)
            header('Location:'.URL.'home');
            
        // Total des commentaires validés par l'administrateur
        $count_comments = $this->back_comment->checkedComments();

        // Affichage des commentaires en attente de validation
        $alarmComments = $this->back_comment->selectAlarmComments();
        
        // Affichage des commentaires déjà validés (avec pagination, 5 par page)
        if(empty($_POST['next_page']))
        {

            $limit = 0;

            $alarmComments2 = $this->back_comment->selectAlarmCommentsDesc($limit);     
        }
        

        for ($i = 0; $i < $count_comments; $i++) {

            if(!empty($_POST['next_page_'.$i]))
            {

                $new_limit = $i * 3;

                $alarmComments2 = $this->back_comment->selectAlarmCommentsDesc($new_limit); 

            }

        }

        if(!empty($_POST['delete']))
        {
            extract($_POST);

            $this->back_comment->deleteComment($act);

            $drop = 'Commentaire supprimé';     
        }

        if(!empty($_POST['show']))
            {
                extract($_POST);

                $this->back_comment->freeComment($act);

                $freely = 'Commentaire autorisé';     
            }

        require_once('views/viewCommentaires.php');
      
    }

}
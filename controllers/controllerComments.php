<?php

// require_once 'utils/Session.php';

// GESTION DES COMMENTAIRES EN BACK OFFICE

class ControllerComments
{
    private $back_comment;
    
    public function __construct()
    {
        $this->back_comment = new RepositoryComment();
    }
    
    public function __invoke()
    {
        
        // session_start();

        /*
        if($_SESSION['member_id'] != 1)
            header('Location:'.URL.'home');
        */

        $session = new Session();

        // if($_SESSION['member_id'] == 1)
        if($session->vars['member_id'] != 1)
            header('Location:'.URL.'home');

        // Total des commentaires validés par l'administrateur
        $count_comments = $this->back_comment->checkedComments();

        // Affichage des commentaires en attente de validation
        $alarmComments = $this->back_comment->selectAlarmComments();

        $getPage = filter_input(INPUT_GET, 'page');

        // Affichage des commentaires déjà validés (avec pagination, 5 par page)
        if(isset($getPage) && !empty($getPage)){

            $limit = (int) strip_tags($getPage);

            $new_limit = $limit * 3;

            $alarmComments2 = $this->back_comment->selectAlarmCommentsDesc($new_limit); 
    
        }else{

            $new_limit = 0;

            $limit = 0;

            $alarmComments2 = $this->back_comment->selectAlarmCommentsDesc($limit);
        }

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $formDelete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);

        /*
        if(!empty($_POST['delete']))
        {
            extract($_POST);
        */
        
        if(!empty($formDelete))
        {
            extract($form); 

            $this->back_comment->deleteComment($act);

            $drop = 'Commentaire supprimé';     
        }


        $formShow = filter_input(INPUT_POST, 'show', FILTER_SANITIZE_STRING);

        /*
        if(!empty($_POST['show']))
        {
            extract($_POST);
        */
        
        if(!empty($formShow))
        {
            extract($form); 

                $this->back_comment->freeComment($act);

                $freely = 'Commentaire autorisé';     
            }

        require_once 'views/viewComments.php';
      
    }

}
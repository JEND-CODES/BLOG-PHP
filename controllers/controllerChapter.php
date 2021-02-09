<?php

// AFFICHAGE DE CHAQUE ARTICLE ET DES COMMENTAIRES ASSOCIÉS

class ControllerChapter
{
    private $show_post;

    private $commentaries;
    
    public function __construct()
    {
        
        $this->show_post = new RepositoryChapter();

        $this->commentaries = new RepositoryComment();
    }
 
    public function __invoke()
    {
    
        // session_start();
        // Contrôle du paramètre Get correspondant à l'Id de l'article
        // Le controller fait un test, un contrôle : il vérifie qu'on a reçu ou non en paramètre un id dans l'url ( $_GET['id'] )

        if(empty($_GET['id']) OR !is_numeric($_GET['id']))
            throw new Exception('Page introuvable'); 
        else
        {
            extract($_GET);
            // Méthode pour récupérer l'ID du chapitre

            $id = htmlentities($id);

            // Contrôle des champs obligatoires pour commenter un article
            if(!empty($_POST['add']))
            {
                extract($_POST);

                $errors = array();
                
                // Le tableau $errors doit rester vide pour valider le formulaire 

                // Empêcher les attaques XSS. Utiliser la fonction plus approprié htmlentities()
                
                $pseudo = htmlentities($pseudo);

                $email = htmlentities($email);

                $comment = htmlentities($comment);

                if(empty($pseudo))
                    array_push($errors, 'Pseudo manquant');

                if(!empty($pseudo) && strlen($pseudo)<3)
                    array_push($errors, 'Votre pseudo est trop court');

                if(!empty($pseudo) && strlen($pseudo)>30)
                    array_push($errors, 'Votre pseudo est trop long');

                if(empty($email))
                array_push($errors, 'Entrez votre Email');

                if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
                   array_push($errors, 'Format d\'Email invalide');
                }

                if(empty($comment))
                    array_push($errors, 'Commentaire manquant');

                if(!empty($comment) && strlen($comment)>280)
                    array_push($errors, 'Votre commentaire est trop long');

                // S'il n'y a pas d'erreurs, ajout d'un commentaire dans la base de données
                if(count($errors) == 0)
                { 
                    $insertcom = new Comment(array('chapterId'=>$id, 'pseudo'=>$pseudo, 'comment'=>$comment, 'email'=>$email));
                    
                    $this->commentaries->insertComment($insertcom);

                    $realized = 'Commentaire en attente de validation';

                    unset($email);
                    unset($pseudo);
                    unset($comment);
                }
            }


            // Sélection de l'ID d'un article avec format de date modifié
            $chapter = $this->show_post->selectChapterFront($id);
            
            // Select article précédent
            $prevChapter = $this->show_post->prevChapter($id);   

            // Select article suivant
            $nextChapter = $this->show_post->nextChapter($id);

            // Sélection des commentaires associés à chaque article
            $comments = $this->commentaries->selectComments($id);

            if($comments == NULL)
            {
                $nocomment = '<p>Encore aucun commentaire pour cet article</p>';
            } else
            {
                $nocomment = '<h3>Commentaires</h3>';
            }

        }

        require_once 'views/viewChapter.php';
         
    }
    
}




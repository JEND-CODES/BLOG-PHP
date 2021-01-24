<?php

// POO class -> Accès au Back Office

class ControllerBackmember
{
    private $member_connect;

    //private $admin_chapters;
 
    private $filter_chapters;
    
    public function __construct()
    {
        // Appel au RepositoryConnect pour afficher le nom de l'utilisateur en cours
        $this->member_connect = new RepositoryConnect();
        
        // Appel au RepositoryChapter pour afficher les publications
        // $this->admin_chapters = new RepositoryChapter();

        // Appel au RepositoryChapter pour filtrer les publications en fonction de l'ID du current member connecté
        $this->filter_chapters = new RepositoryChapter();

    }
    
    public function __invoke()
    {
  
        session_start();
        
        // NEW !! Si la session Membres n'est pas en cours
        if(empty($_SESSION['premium']))
            // Alors redirection au Back Off Membres
            header('Location:'.URL.'home');

        
        if($_SESSION['member_id'] == 1)
        {
            $postsAuthors = $this->filter_chapters->selectAllPosts();
        } else 
        {
            $postsAuthors = $this->filter_chapters->selectPostsByUserId();
        }

        // $premium = $this->member_connect->selectUser($_SESSION['premium']); 


        if(!empty($_POST['delete']))
        {
            extract($_POST);    

            $this->filter_chapters->deleteChapter($edit);

            $supprime = 'Article supprimé';     
        }



        //$chapters = $this->admin_chapters->selectChapters();

        // $chaptersAuthor = $this->filter_chapters->selectChaptersAuthor();        


        // Création d'une session USER_ID qui stocke l'ID du membre connecté : cet ID sert ensuite à filtrer les posts uniquement publié par l'auteur connecté
        /*
        $identities = $this->member_connect->retrieveId();

        foreach ($identities as $identity) {

        
            // $_SESSION['identity'] = $identity;


            // on récupère l'ID du membre
            $userId = $identity->getId();

            // on stocke cet ID en session
            $_SESSION['user_id'] = $userId;

              

        }
        */

        /*
        if($_SESSION['user_id'] == 1)
        {
            $postsAuthors = $this->filter_chapters->selectAllPosts();
        } else 
        {
            $postsAuthors = $this->filter_chapters->selectPostsByUserId();
        }
        */
        

        // On appelle la fonction du repositoryChapter qui sélectionne les posts en fonction de la valeur ID stockée dans la $_SESSION['truc']
        //$postsAuthors = $this->filter_chapters->selectPostsByUserId();

        // EN PHASE TESTS
        /*
        $recupId = $this->member_connect->getUserById();

        if($recupId == true)
        {
            $_SESSION['billy'] = $recupId;
        }
        */


        require_once('views/viewBackmember.php');

    }
}
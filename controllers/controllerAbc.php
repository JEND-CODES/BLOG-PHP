<?php

// TEST DE PAGINATION

class ControllerAbc
{
    private $paginate;
    
    public function __construct()
    {
        
        $this->paginate = new RepositoryComment();
    }
    
    public function __invoke()
    {

        session_start();

        
        $count_comments = $this->paginate->totalComments();


        // Les variables PHP $_GET et $_POST sont utilisées pour collectées les données postées par les formulaires. $_GET et $_POST sont des tableaux associatifs contenant des paires clé/valeur où les clés sont les noms des contrôles de formulaires (name="...") et les valeurs sont les données d'entrée de l'utilisateur.


        // https://www.youtube.com/watch?v=8WoxPWVxXHI
        // https://openclassrooms.com/forum/sujet/pagination-mvc
        /*
        if (isset($_GET['page'])) {
            $page = (int) $_GET['page'];
            if ($page > $limit[1] || $page < 0) {
                header('Location:vues/404.php');
            }
        } else {
            $page = 1;
        */

        
        // Attention à bien paramétrer le HTACCESS avec la mention [L,QSA] pour prendre en compte les modifications $_GET !!!
        // RewriteRule ^(.*)$ index.php?action=$1 [L,QSA]

        // PAGINATION RÉVISÉE EN $_GET (31 JANVIER)
        if(isset($_GET['page']) && !empty($_GET['page'])){

            // Je récupère le numéro en cours $_GET['page']
            $limit = (int) strip_tags($_GET['page']);

            $new_limit = $limit * 5;

            $comment_lists = $this->paginate->pagination($new_limit); 
    
        }else{

            $new_limit = 0;

            $limit = 0;

            $comment_lists = $this->paginate->pagination($limit);
        }
        


        // VERSION AVEC LE CONTRÔLE DE L'OFFSET DANS L'URL (DÉCALAGE, NOMBRE D'ARTICLE PAR PAGE)
        // ex : /blog/abc?page=1&by_page=3
        /*
        if(isset($_GET['page']) && !empty($_GET['page'] && isset($_GET['by_page']) && !empty($_GET['by_page']))){

            // Je récupère le numéro en cours $_GET['page']
            $limit = (int) strip_tags($_GET['page']);

            // Cela définit le nombre de messages que l'on souhaite voir sur une page
            $offset = (int) strip_tags($_GET['by_page']);

            // Cela définit le point de départ à partir duquel les messages vont être sélectionnés en BDD
            $new_limit = $limit * 5;

            $comment_lists = $this->paginate->paginationOffset($new_limit, $offset); 
    
        }else{

            $new_limit = 0;

            $limit = 0;

            $offset = 5;

            $comment_lists = $this->paginate->paginationOffset($limit, $offset);
        }
        */
        







        //$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
/*
        if(isset($_GET['page'])) {
            $page = (int)$_GET['page'];
         } else {
             $page = 1;
         }
*/
        // $new_limit = $_GET['page'];






// Question : utiliser $_POST pour une pagination ? ou $_GET ? https://stackoverflow.com/questions/26446552/php-pagination-post-or-get
/*
        if(empty($_POST['next_page']))
        {
            //extract($_POST);    

            $limit = 0;

            $comment_lists = $this->paginate->pagination($limit);     
        }
        */
        /*
        if(!empty($_POST['next_page']))
        {
            //extract($_POST);
            
            $new_limit = 1;

            $comment_lists = $this->paginate->pagination($new_limit); 

            // $count_comments = $this->paginate->totalComments();
            
            // $comment_lists = $this->paginate->pagination($count_comments);
        }
        */

        /*
        if(!empty($_POST['next_page_2']))
        {
            //extract($_POST);
            
            $new_limit = 2;

            $comment_lists = $this->paginate->pagination($new_limit); 

            // $count_comments = $this->paginate->totalComments();
            
            // $comment_lists = $this->paginate->pagination($count_comments);
        }
*/




        /*
        foreach ($_POST as $name => $value) {
            echo $name; // email, for example
            //echo $value; // the same as echo $_POST['email'], in this case


                if(!empty($_POST['next_page_'.$i]))
            {
                //extract($_POST);
                
                $new_limit = 2;

                $comment_lists = $this->paginate->pagination($new_limit); 

                // $count_comments = $this->paginate->totalComments();
                
                // $comment_lists = $this->paginate->pagination($count_comments);
            }
        }
        */
        

        
        // for ($i=0; $i < $count_comments; $i++)
        // echo $_POST['item_number'.$i]."<br />";
/*
        for ($i = 0; $i < $count_comments; $i++) {

            if(!empty($_POST['next_page_'.$i]))
            {

                $new_limit = $i * 5;

                $comment_lists = $this->paginate->pagination($new_limit); 

            }

        }
        */
        

      
        


/*
        $element = "<p>BILLY</p>";

        // $count = $count_comments;

        $count = 6;
        for ($i = 0; $i < $count; $i++) {
            echo $element;
        }
*/

        /*
        if(isset($_GET['page']) == 'billy')
        {
            header('Location:'.URL.'home');
            exit;
        }
        */
        

        require_once('views/Abc.php');
            
    }
}

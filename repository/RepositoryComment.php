<?php

class RepositoryComment extends Database
{
    
    // Cf. Tuto OpenC https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet
    
    // SÉLECTION DE TOUS LES COMMENTAIRES (AFFICHAGE POUR UN ARTICLE APRÈS VALIDATION DES COMMENTAIRES)
    public function selectComments($chapterId)
    {
        $comments = [];
        
        $req = $this->connectDB()->prepare(
            'SELECT *, 
            date AS commentDate 
            FROM cv_comments 
            WHERE chapter_id = ?
            AND alarm > 0 
            ORDER BY id 
            DESC');
        
        $req->execute(array($chapterId)); 
        while($data = $req->fetch())
        {
            $comments[] = new Comment($data);
        }
        return $comments;
        $req->closeCursor();
    }
  
    // AJOUT D'UN COMMENTAIRE
    public function insertComment($insertcom)
    {
        $req = $this->connectDB()->prepare('INSERT INTO cv_comments (email, chapter_id, pseudo, comment, date) VALUES(?, ?, ?, ?, NOW())');
        
        $req->execute(array($insertcom->getEmail(), $insertcom->getChapterId(), $insertcom->getPseudo(), $insertcom->getComment()));
        
        $req->closeCursor();
    }
    
     // SUPPRESSION D'UN COMMENTAIRE
    public function deleteComment($act)
    { 
        $req = $this->connectDB()->prepare('DELETE FROM cv_comments WHERE id = ?');
        
        $req->execute(array($act));
        $req->closeCursor();
    }

    // AUTORISATION D'AFFICHAGE D'UN COMMENTAIRE
    public function freeComment($act)
    {
        $req = $this->connectDB()->prepare('UPDATE cv_comments SET alarm = alarm+1 WHERE id = ?');
        
        $req->execute(array($act));
        $req->closeCursor();
    }
   
    // SÉLECTION DE TOUS LES COMMENTAIRES PAR ORDRE DÉCROISSANT À CONDITION QU'ILS NE SOIENT PAS ENCORE AUTORISÉS POUR PUBLICATION
    public function selectAlarmComments()
    {
        $alarmComments = [];
        
        $req = $this->connectDB()->prepare(
            'SELECT *, 
            date AS commentDate 
            FROM cv_comments 
            WHERE alarm < 1 
            ORDER BY id 
            DESC'
        );
        $req->execute(); 
        while($data = $req->fetch())
        {
            $alarmComments[] = new Comment($data);
        }
        return $alarmComments;
        $req->closeCursor();        
    }
    
    // SÉLECTION DE TOUS LES COMMENTAIRES PAR ORDRE DÉCROISSANT À CONDITION QU'ILS SOIENT DÉJÀ AUTORISÉS POUR LA PUBLICATION
    /*
    public function selectAlarmCommentsDesc()
    {
        $alarmComments2 = [];
        
        $req = $this->connectDB()->prepare(
            'SELECT *, 
            date AS commentDate 
            FROM cv_comments 
            WHERE alarm > 0 
            ORDER BY id 
            DESC'
        );
        $req->execute(); 
        while($data = $req->fetch())
        {
            $alarmComments2[] = new Comment($data);
        }
        return $alarmComments2;
        $req->closeCursor();        
    }
    */

    // SÉLECTION DE TOUS LES COMMENTAIRES PAR ORDRE DÉCROISSANT À CONDITION QU'ILS SOIENT DÉJÀ AUTORISÉS POUR LA PUBLICATION (AFFICHAGE AVEC PAGINATION)
    function selectAlarmCommentsDesc($limit){
        
        $alarmComments2 = [];

        $req = $this->connectDB()->prepare(
            'SELECT *, 
            date AS commentDate 
            FROM cv_comments 
            WHERE alarm > 0 
            ORDER BY id 
            DESC
            LIMIT :limit, 3'
        );

        // $req->bindParam(':offset',$offset, PDO::PARAM_INT);
        $req->bindParam(':limit', $limit, PDO::PARAM_INT);

        $req->execute();

        while($data = $req->fetch())
        {
            $alarmComments2[] = new Comment($data);
        }

        return $alarmComments2;

        $req->closeCursor(); 
            
    }

    // NOMBRE TOTAL DE COMMENTAIRES VALIDÉS PAR L'ADMINISTRATEUR
    public function checkedComments()
    {
        $req = $this->connectDB()->prepare('SELECT COUNT(*) AS nb_comments FROM cv_comments WHERE alarm > 0');

        $req->execute();

        $result = $req->fetch();

        $nbComments = (int) $result['nb_comments'];

        return $nbComments;

        $req->closeCursor();
    }
    
    // NOMBRE TOTAL DE COMMENTAIRES (UTILISÉ DANS LE PROCESS DE PAGINATION)
    public function totalComments()
    {
        $req = $this->connectDB()->prepare('SELECT COUNT(*) AS nb_comments FROM cv_comments');

        $req->execute();

        $result = $req->fetch();

        $nbComments = (int) $result['nb_comments'];

        return $nbComments;

        $req->closeCursor();
    }

    // PAGINATION DES COMMENTAIRES (TEST PAGE ABC.PHP)
    // On pagine ici sans besoin d'utiliser l'offset
    // function pagination($offset, $limit) {
    function pagination($limit){
        
        $comment_lists = [];

        // Apparemment on peut se passer de ces deux premières lignes de déclarations de variables -> Puisque les variables sont passées en paramètres et qu'on effectue un bindParam()
        // $offset = (int)$offset;
        // $limit = (int)$limit;
         
        // $req = $this->connectDB()->prepare('SELECT * FROM cv_comments LIMIT :offset,:limit');

        $req = $this->connectDB()->prepare('SELECT * FROM cv_comments LIMIT :limit, 5');

        // $req->bindParam(':offset',$offset, PDO::PARAM_INT);
        $req->bindParam(':limit', $limit, PDO::PARAM_INT);

        $req->execute();

        while($data = $req->fetch())
        {
            $comment_lists[] = new Comment($data);
        }

        return $comment_lists;

        $req->closeCursor(); 
            
    }

    // PAGINATION AVEC OFFSET DES COMMENTAIRES (TEST PAGE ABC.PHP)
    function paginationOffset($limit, $offset) {
        
            $comment_lists = [];
    
            $req = $this->connectDB()->prepare('SELECT * FROM cv_comments LIMIT :limit, :offset');
    
            $req->bindParam(':limit', $limit, PDO::PARAM_INT);
            $req->bindParam(':offset',$offset, PDO::PARAM_INT);
    
            $req->execute();
    
            while($data = $req->fetch())
            {
                $comment_lists[] = new Comment($data);
            }
    
            return $comment_lists;
    
            $req->closeCursor(); 
                
        }
    





}
<?php

class RepositoryComment extends Database
{
    
    // cf. Tuto OpenC https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet
    
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
    

    // Tuto Pagination Php : https://nouvelle-techno.fr/actualites/mettre-en-place-une-pagination-en-php

    // ON DÉTERMINE LE NOMBRE TOTAL DE COMMENTAIRES
    public function totalComments()
    {
        $req = $this->connectDB()->prepare('SELECT COUNT(*) AS nb_comments FROM cv_comments');
        $req->execute();
        $result = $req->fetch();
        $nbComments = (int) $result['nb_comments'];
        return $nbComments;
        $req->closeCursor();
    }

    // SÉLECTION DE TOUS LES COMMENTAIRES PAR ORDRE DÉCROISSANT POUR TEST PAGINATION (viewAbc.php)
    public function selectAllComments()
    {
        $allComments = [];
        
        $req = $this->connectDB()->prepare(
            'SELECT *, 
            date AS commentDate 
            FROM cv_comments 
            ORDER BY id 
            DESC'
        );
        $req->execute(); 

        while($data = $req->fetch())
        {
            $allComments[] = new Comment($data);
        }

        return $allComments;
        
        $req->closeCursor();        
    }






}
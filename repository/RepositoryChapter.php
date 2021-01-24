<?php

class RepositoryChapter extends Database
{
    
    //Création de méthodes -> Pour la déclaration de méthodes, il suffit de faire précéder le mot-clé function à la visibilité de la méthode
    
    // CF. Tuto OpenC https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet
     // https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4678891-nouvelle-fonctionnalite-afficher-des-commentaires
    
    // Cf. méthode FETCH https://www.php.net/manual/fr/pdostatement.fetch.php

    // RÉCUPÉRATION DES DIX DERNIERS ARTICLES (POUR PAGE DERNIERS POSTS)
    public function selectChaptersDesc()
    {  
        $chapters1 = array();
        
        $req = $this->connectDB()->query(
            'SELECT *,
            date AS chapterDate, 
            refreshdate 
            FROM cv_chapters 
            ORDER BY id 
            DESC 
            LIMIT 0,10'
        );
        
        $req->execute();
        while($data = $req->fetch())
        {
            $chapters1[] = new Chapter($data);
        }

        return $chapters1;
        
        $req->closeCursor();
    }

    // FILTRAGE DE POSTS PAR ID DE L'AUTEUR (EN BACK OFFICE)
    public function selectPostsByUserId()
    {  
        $postsAuthor = array();

        // Filtrage en fonction de l'ID Membre stocké dans la SESSION en cours
        $currentUserId = $_SESSION['member_id'];
    
        $req = $this->connectDB()->query(
            "SELECT *, 
            date AS chapterDate, 
            refreshdate
            FROM cv_chapters       
            WHERE userid = '".$currentUserId."' 
            ORDER BY id 
            DESC"
        );

        $req->execute();

        while($data = $req->fetch())
        {
            $postsAuthor[] = new Chapter($data);
        }
        
        return $postsAuthor;

        $req->closeCursor();
    }

    // LISTE DE TOUS LES POSTS (SANS FILTRAGE) EN BACK OFFICE POUR L'ADMINISTRATEUR
    public function selectAllPosts()
    {  
        $postsAuthor = array();

        $req = $this->connectDB()->query(
            "SELECT *, 
            date AS chapterDate, 
            refreshdate
            FROM cv_chapters 
            ORDER BY id 
            DESC"
        );

        $req->execute();

        while($data = $req->fetch())
        {
            $postsAuthor[] = new Chapter($data);
        }
        
        return $postsAuthor;

        $req->closeCursor();
    }
    
    // RÉCUPÉRATION D'UN ARTICLE SPÉCIFIQUE POUR MODIFICATIONS EN BACK OFFICE
    public function selectChapter($id)
    {
        $req = $this->connectDB()->prepare(
            'SELECT * 
            FROM cv_chapters 
            WHERE id = ?'
        );
        
        $req->execute(array($id));
        // https://www.php.net/manual/fr/pdostatement.rowcount.php
        if($req->rowCount() == 1)
        {
            $data = $req->fetch();
            return new Chapter($data);   
        }
        else
            throw new Exception('Erreur');

        $req->closeCursor();
    }
    
    // AFFICHAGE D'UN ARTICLE
    public function selectChapterFront($id)
    {
        $req = $this->connectDB()->prepare(
            'SELECT *,
            date AS chapterDate, 
            refreshdate
            FROM cv_chapters 
            WHERE id = ?'
        );
        
        $req->execute(array($id));
        // https://www.php.net/manual/fr/pdostatement.rowcount.php
        if($req->rowCount() == 1)
        {
            $data = $req->fetch();
            return new Chapter($data);   
        }
        else
            throw new Exception('Erreur');

        $req->closeCursor();
    }
   
    // AJOUT D'UN ARTICLE
    // RÉCUPÉRATION DU PSEUDO ET DE L'ID MEMBRE STOCKÉS EN SESSION
    public function insertChapter($edit)
    {
        $currentUserName = $_SESSION['premium'];
        $currentMemberId = $_SESSION['member_id'];

        $req = $this->connectDB()->prepare("INSERT INTO cv_chapters (title, content, chapi, zerolink, author, userid, date) VALUES(?, ?, ?, ?, '".$currentUserName."', '".$currentMemberId."', NOW())");

        $req->execute(array($edit->getTitle(), $edit->getContent(), $edit->getChapi(),$edit->getZerolink()));

        $req->closeCursor();    
    }
   
    // MISE À JOUR D'UN ARTICLE (SPÉCIFIE AUSSI LA DATE DE MISE À JOUR QUI NE SERA PLUS VALEUR NULL PAR DÉFAUT DANS LA COLONNE SQL)
    public function updateChapter($chapter)
    {
        $req = $this->connectDB()->prepare('UPDATE cv_chapters SET title = ?, content = ?, chapi = ?, zerolink = ?, author = ?, refreshdate = NOW() WHERE id = ?');

        $req->execute(array($chapter->getTitle(), $chapter->getContent(), $chapter->getChapi(), $chapter->getZerolink(), $chapter->getAuthor(), $chapter->getId()));

        $req->closeCursor();   
    }
   
    // SUPPRESSION D'UN ARTICLE
    public function deleteChapter($edit)
    {
        $req = $this->connectDB()->prepare('DELETE FROM cv_chapters WHERE id = ?');

        $req->execute(array($edit));

        $req->closeCursor();    
    }
    
    // ARTICLE SUIVANT (NAVIGATION)
    public function nextChapter($id)
    {
        $req = $this->connectDB()->prepare('SELECT id, title FROM cv_chapters WHERE id > ? LIMIT 1');

        $req->execute(array($id));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch();
            return new Chapter($data);   
        }
        $req->closeCursor();
    }
    
    // ARTICLE PRÉCÉDENT (NAVIGATION)
    public function prevChapter($id)
    {
        $req = $this->connectDB()->prepare('SELECT id, title FROM cv_chapters WHERE id < ? ORDER BY id DESC LIMIT 1');

        $req->execute(array($id));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch();
            return new Chapter($data);   
        }
        $req->closeCursor();
    }
    

}
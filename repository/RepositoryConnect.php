<?php

class RepositoryConnect extends Database
{
    
    //Sécuriser les données avec le hashage - cf. https://openclassrooms.com/fr/courses/2091901-protegez-vous-efficacement-contre-les-failles-web/2873202-protegez-les-donnees //https://sql.sh/fonctions/sha1
    
    // SHA1() propose un hash en 160 bits (40 caractères)
    // Dans le langage SQL, la fonction SHA1() permet de chiffrer une chaîne de caractères sous le forme d’une chaîne de 40 caractères hexadécimal. La fonction calcule la somme de vérification SHA 1 de 160 bits comme décrit dans par la RFC 3174 (Secure Hash Algorithm)
    
    // Cette fonction SQL est utilisée couramment pour le hachage de clé ou en tant que fonction de cryptographie pour stocker un mot de passe.
    
    // A noter : la fonction SHA1() est une fonction de cryptographie plus sûre que la fonction MD5()
    
    // https://www.php.net/manual/fr/pdostatement.rowcount.php
    // La méthode "rowCount() == 1" vérifie la correspondance à l'ID demandé (Idem pour ID d'un article)
    // PDOStatement::rowCount — Retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()

    // PDOStatement::fetch = Récupère une ligne depuis un jeu de résultats
    // cf.Database.php -> PDO::FETCH_ASSOC: retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats

    // VÉRIFICATION DU MEMBRE LORS DE LA CONNEXION ET LANCEMENTS CONSÉCUTIFS DE SESSIONS DANS LE CONTROLLER

    // Révision de cette fonction pour simplifier l'ouverture de SESSION dans le controllerBackmember (24 janvier)
    public function checkMember($member, $member_password)
    {        

        $req = $this->connectDB()->prepare('SELECT id FROM cv_managers WHERE user= ? AND password = ? AND role = 1');

        $req->execute(array($member, sha1($member_password)));

        if($req->rowCount() == 1)
        {
            // Fetch du résultat (requête de l'ID Manager)
            $data = $req->fetch();
            // Appel du Model
            // Le mot clé "new" permet de créer une instance d'une classe
            $getUserId = new Connect($data);
            // Appel du Getter getId() pour stocker l'ID comme valeur de SESSION
            return $getUserId->getId();
        }
        
        $req->closeCursor();

        return false;

    }

    // VÉRIFICATION DE L'UTILISATEUR EN COURS LORS DU CHANGEMENT DE MOT DE PASSE
    public function selectUser($user)
    {        
        $req = $this->connectDB()->prepare('SELECT id, user, password FROM cv_managers WHERE user= ?');

        $req->execute(array($user));
         //https://www.php.net/manual/fr/pdostatement.rowcount.php
        // La méthode "rowCount() == 1" vérifie la correspondance à l'ID demandé (Idem pour ID d'un chapitre)
        //PDOStatement::rowCount — Retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch();
            //PDOStatement::fetch = Récupère une ligne depuis un jeu de résultats
            //cf.Database.php -> PDO::FETCH_ASSOC: retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats
            return new Connect($data);   
        }
        $req->closeCursor();        
    }

    // MISE À JOUR DU MOT DE PASSE (PAGE PROTÉGÉE ADMINISTRATEUR)
    public function updatePassword($connect)
    {
        $req = $this->connectDB()->prepare('UPDATE cv_managers SET password = ? WHERE user = ?');

        $req->execute(array($connect->getPassword(), $connect->getUser()));

        $req->closeCursor(); 
    }

    // RÉCUPÉRATION DES INFORMATIONS SUR LES MEMBRES INSCRITS SUR LE BLOG
    public function infoManagers()
    {  
        $managers = array();
        
        $req = $this->connectDB()->query(
            'SELECT * 
            FROM cv_managers
            WHERE id > 1
            AND role = 1
            ORDER BY id
            DESC'
        );
        
        $req->execute();

        while($data = $req->fetch())
        {   
            $managers[] = new Connect($data);
        }

        return $managers;

        $req->closeCursor();
        
    }

    // RÉCUPÉRATION DES DERNIERS MEMBRES INSCRITS QUI N'ONT PAS ENCORE ÉTÉ VALIDÉS PAR L'ADMINISTRATEUR
    public function newRegistered()
    {  
        $futureMembers = array();
        
        $req = $this->connectDB()->query(
            'SELECT * 
            FROM cv_managers
            WHERE id > 1
            AND role IS NULL
            ORDER BY id
            DESC'
        );
        
        $req->execute();

        while($data = $req->fetch())
        {   
            $futureMembers[] = new Connect($data);
        }

        return $futureMembers;

        $req->closeCursor();
        
    }

    // SUPPRESSION DE MEMBRES
    public function deleteUser($delete_user)
    {
        $req = $this->connectDB()->prepare('DELETE FROM cv_managers WHERE id = ?');

        $req->execute(array($delete_user));

        $req->closeCursor();    
    }

    // AJOUT D'UN NOUVEL UTILISATEUR AVEC MOT DE PASSE CRYPTÉ
    public function insertUser($insert_user)
    {
        $req = $this->connectDB()->prepare('INSERT INTO cv_managers (user, password) VALUES(?, ?)');

        // Pour crypter le mot de passe ajouté lors de l'enregistrement d'un nouvel utilisateur, j'ai ajouté la fonction sha1() :
        $req->execute(array($insert_user->getUser(), sha1($insert_user->getPassword())));

        $req->closeCursor();    
    }

    // VÉRIFICATION QU'UN PSEUDO DE NOUVEAU MEMBRE N'EST PAS DÉJÀ UTILISÉ
    public function checkUsername()
    {  
        
        $managers = array();

        $nameselected = $_POST['pseudo'];
        
        $req = $this->connectDB()->query(
            "SELECT user
            FROM cv_managers       
            WHERE user = '".$nameselected."'
            "
        );
        
        $req->execute();

        while($data = $req->fetch())
        {   
            $managers[] = new Connect($data);
        }

        return $managers;

        $req->closeCursor();
        
    }

    // MISE À JOUR DU RÔLE DE NOUVEAUX MEMBRES
    public function updateRole($update_role)
    {
        $req = $this->connectDB()->prepare('UPDATE cv_managers SET role = 1 WHERE id = ?');
        $req->execute(array($update_role));
        $req->closeCursor();    
    }

    
}

# BLOG-PHP
Blog Php

# Mise à jour du dossier le 24 janvier
- Mise à jour du Router (fonction spl_autoload dans index.php)
- Ajout des Entités (Models après vérifications)
- Ajout du dossier Repository (qui gère les requêtes Sql)
- Ajout du dossier Content (thème Bootstrap Freelancer et autres fichiers nécessaires pour le bon fonctionnement du Blog)
- Ajout des Controllers après révisions (révision notamment du fichier controllerAccess.php et controllerBackmember)
- Révision de la fonction checkMember() dans repositoryConnect.php
- Dépôt des dépendances Composer pour vérifications par Mentor
- Suppression de la pagination php en fonction du strlen() qui risque de briser les balises HTML et provoquer des erreurs d'affichage
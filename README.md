# BLOG-PHP
- Avancées du projet de Blog Php (architecture MVC et programmation orientée objet)

## Mise à jour du projet le 24 janvier
- Informations spécifiées dans les Issues
- Mise à jour du Router (fonction spl_autoload dans index.php)
- Ajout des Entités (Models après vérifications)
- Ajout du dossier Repository (qui gère les requêtes Sql)
- Ajout du dossier Content (thème Bootstrap Freelancer et autres fichiers nécessaires pour le bon fonctionnement du Blog)
- Ajout des Controllers après révisions (révision notamment du fichier controllerAccess.php et controllerBackmember)
- Révision de la fonction checkMember() dans repositoryConnect.php
- Dépôt des dépendances Composer pour vérifications par Mentor
- Suppression de la pagination php en fonction du strlen() qui risque de briser les balises HTML et provoquer des erreurs d'affichage
- Révisions des diagrammes effectués en parallèle de l'élaboration du Blog (diagrammes de cas d'utilisations, diagrammes de classes, séquence de gestion en back office, modèle de données, concepteur Sql)
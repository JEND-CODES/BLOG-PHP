# BLOG PHP FINALISATIONS

## Avancées
- Pagination PHP ajoutées aux posts (front et back) et à la page de gestion des commentaires (modifications multiples dans les dossiers Repository, Controllers et Views)
- Réglages corrélatifs de l'apparition des boutons de pagination en fonction du nombre d'articles publiés pour chaque membre inscrit sur le blog 
- Pagination jQuery ajoutée à la page gestion des membres
- Finalisations VIEWS : indentation, responsive design, style.css
- Nouveaux Hash avec SHA256 dans RepositoryConnect
- Mise à jour de la page d'accueil avec un nouveau logo, et deux sections supplémentaires (Expériences et Formation + Portfolio Modals)
- Mise à jour du footer (avec une condition PHP d'activation du script simplePagination.js)
- Coloration des messages de réussite et d'erreurs envoyés lors de la gestion des formulaires
- Nettoyage de codes-tests inutiles

## INSTRUCTIONS D'INSTALLATION
* Clonez le projet Github (git clone)
* Installez les dépendances avec Composer (composer init + composer install)
* Importez le fichier de démonstration .sql dans votre base de données
* Définissez la connexion à votre base de données dans le fichier Database.php
* Indiquez votre email dans le fichier contact_me.php
* Lancez votre serveur local pour visualiser le blog
* Accédez au Back office avec l'identifiant ???? et le mot de passe ????
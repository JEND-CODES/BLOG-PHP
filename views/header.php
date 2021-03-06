<!DOCTYPE html>

<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= isset($nav_title)?$nav_title:"BLOG PHP"; ?></title>
    
    <meta name="description" content="BLOG PHP">

    <meta content='width=device-width, initial-scale=1.0' name='viewport' />

    <link rel="icon" type="image/png" href="<?= URL.'content/theme/img/starIconBlue.png' ?>" />

    <link href="content/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
    <link href="content/theme/css/freelancer.min.css" rel="stylesheet">

    <link href="vendor/components/font-awesome/css/all.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="content/style.css" />

</head>

<body>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand special-logo" href="<?= URL ?>">BLOG</a>

                <img class="logo-img" src="content/theme/img/starIconBlue.png" alt="BLOG" title="BLOG">

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
        
                    <li><a href="<?= URL.'posts' ?>">Derniers Posts</a></li>

                    <?php if (empty($_SESSION["premium"])) { ?>

                    <li><a href="<?= URL.'register' ?>">Inscription</a></li>

                    <li><a href="<?= URL.'access' ?>">Connexion</a></li>

                    <?php
                    } else {
                    ?>

                    <li><a href="<?= URL.'backoff' ?>">Back Office</a></li>

                    <li><a href="<?= URL.'logout' ?>">Déconnexion</a></li>
                        
                    <?php } ?>

                </ul>
            </div>
           
        </div>
        
    </nav>
<?php 
$nav_title = "Back Office"; 
?>

<?php require_once('views/header.php'); ?>

<?php 
// Appel pour changements du format des dates ($month_1, $month_2)
require_once('content/dates.php'); ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<!-- Menu -->
<div class="container-fluid">

      <div class="row vertical-center">

        <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">

            <div class="dropdown">

                <button class="btn btn-info btn-block dropdown-toggle special-menu" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    MENU
                </button>

                <div class="dropdown-menu dropdown-menu-bis" aria-labelledby="dropdownMenuButton">

                    <p class="btn menu-info">Bienvenue <?= ucfirst($_SESSION['premium']) ?></p>

                    <a class="btn dropdown-item special-nav" href="newpost">Nouveau post</a>

                    <?php if ($_SESSION["member_id"] == 1): ?>

                        <a class="btn dropdown-item special-nav" href="manage">Gestion Membres</a>

                        <a class="btn dropdown-item special-nav" href="commentaires">Commentaires</a>

                        <a class="btn dropdown-item special-nav" href="password">Mot de passe</a>

                    <?php endif; ?>

                    <a class="btn dropdown-item special-nav" href="nosession">Déconnexion</a>

                </div>

            </div>

        </div>
         
    </div>
      
</div>

<br /><br />   

<!-- Gestion Posts -->
<div class="container">

    <div class="row">

            <?php 
            
            if(isset($supprime)): ?>
        
            <p style="color:orangered !important;"><?= $supprime ?></p>
        
            <?php endif; ?>

            <?php
            
            foreach($postsAuthors as $postsAuthor): ?>

                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0" style="border:2px solid grey;margin-bottom:10px;padding:10px;">

                        <div class="row block">

                            <div class="col-md-2">

                                <img style="max-width:150px;" src="<?= $postsAuthor->getZerolink() ?>" class="img-responsive" alt="Post publié" title="Post">

                            </div>
                        
                            <div class="col-md-4">

                                <p><?= $postsAuthor->getTitle() ?></p>

                                <!--<p>Chapô : <?= $postsAuthor->getChapi() ?></p>-->

                            </div>

                            <div class="col-md-3">

                                <p style="font-size:14px !important;">Post publié le 
                        
                                <?php

                                $sql_Date_1 = $postsAuthor->getChapterDate();

                                $new_Date_Format_1 = date("d .m Y à H:i", strtotime($sql_Date_1));

                                echo str_replace($month_1,$month_2,$new_Date_Format_1);

                                ?> par 

                                <?= ucfirst($postsAuthor->getAuthor()) ?>
                                    
                                </p>

                                <?php
                                if(!empty($postsAuthor->getRefreshDate())): 
                                ?>

                                <p style="font-size:14px !important;">Dernière mise à jour le 
                            
                                <?php

                                $sql_Date_2 = $postsAuthor->getRefreshDate();

                                $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));

                                echo str_replace($month_1,$month_2,$new_Date_Format_2);

                                ?>
                                
                                </p>

                                <?php endif; ?>

                            </div>

                            <div class="col-md-3">
                               
                                <a class="btn btn-info btn-block special-button" href="chapitre&amp;id=<?= $postsAuthor->getId() ?>"> Lire&nbsp;<i class="fas fa-eye"></i></a>

                                <a class="btn btn-success btn-block special-button" href="changepost&amp;id=<?= $postsAuthor->getId() ?>"> Modifier&nbsp; <i class="fas fa-feather-alt"></i></a>

                                <form action="backmember" method="post">

                                    <input type="hidden" name="edit" value="<?= $postsAuthor->getId() ?>" />

                                    <input style="width:100%;" class="btn special-button" type="submit" name="delete" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

                                </form>

                            </div>
                            
                        </div>

                    </div>

                    

            <?php endforeach; ?>
          
    </div>

</div>




<?php require_once('views/footer.php'); ?>
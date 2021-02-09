<?php 
$nav_title = "BACK OFFICE"; 
?>

<?php require_once 'views/header.php'; ?>

<?php require_once 'content/dates.php'; ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<!-- Menu -->
<div class="container-fluid">

    <div class="row vertical-center">

        <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">

            <div class="dropdown">

                <button class="btn btn-info btn-block dropdown-toggle special-menu" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MENU</button>

                <div class="dropdown-menu dropdown-menu-bis" aria-labelledby="dropdownMenuButton">

                    <p class="btn menu-info">Bienvenue <?= ucfirst($_SESSION['premium']) ?></p>

                    <a class="btn dropdown-item special-nav" href="new">Nouveau post</a>

                    <?php if ($_SESSION["member_id"] == 1): ?>

                    <a class="btn dropdown-item special-nav" href="manage">Gestion Membres</a>

                    <a class="btn dropdown-item special-nav" href="comments">Commentaires</a>

                    <a class="btn dropdown-item special-nav" href="password">Mot de passe</a>

                    <?php endif; ?>

                    <a class="btn dropdown-item special-nav" href="logout">Déconnexion</a>

                </div>

            </div>

        </div>
         
    </div>
      
</div>

<div class="medium-spacer"></div>  

<!-- Dashboard Gestion Posts -->
<div class="container">

    <div class="row">

        <?php 
        
        if(isset($supprime)): ?>
    
        <p class="special-message centered-text"><?= $supprime ?></p>
    
        <?php endif; ?>

        <?php
        
        foreach($postsAuthors as $postsAuthor): ?>

            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 post-dashboard">

                <div class="row block">

                    <div class="col-md-2">

                        <img class="img-dashboard" src="<?= $postsAuthor->getZerolink() ?>" class="img-responsive" alt="<?= $postsAuthor->getTitle() ?>" title="<?= $postsAuthor->getTitle() ?>">

                    </div>
                
                    <div class="col-md-4">

                        <p><?= $postsAuthor->getTitle() ?></p>

                    </div>

                    <div class="col-md-3">

                        <p class="info-dashboard">Post publié le 
                
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

                        <p class="info-dashboard">Dernière mise à jour le 
                    
                        <?php

                        $sql_Date_2 = $postsAuthor->getRefreshDate();

                        $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));

                        echo str_replace($month_1,$month_2,$new_Date_Format_2);

                        ?>
                        
                        </p>

                        <?php endif; ?>

                    </div>

                    <div class="col-md-3">
                        
                        <a class="btn btn-info btn-block special-button" href="chapter&amp;id=<?= $postsAuthor->getId() ?>"> Lire&nbsp;<i class="fas fa-eye"></i></a>

                        <a class="btn btn-success btn-block special-button" href="change&amp;id=<?= $postsAuthor->getId() ?>"> Modifier&nbsp; <i class="fas fa-feather-alt"></i></a>

                        <form action="backoff" method="post">

                            <input type="hidden" name="edit" value="<?= $postsAuthor->getId() ?>" />

                            <input class="btn special-button btn-block" type="submit" name="delete" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

                        </form>

                    </div>
                    
                </div>

            </div>

        <?php endforeach; ?>
          
    </div>

</div>
           
<!-- Pagination -->
<div class="container">

    <?php if($count_chapters > 4): ?>

        <i class="fas fa-chevron-left special-chevron"></i>

    <?php endif; ?>

    <?php 

    $numberBtn = floor($count_chapters / 5);

    foreach(range(0, $numberBtn) as $item): ?>

        <a class="btn btn-info special_btn_nbr_<?= $item ?>" href="./backoff?page=<?= $item ?>"><?= $item ?></a>

    <?php endforeach; ?>

</div>

<?php if($count_chapters < 2): ?>

    <div class="big-spacer"></div>

<?php endif; ?>


<?php require_once 'views/footer.php'; ?>
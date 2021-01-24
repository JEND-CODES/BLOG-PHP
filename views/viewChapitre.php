<?php 
$nav_title = $chapter->getTitle(); 
//permet de définir le titre du chapitre comme titre de l'onglet du navigateur
?>

<?php require_once('views/header.php'); ?>

<?php 
// Appel pour changements du format des dates ($month_1, $month_2)
require_once('content/dates.php'); ?>


<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="regular-spacer"></div>
<div class="regular-spacer"></div>
        
<div class="container">

    <div class="row">

            <div class="col-md-12 margin">

                <div class="row block">

                    <div class="col-md-6">

                        <h2><?= $chapter->getTitle() ?></h2>

                        <p class="post-date-info">Auteur : <?= ucfirst($chapter->getAuthor()) ?></p>

                        <p class="post-date-info">Publié le

                        <?php

                        $sql_Date_1 = $chapter->getChapterDate();

                        $new_Date_Format_1 = date("d .m Y à H:i", strtotime($sql_Date_1));

                        echo str_replace($month_1,$month_2,$new_Date_Format_1);

                        ?>

                        </p>

                        <?php
                        if(!empty($chapter->getRefreshDate())): 
                        ?>

                        <p class="post-date-info">Dernière mise à jour le 
                                                    
                        <?php

                        $sql_Date_2 = $chapter->getRefreshDate();

                        $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));

                        echo str_replace($month_1,$month_2,$new_Date_Format_2);

                        ?>
                                                    
                        </p>

                        <?php endif; ?>

                        <p class="post-chapo"><?= $chapter->getChapi() ?></p>

                    </div>

                    <div class="col-md-6">

                        <img src="<?= $chapter->getZerolink() ?>" class="img-responsive img-special-post" alt="<?= $chapter->getTitle() ?>" title="<?= $chapter->getTitle() ?>">

                    </div>

                    <!-- Content part -->
                    <div class="col-md-12">
                    
                        <p><?= $chapter->getContent() ?>
                
                    </div>


                </div>

            </div>

    </div>

</div>

<div class="medium-spacer"></div>

<div class="container">

        <div class="row block">

                <div class="col-md-12 text-center">

                    <?php 
                    if($prevChapter): ?>

                    <a href="chapitre&amp;id=<?= $prevChapter->getId() ?>" class="btn">
                        <p><i class="fas fa-chevron-left"></i>&nbsp;Précédent</p>
                    </a>

                    <?php endif; ?>

                    <?php
                    if($nextChapter): ?>

                    <a href="chapitre&amp;id=<?= $nextChapter->getId() ?>" class="btn">
                        <p>Suivant&nbsp;<i class="fas fa-chevron-right"></i></p>
                    </a>

                    <?php endif; ?>

                </div>

        </div>

</div>


<div class="medium-spacer"></div>

<div class="container" id="victory">

        <div class="row block">

                <div class="col-md-12 text-center">

                    <form action="#victory" method="post" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">

                        <h3>COMMENTER CE POST</h3>

                        <p>
                            <label class="sr-only" for="">Nom</label>
                            <input name="pseudo" value="<?php if(isset($pseudo)) echo $pseudo; ?>" class="form-control" type="text" placeholder="VOTRE NOM" required>
                        </p>

                        <p>
                            <label class="sr-only" for="">Email</label>
                            <input name="email" value="<?php if(isset($email)) echo $email; ?>" class="form-control" type="email" placeholder="VOTRE EMAIL" required>
                        </p>

                        <p>
                            <label class="sr-only" for="">Message</label>
                            <textarea rows="5" name="comment" placeholder="VOTRE MESSAGE" class="form-control" required><?php if(isset($comment)) echo $comment; ?></textarea>
                        </p>

                        <input type="submit" name="add" class="btn btn-primary special-btn-comment" value="Envoyer" onclick="return(confirm('Validez-vous ce choix ?'));" />
                    
                    </form>

                </div>

        </div>

</div>

<div class="medium-spacer"></div>

<div class="container" id="victory">

        <div class="row block">

                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 text-center">

                <?php 
        
                if(!empty($errors)): ?>
        
                <br />
        
                <?php foreach($errors as $error): ?>
        
                <div>
                    <p><?= $error ?></p>
                </div>
        
                <?php endforeach; ?>
        
                <br />
        
                <?php endif; ?>
        
        
        
        
                <?php 
                        
                if(isset($realized)): ?>
        
                <p><?= $realized ?></p>
        
                <?php endif; ?>
        
        
                
                <?= 
                // Message lorsqu'il n'y a pas encore de commentaires
                $nocomment 
                ?>
        
        
                <?php
                // Affichage des 5 derniers commentaires
                foreach($comments as $comDesc): ?>
        
                <hr>
        
                <p>Par <?= ucfirst($comDesc->getPseudo()) ?> le 
        
                    <?php
        
                    $sql_Date_2 = $comDesc->getCommentDate();
        
                    $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));
        
                    echo str_replace($month_1,$month_2,$new_Date_Format_2);
        
                    ?>
                
                </p>
                <p>'' <?= $comDesc->getComment() ?> ''</p>

                <?php endforeach; ?>

                </div>

        </div>

</div>


<?php require_once('views/footer.php'); ?>

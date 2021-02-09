<?php 
$nav_title = "GESTION DES COMMENTAIRES"; 
?>

<?php require_once 'views/header.php'; ?>

<?php require_once 'content/dates.php'; ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<a href="backoff" class="btn return-back"><i class="fas fa-arrow-left"></i></a>

<div class="container">

    <div class="row">

        <div class="col-xs-10 col-xs-offset-1 col-md-10 margin">

            <?php 
            
            if(isset($drop)): ?>

                <p class="special-message centered-text">&nbsp;<?= $drop ?></p>

            <?php endif; ?>

            <?php 
        
            if(isset($freely)): ?>

                <p class="special-message centered-text">&nbsp;<?= $freely ?></p>

            <?php endif; ?>

        </div>

        <div class="col-xs-10 col-xs-offset-1 col-md-10 margin">
            
            <h4 class="centered-text comment-dashboard-title-2">Commentaires publiés</h4>

        </div>

        <?php foreach($alarmComments2 as $alarmComment2): ?>

            <div class="col-xs-10 col-xs-offset-1 col-md-10 comment-dashboard">

                <p>•&nbsp;&nbsp;Envoyé par <?= ucfirst($alarmComment2->getPseudo()) ?> &rArr; <a href="https://www.google.com/intl/fr/gmail/about/" target="_blank"><?= $alarmComment2->getEmail() ?></a> le 

                <?php

                $sql_Date_2 = $alarmComment2->getCommentDate();

                $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));

                echo str_replace($month_1,$month_2,$new_Date_Format_2);

                ?>

                &#8239;: </p>

                <p>''&nbsp;<?= $alarmComment2->getComment() ?>&nbsp;''</p>

                <form action="comments" method="post">

                    <input type="hidden" name="act" value="<?= $alarmComment2->getId() ?>" />

                    <input type="submit" name="delete" class="btn" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

                </form>
    
            </div>

        <?php endforeach; ?>

        <!-- Pagination des commentaires publiés -->
        <div class="col-xs-10 col-xs-offset-1 col-md-10">

            <?php if($count_comments > 2): ?>

                <i class="fas fa-chevron-left special-chevron"></i>

            <?php endif; ?>

            <?php 

            $numberBtn = floor($count_comments / 3);

            foreach(range(0, $numberBtn) as $item): ?>

                <a class="btn btn-info special_btn_nbr_<?= $item ?>" href="./comments?page=<?= $item ?>"><?= $item ?></a>

            <?php endforeach; ?>

        </div>
        <!-- Fin de pagination -->

        <div class="col-xs-10 col-xs-offset-1 col-md-10 margin">

            <h4 class="centered-text comment-dashboard-title">Commentaires à valider</h4>

        </div>

        <?php foreach($alarmComments as $alarmComment): ?>
        
            <div class="col-xs-10 col-xs-offset-1 col-md-10 margin comment-dashboard">

                <p>•&nbsp;&nbsp;Envoyé par <?= ucfirst($alarmComment->getPseudo()) ?> &rArr; <a href="https://www.google.com/intl/fr/gmail/about/" target="_blank"><?= $alarmComment->getEmail() ?></a> le 

                <?php

                $sql_Date_1 = $alarmComment->getCommentDate();

                $new_Date_Format_1 = date("d .m Y à H:i", strtotime($sql_Date_1));

                echo str_replace($month_1,$month_2,$new_Date_Format_1);

                ?>

                &#8239;: </p>

                <p>''&nbsp;<?= $alarmComment->getComment() ?>&nbsp;''</p>

                <form action="comments" method="post">

                    <input type="hidden" name="act" value="<?= $alarmComment->getId() ?>" />

                    <input type="submit" name="show" class="btn btn-success" value="Autoriser" onclick="return(confirm('Validez-vous ce choix ?'));" />

                    <input type="submit" name="delete" class="btn" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

                </form>

            </div>

        <?php endforeach; ?>

    </div>

</div>


<?php require_once 'views/footer.php'; ?>
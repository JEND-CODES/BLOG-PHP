<?php 
$nav_title = "Gestion des commentaires"; 
?>

<?php require_once('views/header.php'); ?>

<?php 
// Appel pour changements du format des dates ($month_1, $month_2)
require_once('content/dates.php'); ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<a href="backmember" class="btn return-back"><i class="fas fa-arrow-left"></i></a>



<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 margin">

            <?php 
            
            if(isset($drop)): ?>

            <p style="color:orangered !important;">&nbsp;<?= $drop ?></p>

            <?php endif; ?>

            <?php 
        
            if(isset($freely)): ?>

            <p style="color:orangered !important;">&nbsp;<?= $freely ?></p>

            <?php endif; ?>

        </div>

        <div class="col-xs-10 col-xs-offset-1 col-md-10 margin">
            <h4 class="centered-text">Commentaires à valider</h4>
            <br />
        </div>

        <?php foreach($alarmComments as $alarmComment): ?>
        
            <div class="col-xs-10 col-xs-offset-1 col-md-10 margin" style="border:2px solid grey;margin-bottom:10px;padding:20px;">

            <p>•&nbsp;&nbsp;Envoyé par <?= ucfirst($alarmComment->getPseudo()) ?> &rArr; <a href="https://www.google.com/intl/fr/gmail/about/" target="_blank"><?= $alarmComment->getEmail() ?></a> le 

                <?php

                $sql_Date_1 = $alarmComment->getCommentDate();

                $new_Date_Format_1 = date("d .m Y à H:i", strtotime($sql_Date_1));

                echo str_replace($month_1,$month_2,$new_Date_Format_1);

                ?>

                &#8239;: </p>

                <!--<p><?= $alarmComment->getAlarm() ?></p>-->

            <p>''&nbsp;<?= $alarmComment->getComment() ?>&nbsp;''</p>

            <form action="commentaires" method="post">

                <input type="hidden" name="act" value="<?= $alarmComment->getId() ?>" />

                <input type="submit" name="show" class="btn btn-success" value="Autoriser" onclick="return(confirm('Validez-vous ce choix ?'));" />

                <input type="submit" name="delete" class="btn" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

            </form>

            <br />

            </div>
        <?php endforeach; ?>

        <div class="col-xs-10 col-xs-offset-1 col-md-10 margin">
            <br />
            <h4 class="centered-text">Commentaires publiés</h4>
            <br />
        </div>

        <?php foreach($alarmComments2 as $alarmComment2): ?>

            <div class="col-xs-10 col-xs-offset-1 col-md-10" style="border:2px solid grey;margin-bottom:10px;padding:20px;">

                <p>•&nbsp;&nbsp;Envoyé par <?= ucfirst($alarmComment2->getPseudo()) ?> &rArr; <a href="https://www.google.com/intl/fr/gmail/about/" target="_blank"><?= $alarmComment2->getEmail() ?></a> le 

                <?php

                $sql_Date_2 = $alarmComment2->getCommentDate();

                $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));

                echo str_replace($month_1,$month_2,$new_Date_Format_2);

                ?>

                &#8239;: </p>

                <p>''&nbsp;<?= $alarmComment2->getComment() ?>&nbsp;''</p>

                <form action="commentaires" method="post">

                    <input type="hidden" name="act" value="<?= $alarmComment2->getId() ?>" />

                    <input type="submit" name="delete" class="btn" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

                </form>

                        <br />
    
            </div>

        <?php endforeach; ?>

    </div>

</div>



<?php require_once('views/footer.php'); ?>

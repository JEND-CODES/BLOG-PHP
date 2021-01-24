<?php 
$nav_title = "Gestion Membres"; 
?>

<?php require_once('views/header.php'); ?>

<?php 
// Appel pour changements du format des dates ($month_1, $month_2)
require_once('content/dates.php'); ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<a href="backmember" class="btn return-back"><i class="fas fa-arrow-left"></i></a>

<!-- Nouveaux inscrits en attente de validation -->
<div class="container">

    <div class="row">

        <div class="col-md-9 col-md-offset-3">
            <h4 class="centered-text">Nouveaux inscrits</h4>
        </div>

                <?php

                foreach($getFutureMembers as $getFutureMember): ?>

                    <div class="col-xs-10 col-xs-offset-1 col-md-12" style="margin-bottom:10px;padding:10px;">

                        <div class="row block centered-text">

                            <div class="col-md-2" style="border:0px solid red;"></div>
                            
                            <div class="col-md-4" style="border-top:1px solid #dcdcdc;padding-top:6px;">

                            <!--<p>Id : <?= $getFutureMember->getId() ?></p>-->
                            <p>Pseudo : <?= ucfirst($getFutureMember->getUser()) ?></p>
                            <!--<p>password : <?= $getFutureMember->getPassword() ?></p>-->

                            <p>Role : <?= $getFutureMember->getRole() ?></p>

                            </div>

                            <div class="col-md-3" style="padding-top:6px;">

                                <form action="manage" method="post">

                                    <input type="hidden" name="update_role" value="<?= $getFutureMember->getId() ?>" />

                                    <input style="width:200px;" type="submit" name="premium_user" class="btn btn-info" value="Valider" onclick="return(confirm('Validez-vous ce choix ?'));" />

                                </form>

                                <br />
                               
                                <form action="manage" method="post">

                                    <input type="hidden" name="delete_user" value="<?= $getFutureMember->getId() ?>" />

                                    <input style="width:200px;" type="submit" name="trash_user" class="btn" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

                                </form>

                               

                            </div>

                            <div class="col-md-3" style="border:0px solid red;"></div>
                            
                        </div>

                    </div>

            <?php endforeach; ?>
          
    </div>

</div>


<br /><br />



<!-- Membres Premium -->
<div class="container">

    <div class="row">

        <div class="col-md-9 col-md-offset-3">
            <h4 class="centered-text">Membres validés</h4>
        </div>

                <?php

                foreach($getManagers as $getManager): ?>

                    <div class="col-xs-10 col-xs-offset-1 col-md-12" style="margin-bottom:10px;padding:10px;">

                        <div class="row block centered-text">

                            <div class="col-md-2" style="border:0px solid red;"></div>

                            <div class="col-md-4" style="border-top:1px solid #dcdcdc;padding-top:6px;">

                            <!--<p>Id : <?= $getManager->getId() ?></p>-->
                        
                            <p>Pseudo : <?= ucfirst($getManager->getUser()) ?></p>

                            <!--<p>password : <?= $getManager->getPassword() ?></p>-->

                            <p>Role : <?= $getManager->getRole() ?></p>

                            </div>

                            <div class="col-md-3" style="padding-top:6px;">
                               
                                <form action="manage" method="post">

                                    <input type="hidden" name="delete_user" value="<?= $getManager->getId() ?>" />

                                    <input style="width:200px;" type="submit" name="trash_user" class="btn" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ? Attention, la suppression de cet utilisateur entraînera la suppression de ses articles'));" />

                                </form>

                            </div>

                            <div class="col-md-3" style="border:0px solid red;"></div>
                            
                        </div>

                    </div>

            <?php endforeach; ?>
          
    </div>

</div>











<?php require_once('views/footer.php'); ?>

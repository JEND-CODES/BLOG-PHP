<?php 
$nav_title = "GESTION DES MEMBRES"; 
?>

<?php require_once 'views/header.php'; ?>

<?php require_once 'utils/dates.php'; ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<a href="backoff" class="btn return-back"><i class="fas fa-arrow-left"></i></a>

<!-- Nouveaux inscrits en attente de validation -->
<div class="container">

    <div class="row">

        <div class="col-md-9 col-md-offset-3">

            <h4 class="centered-text">Nouveaux inscrits</h4>

        </div>

        <?php

        foreach($getFutureMembers as $getFutureMember): ?>

            <div class="col-xs-10 col-xs-offset-1 col-md-12 manage-dashboard">

                <div class="row block centered-text">

                    <div class="col-md-2"></div>
                    
                    <div class="col-md-4 special-manage-col-1">

                        <p>Pseudo : <?= ucfirst(htmlspecialchars($getFutureMember->getUser())) ?></p>

                    </div>

                    <div class="col-md-3 special-manage-col-2">

                        <form action="manage" method="post">

                            <input type="hidden" name="update_role" value="<?= htmlspecialchars($getFutureMember->getId()) ?>" />

                            <input type="submit" name="premium_user" class="btn btn-info special-manage-button" value="Valider" onclick="return(confirm('Validez-vous ce choix ?'));" />

                        </form>
                        
                        <form action="manage" method="post">

                            <input type="hidden" name="delete_user" value="<?= htmlspecialchars($getFutureMember->getId()) ?>" />

                            <input type="submit" name="trash_user" class="btn special-manage-button" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ?'));" />

                        </form>

                    </div>

                    <div class="col-md-3"></div>
                    
                </div>

            </div>

        <?php endforeach; ?>
          
    </div>

</div>

<div class="medium-spacer"></div>

<!-- Membres Premium -->
<div class="container">

    <div class="row">

        <div class="col-md-9 col-md-offset-3">

            <h4 class="centered-text">Membres validés</h4>

        </div>

        <?php

        foreach($getManagers as $getManager): ?>

            <div class="col-xs-10 col-xs-offset-1 col-md-12 manage-dashboard">

                <div class="row block centered-text">

                    <div class="col-md-2"></div>

                    <div class="col-md-4 special-manage-col-1">
                    
                        <p>Pseudo : <?= ucfirst(htmlspecialchars($getManager->getUser())) ?></p>
                        
                    </div>

                    <div class="col-md-3 special-manage-col-2">
                        
                        <form action="manage" method="post">

                            <input type="hidden" name="delete_user" value="<?= htmlspecialchars($getManager->getId()) ?>" />

                            <input type="submit" name="trash_user" class="btn special-manage-button" value="Supprimer" onclick="return(confirm('Validez-vous ce choix ? Attention, la suppression de cet utilisateur entraînera la suppression de ses articles'));" />

                        </form>

                    </div>

                    <div class="col-md-3"></div>
                    
                </div>

            </div>

        <?php endforeach; ?>
          
    </div>

</div>

<!-- Pagination -->
<div class="container">

    <div class="row">

        <div class="col-md-9 col-md-offset-3">

            <?php if($count_managers > 1): ?>

                <i class="fas fa-chevron-left special-chevron"></i>

            <?php endif; ?>

            <?php 

            $numberBtn = floor($count_managers / 2);

            foreach(range(0, $numberBtn) as $item): ?>

                <a class="btn btn-info special_btn_nbr_<?= $item ?>" href="./manage?page=<?= $item ?>"><?= $item ?></a>

            <?php endforeach; ?>

        </div>

    </div>

</div>


<?php require_once 'views/footer.php'; ?>
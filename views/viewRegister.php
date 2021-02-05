<?php 
$nav_title = "INSCRIPTION"; 
?>

<?php require_once('views/header.php'); ?>

<div class="special-background-one">

      <div class="big-spacer"></div>

      <div class="container-fluid">

            <div class="row vertical-center">

                  <form action="register" method="post" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">

                        <!-- Vérification en BDD du pseudo sélectionné -->
                        <?php      
                        if(isset($gotoregister)): ?>
                        
                              <?= $gotoregister ?>
                        
                        <?php endif; ?>

                        <?php 
                        if(isset($user_message)): ?>

                              <?= $user_message ?>

                        <?php endif; ?>

                        <?php 
                        if(!empty($errors)): ?>

                        <?php foreach($errors as $error): ?>

                              <p><?= $error ?></p>

                        <?php endforeach; ?>

                        <?php endif; ?>

                        <?php 
                                          
                        if(!empty($_POST["pseudo"])): ?>
                  
                        <?php
                        foreach($getUsernames as $getUsername): ?>

                        <?php 
                                                
                        if($getUsername): ?>

                              <div class="check-user-box">
                                    <p class="check-user-para">PSEUDO INDISPONIBLE</p>
                                    <a href="<?= URL.'register' ?>"><i class="fas fa-times"></i></a>
                              </div>
                              

                        <?php endif; ?>

                        <p><?= $getUsername->getUser() ?></p>
                                          
                        <?php endforeach; ?>
            
                        <?php endif; ?>

                        <p>
                        <label class="sr-only">Identifiant</label>
                        <input id="pseudo_checked" name="pseudo" value="<?php if(isset($pseudo)) echo $pseudo; ?>" placeholder="CHOIX DU PSEUDO" class="form-control" type="text" required autofocus>
                        </p>

                        <button class="btn btn-info btn-block" type="submit">VÉRIFIER</button>

                  </form>

                  <!-- Après vérification de la disponibilité du pseudo -> Génération du formulaire d'enregistrement nouveau membre depuis le Controller -->
                  <?php 
                              
                  if(isset($registerForm)): ?>
                  
                  <p><?= $registerForm ?></p>
                  
                  <?php endif; ?>


            </div>

      </div>

      <div class="big-spacer"></div>
      <div class="big-spacer"></div>
      <div class="big-spacer"></div>

</div>

<?php require_once('views/footer.php'); ?>

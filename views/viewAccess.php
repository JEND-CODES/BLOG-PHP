<?php 
$nav_title = "CONNEXION"; 
?>

<?php require_once 'views/header.php'; ?>

<div class="special-background-one">

    <div class="big-spacer"></div>

        <div class="container-fluid">

          <div class="row vertical-center">

              <form action="access" method="post" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">
      
                <?php 
                
                if(!empty($errors)): ?>

                <?php foreach($errors as $error): ?>
                
                <p><?= $error ?></p>
                
                <?php endforeach; ?>

                <?php endif; ?>

                <p>
                  <label class="sr-only">Identifiant</label>
                  <input name="member" value="<?php if(isset($member)): ?><?= $member; ?><?php endif; ?>" class="form-control" type="text" placeholder="IDENTIFIANT" required autofocus>
                </p>

                <p>
                  <label class="sr-only">Mot de passe</label>
                  <input name="member_password" placeholder="MOT DE PASSE" class="form-control" type="password" required>
                </p>
              
                <button class="btn btn-success btn-block" type="submit">SE CONNECTER</button>
                
              </form>

          </div>
          
        </div>

    <div class="big-spacer"></div>
    <div class="big-spacer"></div>
    <div class="big-spacer"></div>

</div>

<?php require_once 'views/footer.php'; ?>

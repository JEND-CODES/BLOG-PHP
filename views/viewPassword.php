<?php 
$nav_title = "Modifier le mot de passe"; 
?>

<?php require_once('views/header.php'); ?>

<div class="special-background-one">

    <div class="medium-spacer"></div>
    <div class="medium-spacer"></div>
    <div class="medium-spacer"></div>

    <a href="backmember" class="btn return-back-two"><i class="fas fa-arrow-left"></i></a>

    <div class="container-fluid">

          <div class="row vertical-center">

              <form action="password" method="post" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">
      
                    <?php 
                    
                    if(isset($nouveau)): ?>
        
                    <p><?= $nouveau ?></p>
        
                    <?php endif; ?>
        
                    <?php 
                        
                    if(!empty($errors)): ?>
        
                    <?php foreach($errors as $error): ?>
                    
                    <p><?= $error ?></p>
                    
                    <?php endforeach; ?>
        
                    <?php endif; ?>

                <p>
                  <label class="sr-only" for="">Mot de passe actuel</label>
                  <input type="password" name="password" value="<?php if(isset($password)) echo $password;?>" placeholder="PASSWORD ACTUEL" class="form-control" required autofocus>
                </p>

                <p>
                  <label class="sr-only" for="">Nouveau mot de passe</label>
                  <input type="password" name="password2" value="<?php if(isset($password2)) echo $password2;?>" placeholder="NOUVEAU PASSWORD" class="form-control" required autofocus>
                </p>

                <p>
                  <label class="sr-only" for="">Confirmation</label>
                  <input type="password" name="checkpwd2" placeholder="CONFIRMATION" class="form-control" required>
                </p>
              
                <button class="btn btn-success btn-block" type="submit">MODIFIER</button>
                
              </form>

              

          </div>
          
        </div>


    <div class="big-spacer"></div>
    <div class="big-spacer"></div>
    <div class="big-spacer"></div>

</div>

<?php require_once('views/footer.php'); ?>

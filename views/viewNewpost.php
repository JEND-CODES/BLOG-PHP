<?php 
$nav_title = "NOUVEL ARTICLE"; 
?>

<?php require_once('views/header.php'); ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<a href="backmember" class="btn return-back"><i class="fas fa-arrow-left"></i></a>

<div class="container">

    <div class="row">

        <form action="newpost" method="post" class="col-md-10 col-md-offset-1">

            <?php 
                
            if(isset($increase)): ?>

                <p class="special-message centered-text"><?= $increase ?></p>

            <?php endif; ?>

            <?php 
                
            if(!empty($errors)): ?>

                <?php foreach($errors as $error): ?>

                    <p class="special-message centered-text"><?= $error ?></p>

                <?php endforeach; ?>

            <?php endif; ?>
            
            <p>
                <label class="sr-only">Titre du post</label>
                <input type="text" name="title" value="<?php if(isset($title)) echo $title; ?>" placeholder="TITRE" class="form-control" required autofocus>
            </p>

            <p>
                <label class="sr-only">Résumé du post</label>
                <textarea rows="5" name="chapi" placeholder="RÉSUMÉ" class="form-control" required><?php if(isset($chapi)) echo $chapi; ?></textarea>
            </p>

            <p>
                <label class="sr-only">Thumbnail</label>
                <input type="text" name="zerolink" value="<?php if(isset($zerolink)) echo $zerolink; ?>" placeholder="THUMBNAIL" class="form-control" required>
            </p>

            <textarea name="content" class="tinymce"><?php if(isset($content)) echo $content; ?></textarea>

            <button type="submit" class="btn btn-primary special-btn-form-2">Publier&nbsp;<i class="fas fa-feather-alt"></i></button>

        </form>

    </div>

</div>


<?php require_once('views/footer.php'); ?>
<?php 
$nav_title = "Modifier un article"; 
?>

<?php require_once('views/header.php'); ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<a href="backmember" class="btn return-back"><i class="fas fa-arrow-left"></i></a>

<div class="container">

    <div class="row">

        <form action="changepost&amp;id=<?= $chapter->getId() ?>" method="post" class="col-md-10 col-md-offset-1">

        <?php 
                
            if(isset($checked)): ?>

            <p><?= $checked ?></p>

            <?php endif; ?>

            <?php 
                
            if(!empty($errors)): ?>

            <?php foreach($errors as $error): ?>

            <p><?= $error ?></p>

            <?php endforeach; ?>

        <?php endif; ?>

        <p>
            <label class="sr-only" for="">Titre du post</label>
            <input type="text" name="title" value="<?= $chapter->getTitle() ?>" placeholder="TITRE" class="form-control" required>
        </p>

        <p>
            <label class="sr-only" for="">Résumé du post</label>
            <textarea rows="5" name="chapi" placeholder="RÉSUMÉ" class="form-control" required><?= $chapter->getChapi() ?></textarea>
        </p>

        <p>
            <label class="sr-only" for="">Thumbnail</label>
            <input type="text" name="zerolink" value="<?= $chapter->getZerolink() ?>" placeholder="THUMBNAIL" class="form-control" required>
        </p>

        <p>
            <label class="sr-only" for="">Auteur du post</label>
            <input type="text" name="author" value="<?= ucfirst($chapter->getAuthor()) ?>" placeholder="AUTEUR DU POST" class="form-control" required>
        </p>

        <textarea name="content" class="tinymce"><?= $chapter->getContent() ?></textarea>

        <br />

        <button type="submit" class="btn btn-primary special-btn-form">Modifier&nbsp;<i class="fas fa-feather-alt"></i></button>
        </form>

    </div>

</div>


<?php require_once('views/footer.php'); ?>

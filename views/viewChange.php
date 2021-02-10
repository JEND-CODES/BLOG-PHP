<?php 
$nav_title = "MODIFICATION D'UN ARTICLE"; 
?>

<?php require_once 'views/header.php'; ?>

<div class="medium-spacer"></div>
<div class="medium-spacer"></div>
<div class="medium-spacer"></div>

<a href="backoff" class="btn return-back"><i class="fas fa-arrow-left"></i></a>

<div class="container">

    <div class="row">

        <form action="change&amp;id=<?= htmlspecialchars($chapter->getId()) ?>" method="post" class="col-md-10 col-md-offset-1">

            <?php 
                    
            if(isset($checked)): ?>

                <p class="special-message centered-text"><?= $checked ?></p>

            <?php endif; ?>

            <?php 
                    
            if(!empty($errors)): ?>

                <?php foreach($errors as $error): ?>

                    <p class="special-message centered-text"><?= $error ?></p>

                <?php endforeach; ?>

            <?php endif; ?>

            <p>
                <label class="sr-only">Titre du post</label>
                <input type="text" name="title" value="<?= htmlspecialchars($chapter->getTitle()) ?>" placeholder="TITRE" class="form-control" required>
            </p>

            <p>
                <label class="sr-only">Résumé du post</label>
                <textarea rows="5" name="chapi" placeholder="RÉSUMÉ" class="form-control" required><?= htmlspecialchars($chapter->getChapi()) ?></textarea>
            </p>

            <p>
                <label class="sr-only">Thumbnail</label>
                <input type="text" name="zerolink" value="<?= htmlspecialchars($chapter->getZerolink()) ?>" placeholder="THUMBNAIL" class="form-control" required>
            </p>

            <p>
                <label class="sr-only">Auteur du post</label>
                <input type="text" name="author" value="<?= ucfirst(htmlspecialchars($chapter->getAuthor())) ?>" placeholder="AUTEUR DU POST" class="form-control" required>
            </p>

            <textarea name="content" class="tinymce"><?= $chapter->getContent() ?></textarea>

            <button type="submit" class="btn btn-primary special-btn-form-2">Modifier&nbsp;<i class="fas fa-feather-alt"></i></button>

        </form>

    </div>

</div>


<?php require_once 'views/footer.php'; ?>
<?php 
$nav_title = "Test Pagination"; 
?>

<?php require_once('views/header.php'); ?>

<div class="big-spacer"></div>

<h2>Tests de pagination</h2>

<?php 
// echo $billy;
?>

<br /><br />

<?php
// var_dump($count_comments);
// var_dump($_POST);
?>

<br /><br />

<?php
//print_r($count_comments);
//echo $count_comments;
?>

<br /><br />

<?php
/*
foreach ($_POST as $name => $value) {
    echo $name; // email, for example
    //echo $value; // the same as echo $_POST['email'], in this case
}
*/
?>

<br /><br />

<?php
//for ($i=0; $i < $count_comments; $i++)
//echo $i;
?>



<?php
foreach($comment_lists as $comment_list): ?>

    <h5 style="border:1px solid blue;"><?= $comment_list->getPseudo() ?></h5>

<?php endforeach; ?>



<br /><br />

<!--<form action="abc?page=0" method="post">

    <input style="width:100%;" class="btn btn-success" type="submit" name="next_page" value="0" />

</form>-->



<br /><br />

<?php //echo $billy; ?>


<!--<div style="border:2px solid blue; margin:10px;">
    <a href="./abc?page=1">Page 1</a>
    <a href="./abc?page=2">Page 2</a>
    <a href="./abc?page=3">Page 3</a>
</div>-->

<!--<div id="pagination-container"></div>-->

<?php 

// Division avec arrondi du résultat
// La fonction ceil () arrondit à l'entier supérieur le plus proche
// $numberBtn = ceil($count_comments / 5);

// Résultat de la division du nombre de messages (sans arrondi)
// $new_count = $count_comments / 5;
// echo $new_count;

// Résultat de la division arrondie à l'entier le plus proche
// echo $numberBtn;

// La fonction floor() arrondit à l'entier inférieur le plus proche
$numberBtn = floor($count_comments / 5);

// Boucle pour générer un nombre d'input correspondant à la division du nombre total de messages par 5 (on veut ici 5 messages par page)
// Avec le résultat de cette boucle, on injecte la valeur $item dans le formulaire et dans l'input (?page=, name et value)
// Cela va permettre de récupérer ces informations dans le controller avec la méthode $_POST
// Précisément : la méthode du Controller $_POST['next_page'.$i] est prise dans une itération de possibilités de $_POST (ce qui équivaut à : if(!empty -> $_POST['next_page_0'], $_POST['next_page_1'], $_POST['next_page_2']...etc)
// Ce process va permettre de collecter les données postées par chaque formulaire généré dans la boucle

foreach(range(0, $numberBtn) as $item): ?>

    <form action="abc?page=<?= $item ?>" method="post">

        <input style="width:100%;" class="btn btn-info" type="submit" name="next_page_<?= $item ?>" value="<?= $item ?>" />

    </form>

<?php endforeach; ?>









<div class="big-spacer"></div>

<?php require_once('views/footer.php'); ?>

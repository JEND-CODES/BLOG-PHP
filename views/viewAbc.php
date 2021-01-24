<?php 
$nav_title = "Test Pagination"; 
?>

<?php require_once('views/header.php'); ?>

<div class="big-spacer"></div>

<h2>Tests de pagination</h2>

<?php
echo $count_comments;
?>

<br /><br />

<?php
var_dump($count_comments);
?>

<br /><br />

<?php
print_r($count_comments);
?>

<br /><br />

<?php
            
foreach($select_all_comments as $select_all_comment): ?>

<div class="list-wrapper" style="border:4px solid cornflowerblue;">

    <div>

    <p><?= $select_all_comment->getPseudo() ?></p>

    </div>

</div>

<?php endforeach; ?>

<div id="pagination-container"></div>

<div class="big-spacer"></div>

<?php require_once('views/footer.php'); ?>

<?php 
$nav_title = "DERNIERS POSTS"; 
?>

<?php require_once 'views/header.php'; ?>

<?php require_once 'utils/dates.php'; ?>

<div class="medium-spacer"></div>
 
<section>
    
    <div class="container">

        <div class="row">

            <?php
            foreach($chapters as $chapter): ?>

                <div class="col-md-12 margin">

                    <div class="row block">

                        <div class="col-md-6">

                            <a href="chapter&amp;id=<?= $chapter->getId() ?>">    
                                <img src="<?= $chapter->getZerolink() ?>" class="img-responsive featured-img" alt="<?= $chapter->getTitle() ?>" title="<?= $chapter->getTitle() ?>">
                            </a>

                        </div>
                        
                        <div class="col-md-6">
                            
                            <a href="chapter&amp;id=<?= $chapter->getId() ?>">

                                <h3><?= $chapter->getTitle() ?></h3>

                            </a>

                            <p class="post-date-info">Publié le

                            <?php
                            // Transformer date_format : Cf. https://www.php.net/manual/fr/datetime.format.php
                            // Solution avec strtotime() -> Cf. https://tecadmin.net/convert-date-format-in-php/

                            $sql_Date_1 = $chapter->getChapterDate();

                            $new_Date_Format_1 = date("d .m Y à H:i", strtotime($sql_Date_1));

                            ?><?= 
                            str_replace($month_1,$month_2,$new_Date_Format_1);

                            ?>

                            </p>

                            <?php
                            if(!empty($chapter->getRefreshDate())): 
                            ?>

                            <p class="post-date-info">Dernière mise à jour le 
                                                        
                            <?php

                            $sql_Date_2 = $chapter->getRefreshDate();

                            $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));

                            ?><?=
                            str_replace($month_1,$month_2,$new_Date_Format_2);

                            ?>
                                                            
                            </p>

                            <?php endif; ?>

                            <p class="post-chapo"><?= substr($chapter->getChapi(),0,300) ?> ...</p>

                        </div>
                        
                    </div>

                </div>

            <?php endforeach; ?>
        
        </div>

    </div>

    <!-- Pagination -->
    <div class="container">

    <?php if($count_chapters > 4): ?>

        <i class="fas fa-chevron-left special-chevron"></i>

    <?php endif; ?>

    <?php 

    $numberBtn = floor($count_chapters / 5);

    foreach(range(0, $numberBtn) as $item): ?>

        <a class="btn btn-info special_btn_nbr_<?= $item ?>" href="./posts?page=<?= $item ?>"><?= $item ?></a>

    <?php endforeach; ?>

    </div>
    
</section>


<?php require_once 'views/footer.php'; ?>
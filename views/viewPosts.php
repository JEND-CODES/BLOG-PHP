<?php 
$nav_title = "Derniers posts"; 
?>

<?php require_once('views/header.php'); ?>

<?php 
// Appel pour changements du format des dates ($month_1, $month_2)
require_once('content/dates.php'); ?>

<div class="medium-spacer"></div>
 
    <!-- Featured Post -->
    <section id="featured-post">
        
        <div class="container">

            <div class="row">

                <?php
                foreach($chapters as $chapter): ?>

                    <div class="col-md-12 margin">

                        <div class="row block">

                            <div class="col-md-6">

                            <a href="chapitre&amp;id=<?= $chapter->getId() ?>">    
                                <img src="<?= $chapter->getZerolink() ?>" class="img-responsive" alt="<?= $chapter->getTitle() ?>" title="<?= $chapter->getTitle() ?>">
                            </a>

                                <br />

                            </div>
                            <div class="col-md-6">
                                
                                <a href="chapitre&amp;id=<?= $chapter->getId() ?>">

                                    <!--<p>Chapitre <?= $chapter->getChapi() ?> : <?= $chapter->getTitle() ?></p>-->

                                    <h3><?= $chapter->getTitle() ?></h3>

                                </a>

                                <!--<p>Auteur : <?= $chapter->getAuthor() ?></p>-->

                                <!--<p><?= ucfirst(substr(strip_tags($chapter->getContent(),'<br>'),0,20)) ?>...</p>-->

                                <!--<a href="chapitre&amp;id=<?= $chapter->getId() ?>"><i class="fas fa-eye"></i></a>-->

                                <p class="post-date-info">Publié le

                                <?php
                                // Transformer date_format : Cf. https://www.php.net/manual/fr/datetime.format.php
                                // Solution avec strtotime() -> Cf. https://tecadmin.net/convert-date-format-in-php/

                                $sql_Date_1 = $chapter->getChapterDate();

                                $new_Date_Format_1 = date("d .m Y à H:i", strtotime($sql_Date_1));

                                echo str_replace($month_1,$month_2,$new_Date_Format_1);

                                ?>

                                </p>

                                <?php
                                if(!empty($chapter->getRefreshDate())): 
                                ?>

                                <p class="post-date-info">Dernière mise à jour le 
                                                            
                                <?php

                                $sql_Date_2 = $chapter->getRefreshDate();

                                $new_Date_Format_2 = date("d .m Y à H:i", strtotime($sql_Date_2));

                                echo str_replace($month_1,$month_2,$new_Date_Format_2);

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
     
    </section>
    <!-- End Featured Post -->

    


<?php require_once('views/footer.php'); ?>

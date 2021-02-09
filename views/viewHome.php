<?php require_once 'views/header.php'; ?>

<!-- Header -->
<header class="special-header" style="background-image:url(content/theme/img/homeBackground.png) !important;">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <img class="portrait" src="content/theme/img/portrait_small.jpg" alt="Jean-Eudes Nouaille-Degorce" title="Jean-Eudes Nouaille-Degorce">

            </div>

            <div class="col-lg-6 special-presentation">

                <div class="intro-text">

                    <h3 class="dev-title">Jean-Eudes <br class="hidden-break"/>Nouaille-Degorce</h3>
                    <!--<span class="name">MON BLOG</span>-->
                    <!--<hr class="star-light">-->
                    <p class="linear-para">Le développeur web qu’il vous faut&#8239;&#8239;!</p>
                    <p class="para-presentation">Bienvenue sur ce blog php de démonstration&#8239;&#8239;! Vous trouverez des détails sur mon parcours et un lien vers mon CV. Je vous invite à vous inscrire dès maintenant sur ce site pour y publier vos articles. Il vous suffit de choisir un pseudo, de vérifier sa disponibilité et de sélectionner ensuite votre mot de passe. Dès réception de votre inscription, je validerai votre profil et le tour sera joué&#8239;&#8239;!</p>

                </div>

            </div>

        </div>

    </div>

</header>

<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="special-title">FORMATIONS ET EXPÉRIENCES</h3>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                <p class="para-about">Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem item sum accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div class="col-lg-4">
                <p class="para-about">Et ipsum sed ut quasi perspiciatis unde omnis iste natus error sit voluptatem item sum accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt laudantium.</p>
                
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a href="<?= URL ?>content/theme/img/CVJEND2021.pdf" target="_blank" class="btn btn-lg btn-outline">
                    <i class="fa fa-download"></i> CV
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PORTFOLIO -->
<section id="portfolio" class="section-portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="portfolio-title special-title">Dernières réalisations</h3>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search fa-2x"></i>
                        </div>
                    </div>
                    <img src="content/theme/img/portfolio/demo1.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search fa-2x"></i>
                        </div>
                    </div>
                    <img src="content/theme/img/portfolio/demo2.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search fa-2x"></i>
                        </div>
                    </div>
                    <img src="content/theme/img/portfolio/demo3.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search fa-2x"></i>
                        </div>
                    </div>
                    <img src="content/theme/img/portfolio/demo4.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search fa-2x"></i>
                        </div>
                    </div>
                    <img src="content/theme/img/portfolio/demo5.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search fa-2x"></i>
                        </div>
                    </div>
                    <img src="content/theme/img/portfolio/demo6.jpg" class="img-responsive" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Modals-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Réalisation</h3>
                        <hr class="star-primary">
                        <img src="content/theme/img/portfolio/demo1.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        <ul class="list-inline item-details">
                            <li>Démo:
                                <strong><a href="#">Planetcode.fr</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong>2021
                                </strong>
                            </li>
                            <li>Langage:
                                <strong>PHP
                                </strong>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Réalisation</h3>
                        <hr class="star-primary">
                        <img src="content/theme/img/portfolio/demo2.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        <ul class="list-inline item-details">
                            <li>Démo:
                                <strong><a href="#">Planetcode.fr</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong>2021
                                </strong>
                            </li>
                            <li>Langage:
                                <strong>PHP
                                </strong>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Réalisation</h3>
                        <hr class="star-primary">
                        <img src="content/theme/img/portfolio/demo3.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        <ul class="list-inline item-details">
                            <li>Démo:
                                <strong><a href="#">Planetcode.fr</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong>2021
                                </strong>
                            </li>
                            <li>Langage:
                                <strong>PHP
                                </strong>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Réalisation</h3>
                        <hr class="star-primary">
                        <img src="content/theme/img/portfolio/demo4.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        <ul class="list-inline item-details">
                            <li>Démo:
                                <strong><a href="#">Planetcode.fr</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong>2021
                                </strong>
                            </li>
                            <li>Langage:
                                <strong>PHP
                                </strong>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Réalisation</h3>
                        <hr class="star-primary">
                        <img src="content/theme/img/portfolio/demo5.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        <ul class="list-inline item-details">
                            <li>Démo:
                                <strong><a href="#">Planetcode.fr</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong>2021
                                </strong>
                            </li>
                            <li>Langage:
                                <strong>PHP
                                </strong>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Réalisation</h3>
                        <hr class="star-primary">
                        <img src="content/theme/img/portfolio/demo6.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        <ul class="list-inline item-details">
                            <li>Démo:
                                <strong><a href="#">Planetcode.fr</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong>2021
                                </strong>
                            </li>
                            <li>Langage:
                                <strong>PHP
                                </strong>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section formulaire de contact -->
<!-- Starter Bootsrap Theme - Contact Section -->
<section id="contact" class="section-contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="contact-title special-title">Me contacter</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form class="special-form" name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nom</label>
                                <input type="text" class="form-control special-input" placeholder="Nom" id="name" required data-validation-required-message="Nom manquant">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control special-input" placeholder="Email" id="email" required data-validation-required-message="Email manquant">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Téléphone</label>
                                <input type="tel" class="form-control special-input" placeholder="Téléphone" id="phone" required data-validation-required-message="Téléphone manquant">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control special-textarea" placeholder="Message" id="message" required data-validation-required-message="Message manquant"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-primary special-btn-form">Envoyer</button>
                            </div>
                        </div>
                        <hr class="special-hr">
                    </form>
                </div>
            </div>
        </div>
    </section>
<!-- Starter Bootsrap Theme - Contact Section END -->


<?php require_once 'views/footer.php'; ?>
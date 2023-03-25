  <?php require "inc/header.inc.php"; //incude du header pour toutes les pages et éviter des tonnes de lignes de codes?>
<body id="top">

    <!-- preloader
    ==================================================
  -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="row">

            <nav class="header-nav-wrap">
                <ul class="header-nav">
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">Accueil</a></li>
                    <li><a class="smoothscroll"  href="#about" title="about">A propos de moi</a></li>
                    <li><a class="smoothscroll"  href="#services" title="services">Compétences</a></li>
                    <li><a class="smoothscroll"  href="#works" title="works">Expériences</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                    <?php if(userConnect()) {
                      ?>
                      <li><a href="view/connexion.php?action=deconnexion" title="deconnexion">Déconnexion</a></li>
                      <?php
                    }
                    else {?>
                      <li><a href="view/connexion.php" title="connexion">Connexion</a></li>
                      <?php
                    }?>


                </ul>
            </nav> <!-- end header-nav-wrap -->

            <a class="header-menu-toggle" href="#0">
                <span class="header-menu-icon"></span>
            </a>

        </div> <!-- end row -->
    </header> <!-- end s-header -->
    <!-- home
    ================================================== -->
    <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="view/images/dev.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h1>
                Développeur Web <br>
                Ben Farhat <br>
                Walid

                </h1>

                <div class="home-content__button">
                    <a href="#about" class="smoothscroll btn btn-animatedbg">
                      A propos de moi
                    </a>
                </div>

            </div> <!-- end home-content__main -->

            <div class="home-content__scroll">
                <a href="#about" class="scroll-link smoothscroll">
                    Scroll
                </a>
            </div>

        </div> <!-- end home-content -->

    </section> <!-- end s-home -->

    <!-- about
    ================================================== -->
    <section id="about" class="s-about target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 data-num="01" class="subhead">Qui je suis?</h3>
                <h1 class="display-1">
                Walid Ben Farhat j'ai 21 ans et je suis développeur web.
                </h1>
                <p class="lead">
                Je suis actuellement en formation chez LepoleS pour étoffer mes connaissances et en apprendre d'avantages sur le développement web
                </p>
            </div>
        </div>

        <div class="row about-process block-1-2 block-tab-full">

            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__header item-process__header--planning">
                    <h3>Motivé</h3>
                </div>
                <p>
                    Je suis jeune,motivé et j'ai une soif de connaissance insatiable.Le web est pour moi une vocation de toute une vie j'ai commencé à utiliser un ordinateur à l'âge de 6 ans,et depuis je n'ai jamais pu m'en séparer.

                </p>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__header item-process__header--branding">
                    <h3>Sérieux</h3>
                </div>
                <p>
                    Calme,sérieux et réfléchi je ne m'arrête pas en moitié de chemin et fais de mon mieux pour arriver à mes objectifs.
                </p>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__header item-process__header--implementation">
                    <h3>Travailleur</h3>
                </div>
                <p>
                    M'étant essayé dans plusieurs domaines j'ai acquis de chaque travail des compétences j'ai touché un peu à tout électricité,développement,magasinier,technicien fibre optique ce qui m'a permis alors de mon jeune âge d'acquérir de la maturité.
                </p>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__header item-process__header--documentation">
                    <h3>Autonome</h3>
                </div>
                <p>
                    Étant depuis petit timide et réservé (beaucoup moins avec le temps) par peur de demander de l'aide aux autres j'ai développé une autonomie qui est aujourd'hui maintenant une de mes forces.
                </p>
            </div>

        </div>  <!-- end about-process -->

    </section> <!-- end s-about -->

    <!-- services
    ================================================== -->
    <section id="services" class="s-services target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 data-num="02" class="subhead">Compétences</h3>
                <h1 class="display-1 display-1--light">
                Mes compétences acquises au fil du temps.
                </h1>
                <p class="lead lead-light">
                Liste non exhaustive de mes compétences actuelles.
                </p>
            </div>
        </div>

        <div class="row services-list block-1-3 block-m-1-2 block-tab-full">

            <div class="col-block item-service" data-aos="fade-up">
                <h4>HTML</h4>
                <p>
                Maitrise des balises, de la syntaxe et de la structure d'un site codé en HTML5.
                </p>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <h4>CSS</h4>
                <p>
                Maitrise de la syntaxe css,styliser un menu,un bouton, un paragraphe ,et placer ces mêmes éléments.                </p>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <h4>JS</h4>
                <p>
                Maitrise des animations en javascript, scroll,alert,événements et des méthodes (prompt,alert,date,calcul,randomizer etc..).
                </p>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <h4>PHP</h4>
                <p>
                Maitrise de la syntaxe, des boucles,des classes,des bbd(SQL) et de l'architecture MVC (objet).
                </p>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <h4>Bootstrap</h4>
                <p>
                Maitrise du framework,de la doc et des principales fonctions.
                </p>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <h4>Symfony</h4>
                <p>
                Maitrise des bundles,routing,twig,assets,controllers etc...
                </p>
            </div>


        </div> <!-- end services-list -->

    </section> <!-- end s-services -->
    <section id="works" class="s-works target-section">

      <div class="row section-header" data-aos="fade-up">
          <div class="col-full">
              <h3 data-num="03" class="subhead">Expériences</h3>
              <h1 class="display-1">
              Expériences
              </h1>
          </div>
      </div>
    <center><table class="experiences">
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Poste</th>
                <th>Date</th>
                <th>Tâches</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($experiences as $experience) : ?>
            <tr>
                <td><?php echo htmlentities($experience->entreprise);?></td>
                <td><?php echo htmlentities($experience->poste);?></td>
                <td><?php echo htmlentities($experience->date);?></td>
                <td><?php echo htmlentities($experience->tache);?></td>
                <td>
                  <?php if(userConnect()) {
                    ?>
                    <a href="index.php?op=delete&id=<?php echo $experience->id_experience; ?>">
                        Supprimer
                    </a>
                </td>
                <td>
                    <a href="index.php?op=update&id=<?php echo $experience->id_experience; ?>">
                        Modifier
                    </a>
                </td>
                <?php } ?>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
  </center>
  <?php if(userConnect()) {
    ?>
  <div class="text-center">
  <a href="index.php?op=new">Ajouter un nouveau travail</a>
  </div>
  <?php } ?>
</section> <!-- end s-works2 -->
    <!-- works
    ================================================== -->
    <section id="works" class="s-works target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 data-num="04" class="subhead">Projets</h3>
                <h1 class="display-1">
                Projets Réalisés.
                </h1>
            </div>
        </div>

        <div class="portfolio block-1-4 block-m-1-3 block-tab-1-2 collapse">

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet1.png" class="thumb-link" title="Jurassic" data-size="1050x700">
                        <img src="view/images/portfolio/projet1.png"
                             srcset="view/images/portfolio/projet1.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Jurassic World
                    </h3>
                    <p class="item-folio__cat">
                        PHP/Bootstrap
                    </p>
                </div>


                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet2.png" class="thumb-link" title="Restaurant" data-size="1050x700">
                        <img src="view/images/portfolio/projet2.png"
                             srcset="view/images/portfolio/projet2.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Restaurant
                    </h3>
                    <p class="item-folio__cat">
                        HTML/CSS
                    </p>
                </div>


                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet3.png" class="thumb-link" title="Boutique" data-size="1050x700">
                        <img src="view/images/portfolio/projet3.png"
                             srcset="view/images/portfolio/projet3.png, view/images/portfolio/projet3.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Boutique
                    </h3>
                    <p class="item-folio__cat">
                        Bootstrap
                    </p>
                </div>


                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet4.png" class="thumb-link" title="Licornes" data-size="1050x700">
                        <img src="view/images/portfolio/projet4.png"
                             srcset="view/images/portfolio/projet4.png, view/images/portfolio/projet4.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Licornes
                    </h3>
                    <p class="item-folio__cat">
                        Bootstrap/Javascript
                    </p>
                </div>

                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet5.png" class="thumb-link" title="Portfolio" data-size="1050x700">
                        <img src="view/images/portfolio/projet5.png"
                             srcset="view/images/portfolio/projet5.png, view/images/portfolio/projet5.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Site CV
                    </h3>
                    <p class="item-folio__cat">
                        PHP
                    </p>
                </div>



                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet6.png" class="thumb-link" title="Location" data-size="1050x700">
                        <img src="view/images/portfolio/projet6.png"
                             srcset="view/images/portfolio/projet6.png, view/images/portfolio/projet6.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Location Gîtes
                    </h3>
                    <p class="item-folio__cat">
                        PHP/JS
                    </p>
                </div>



                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet7.png" class="thumb-link" title="Film" data-size="1050x700">
                        <img src="view/images/portfolio/projet7.png"
                             srcset="view/images/portfolio/projet7.png, view/images/portfolio/projet7.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Film
                    </h3>
                    <p class="item-folio__cat">
                        PHP/HTML/JS
                    </p>
                </div>



                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

            <div class="col-block item-folio" data-aos="fade-up">

                <div class="item-folio__thumb entree">
                    <a href="view/images/portfolio/projet8.png" class="thumb-link" title="Restaurant" data-size="1050x700">
                        <img src="view/images/portfolio/projet8.png"
                             srcset="view/images/portfolio/projet8.png, view/images/portfolio/projet8.png" alt="">
                    </a>
                </div>

                <div class="item-folio__text">
                    <h3 class="item-folio__title">
                        Restaurant
                    </h3>
                    <p class="item-folio__cat">
                        HTML/CSS
                    </p>
                </div>



                <div class="item-folio__caption">
                    <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                </div>

            </div> <!-- end item-folio -->

        </div> <!-- end portfolio -->
        </section> <!-- end s-works -->

  <!-- contact
  ================================================== -->
  <section id="contact" class="s-contact target-section">

      <div class="row section-header" data-aos="fade-up">
          <div class="col-full">
              <h3 data-num="04" class="subhead">Besoin de mes services?</h3>
              <h1 class="display-1 display-1--light">Si vous avez besoin de mes services ou avez des question à me poser contacer moi à l'adresse mail suivante <a href="mailto:benfarhat.walid@lepoles.com">ici</a></h1>
          </div>
      </div>

      <div class="row contact-infos">

          <div class="col-five md-seven tab-full contact-address" data-aos="fade-up">
              <h4>Ou me trouver?</h4>

                <ul class="contact-list">
                  <li>
              <a href="https://www.linkedin.com/in/walid-ben-farhat-a03497187/" target="_blank">
              Linkedin
              </a>
            </li>
              </ul>
          </div>

          <div class="col-three md-five tab-full contact-social" data-aos="fade-up">
              <h4>Mail</h4>

              <ul class="contact-list">
                  <li><a href="mailto:benfarhat.walid@lepoles.com">Envoyer un mail</a></li>
              </ul>
          </div>

          <div class="col-four md-six tab-full contact-number" data-aos="fade-up">
              <h4>Téléphone</h4>

              <ul class="contact-list">
                  <li><a href="tel:0767225875">+33 7 89 12 34 56</a></li>
              </ul>
          </div>

      </div> <!-- end contact-infos -->

  </section> <!-- end s-contact -->

  <?php require "inc/footer.inc.php"; //incude du footer pour toutes les pages et éviter des tonnes de lignes de codes?>

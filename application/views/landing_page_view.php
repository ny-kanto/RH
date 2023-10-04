<link rel="stylesheet" href="<?php echo site_url('assets/css/landing.css')?>">
<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue sur notre site!</div>
                <div class="masthead-heading text-uppercase">Ravie de vous rencontrer</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Voir plus</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Nous avons <?php  echo count($services); ?> departements</h3>
                </div>
                <div class="row text-center">
                    <?php foreach($services as $service){ ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?php  echo $service['libelle']; ?></h4>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        
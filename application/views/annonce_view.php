<body>
<link rel="stylesheet" href="<?php echo site_url('assets/fonts/icomoon/style.css')?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/annonce_view.css')?>">
    <div class="container">
        <div class="row head">
         <center>   <h1 style="color:white">On recrute!</h1> </center>
        
            <hr>
        </div>


        <div class="row content">
            <div class="row">
            <a class="navbar-brand" href="index.html" style="color:black">INF_Entertainement</a>
            </div>
            <div class="row">
            <p>Notre Service de/d' <?php echo $nom_service; ?> recherche  <b><?php echo $nbpersonne; ?> personne(s) </b> pour le poste de <b> <?php echo $poste ?> </b> ayant les profil suivant:</p>
            <div class="col-md-4 critere">
                <h4>Diplome *</h4>
                <h6><b><?php echo $diplome;  ?> </b></h6>
                <hr>
                <h4>Experiences *</h4>
                <h6><b><?php echo $experience;  ?> </b></h6>
                <hr>

                
            </div>
            <div class="col-md-4 critere">
                <h4>Sexe *</h4>
                <?php $nom_sexe="Homme";
                if($sexe==0) $nom_sexe = "Femme"; ?>
                <h6><b><?php echo $nom_sexe;  ?> </b></h6>
                <hr>

                <h4>Nationalite *</h4>
                <?php $nom_nationalite="Malgache";
                 if($nationalite==0) $nom_nationalite="Etranger"; ?>
                <h6><b><?php echo $nom_nationalite;  ?> </b></h6>
                <hr>
            </div>

            <div class="col-md-4 critere">
                <h4>Adresse *</h4>
                <h6><b><?php echo $adresse;  ?> </b></h6>
                <hr>

                <h4>Avant le :</h4>
                <h6><b><?php echo $datelimite;  ?> </b></h6>
                <hr>
            </div>
            <div class="row">
                <button class="btn btn-primary rounded-0 py-2 px-4"><a href="<?php echo site_url('test'); ?>?idAnnonce=<?php echo $id; ?>">Questionnaire</a></button>
            </div>
            </div>
        </div>

        
    </div>
</body>
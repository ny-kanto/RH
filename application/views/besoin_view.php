<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/icomoon/style.css')?>">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css')?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo site_url('assets/css/form_besoin.css')?>">

    <title>Definition Besoin</title>
  </head>
  <body>
  <script>
   <?php
    if(isset($error)){ ?>
  alert('<?php echo $error ?>');
  <?php  } ?>
  </script>

  <div class="content">
    
    <div class="container">

      <div class="row align-items-stretch no-gutters contact-wrap">
        
        <div class="col-md-12">
        
                
          <div class="form h-100">
          <form class="mb-5" method="post" action="besoin/insertBesoin" id="contactForm" name="contactForm">
            <div id="part1">
            <h3>Creation de l'annonce</h3>
           

              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Poste *</label>
                  <select class="custom-select" id="budget" name="poste">
                  <?php  foreach($postes as $poste){ ?>
                        <option value="<?php echo $poste['id']  ?>"><?php echo $poste['libelle'] ?></option>
                  <?php } ?>
                  </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Volume *</label>
                  <select class="custom-select" id="budget" name="volume">
                    <option value="0">Horaire</option>
                    <option value="1">Tache</option>
                       
                </select>
                </div>
              </div>

              

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label">Valeur *</label>
                  <input type="number" class="form-control" name="valeur" id="name" placeholder="valeur du volume">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label">Date Fin de candidature *</label>
                  <input type="date" class="form-control" name="date" id="date" placeholder="date">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <button type="button" class="btn btn-primary rounded-0 py-2 px-4 suivant_btn1" >Suivant</button>
                 
                </div>
              </div>
       
        </div>

        <div id="part2" style="display: none;">
        <h3>Critère du personnel</h3>
              <div class="row">
              <div class="col-md-12 form-group mb-3">
              <label for="" class="col-form-label">Diplome *</label>
                  <select class="custom-select" id="diplome" name="diplome" placeholder="choisisser">
                  <?php  foreach($diplomes as $diplome){ ?>
                        <option value="<?php echo $diplome['id']  ?>"><?php echo $diplome['libelle'] ?></option>
                  <?php } ?>   
                    </select>

                </div>
              </div>

              <div class="row">
              <div class="col-md-12 form-group mb-3">
              <label for="" class="col-form-label">Experience *</label>
                  <select class="custom-select" id="experience" name="experience">
                  <?php  foreach($experiences as $experience){ ?>
                        <option value="<?php echo $experience['id']  ?>"><?php echo $experience['libelle'] ?></option>
                  <?php } ?>   
                </select>
                </div>
              </div>

          

              <div class="row">
              <div class="col-md-12 form-group mb-3">
              <label for="" class="col-form-label">Adresse *</label>
                  <select class="custom-select" id="adresse" name="adresse" placeholder="choisisser">
                  <?php  foreach($adresses as $adresse){ ?>
                        <option value="<?php echo $adresse['id']  ?>"><?php echo $adresse['libelle'] ?></option>
                  <?php } ?>   
                </select>
                 
                </div>
              </div>

              <div class="row">
              <div class="col-md-12 form-group mb-3">
              <label for="" class="col-form-label">Sexe *</label>
                  <select class="custom-select" id="sexe" name="sexe" placeholder="choisisser">
 
                    <option value="1">Homme</option>
                    <option value="0">Femme</option>
               
                </select>
                </div>
              </div>

              <div class="row">
              <div class="col-md-12 form-group mb-3">
              <label for="" class="col-form-label">Nationalite *</label>
                  <select class="custom-select" id="nationalite" name="nationalite" placeholder="choisisser">
 
                    <option value="1">Malgache</option>
                    <option value="0">Autres</option>
               
                </select>
                </div>
              </div>



              <input type="hidden" name="idService" value="<?php echo $idService ?>">


              <div class="row">
                <div class="col-md-12 form-group">
                  <button type="button" value="Precedent" class="btn btn-info rounded-0 py-2 px-4 precedent_btn" style="float:left">Precedent </button>


                  <input type="submit" value="Confirmer" class="btn btn-primary rounded-0 py-2 px-4" style="float:right">
                    <span class="submitting"></span>
                </div>
              </div>
            

            <div id="form-message-warning mt-4"></div> 
                 
            
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
    
    
  <script src="<?php echo site_url('assets/js/form_besoin.js')?>"></script>
    <script src="<?php echo site_url('assets/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?php echo site_url('assets/js/popper.min.js')?>"></script>
    <script src="<?php echo site_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo site_url('assets/js/jquery.validate.min.js')?>"></script>
  

  </body>
</html>
<link rel="stylesheet" href="<?php echo site_url('assets/fonts/icomoon/style.css')?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/card.css')?>">
<script src="<?php echo site_url('assets/js/filtre.js')?>"></script>
<div class="container content">

<div class="header">
    <h1>Liste des annonces</h1>
    <h2>Filtrer</h2>
    <label for="">Departement</label>
    <select name="services" id="services">
      <?php foreach($services as $service){ ?>
      <option value="<?php echo $service['id']; ?>"><?php echo $service['libelle']; ?></option>
      <?php } ?>
    </select>

    <label for="">Adresse</label>
    <select name="services" id="services">
      <?php foreach($services as $service){ ?>
      <option value="<?php echo $service['id']; ?>"><?php echo $service['libelle']; ?></option>
      <?php } ?>
    </select>

    <label for="">Diplome</label>
    <select name="services" id="services">
      <?php foreach($services as $service){ ?>
      <option value="<?php echo $service['id']; ?>"><?php echo $service['libelle']; ?></option>
      <?php } ?>
    </select>

    <label for="">Sexe</label>
    <select name="services" id="services">
      <?php foreach($services as $service){ ?>
      <option value="<?php echo $service['id']; ?>"><?php echo $service['libelle']; ?></option>
      <?php } ?>
    </select>

    <label for="">Nationalite</label>
    <select name="services" id="services">
      <?php foreach($services as $service){ ?>
      <option value="<?php echo $service['id']; ?>"><?php echo $service['libelle']; ?></option>
      <?php } ?>
    </select>
    <div class="row form-group">
     
      <input type="search" class="form-control" name="recherche" id="recherche" placeholder="rechercher">
      <input type="submit" value="recherche" >
    </div>
  </div>

  <!-- Photo Grid -->
      <!-- Row 1 -->
      
  <div class="card-deck">
    <?php foreach($annonces as $annonce){ ?>
      <div class="card">
        <h2>Recherche</h2>
        <p>Departement de/d' : <?php echo $annonce['nom_service']; ?></p>

        <!-- <img class="card-img-top" src="http://www.orseu-concours.com/451-615-thickbox/selor-test-de-raisonnement-abstrait-niveau-a.jpg" alt="Company logo"> -->
        <div class="card-body">
          <h5 class="card-title"><?php echo $annonce['poste']; ?></h5>
          <h3>Nombre: <?php echo $annonce['nbpersonne']; ?></h3>
          <ul class="list-group">
            <li class="list-group-item list-group-item-success"><i class="fa fa-briefcase"style="font-size:20px;"></i> <?php echo $annonce['diplome']; ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-clock-o"style="font-size:20px;"></i>Experience: <?php echo $annonce['experience']; ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-map-marker"style="font-size:20px;"></i> <?php echo $annonce['adresse']; ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-user"style="font-size:20px;"></i> <?php  if($annonce['sexe']==1){ echo "Homme"; } else{ echo "Femme"; } ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-flag"style="font-size:20px;"></i ><?php if($annonce['nationalite']==1){ echo "Malgache"; } else{ echo "Etranger"; } ?></li>
          </ul>
          
                <button class="btn btn-info rounded-0 py-2 px-4"><a href="<?php echo site_url('test'); ?>?idAnnonce=<?php echo $annonce['id']; ?>">Questionnaire</a></button>
           
           
          <button class="btn btn-primary rounded-0 py-2 px-4">Postuler</button>
        </div>
        
        </div> <!---card--->
        <?php } ?>
      </div><!---card-deck -->

      <?php if(count($annonces)>0){
        $debut=1;
        if($annonces[0]['id']-6 < 0){
          $debut=1;
        }else{
          $debut=$annonces[0]['id']-6;
        }
        if($annonces[0]['id']==1){ ?>
             <button class="btn btn-primary rounded-0 py-2 px-4" style="float:right"><a href="annonce?debut=<?php echo $annonces[0]['id'] + 6; ?>"><i class="fa fa-like "style="font-size:20px;"></i>Suivant</a></button>
        <?php }else{ ?>
        <button class="btn btn-primary rounded-0 py-2 px-4"  style="float:left"> <a href="annonce?debut=<?php echo $debut; ?>"><i class="fa fa-like "style="font-size:20px;"></i>Precedent</a></button>
        <button class="btn btn-primary rounded-0 py-2 px-4" style="float:right"><a href="annonce?debut=<?php echo $annonces[0]['id'] + 6; ?>"><i class="fa fa-like "style="font-size:20px;"></i>Suivant</a></button>
      
    <?php   }
            } ?>
      <!-- <button class="btn btn-primary rounded-0 py-2 px-4"  style="float:left"> <a href="annonce?debut=<?php echo $annonces[0]['id'] - 9; ?> ?>">Precedent</a></button>
      <button class="btn btn-primary rounded-0 py-2 px-4" style="float:right"><a href="annonce?debut=<?php echo $annonces[0]['id'] + 9; ?>">Suivant</a></button>
     -->
     <div class="sep"></div>
    
</div>
 
  
</div>
<script src="<?php echo site_url('assets/js/jquery-3.3.1.min.js')?>"></script>
<script src="<?php echo site_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap.min.js')?>"></script>

 
 




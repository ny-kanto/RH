<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley.js"></script>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header">
          <h4>Liste des personnes</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Note</th>
                <th>Entretien</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($listecandidats as $candidat) { ?>
                <tr>
                  <td><?php echo $candidat->nom; ?></td>
                  <td><?php echo $candidat->prenom; ?></td>
                  <td><?php echo $candidat->note; ?></td>
                  <td><a href=""><button class="btn btn-primary">Entretien</button></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley.js"></script>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Formulaire QCM</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('Test/form'); ?>">
                        <?php foreach ($question as $questions) { ?>
                            <div class="form-group">
                                <label for="nom" class="form-label"><?php echo $questions->texte; ?></label>
                                <input type="hidden" name="idquestion" value="<?php echo $questions->id; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="nom" class="form-label">Cochez la/les bonne(s) reponse(s)</label>
                                <?php foreach ($reponse as $reponses) {
                                    if ($reponses->idquestion == $questions->id) { ?>
                                        <p>
                                            <input type="checkbox" class="form-check-input" name="checkboxes[]" value="<?php echo $reponses->id; ?>"><?php echo $reponses->texte; ?>
                                        </p >
                                <?php }
                                } ?>
                            </div>
                        <?php } ?>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/questionnaire.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley.js"></script>
<!-- <?php echo var_dump($question); ?> -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6  question">
            <div class="card mb-4 left_card">
                <div class="card-header">
                    <h4>Liste des questions</h4>
                </div>
                <div class="card-body">
                    <ul>
                <?php foreach ($question as $questions) { ?>
                            <div class="form-group">
                              <li> <label for="nom" class="form-label"><b><?php echo $questions->texte; ?></b></label></li> 
                            </div>
                            <div class="form-group mt-3">
                                <label for="nom" class="form-label">Cochez la/les bonne(s) reponse(s)</label>
                                <?php foreach ($reponse as $reponses) {
                                    if ($reponses->idquestion == $questions->id) { ?>
                                        <p>
                                            <input type="checkbox" class="form-check-input" name="checkboxes[]" value="<?php echo $reponses->id; ?>"><?php echo $reponses->texte; ?>
                                        </p>
                                <?php }
                                } ?>
                            </div>
                        <?php } ?>
                        </ul>
                </div>
            </div>


            <div class="card right_card">
                <div class="card-header">
                    <h4>Creation Questionnaire</h4>
                </div>
                <div class="card-body">
                    <?php if ($this->session->has_userdata('idquestion')) { ?>
                        <form method="POST" action="<?php echo base_url('Test/reponse'); ?>">
                            <div class="form-group">
                                <label for="nom" class="form-label">Reponse :</label>
                                <input type="text" class="form-control" name="texte">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                        <form action="<?php echo base_url('Test/save'); ?>" method="post">
                            <div class="form-group mt-3">
                                <label for="nom" class="form-label">Cochez la/les bonne(s) reponse(s)</label>
                                <?php foreach ($listereponse as $listereponse) { ?>
                                    <p>
                                        <input type="checkbox" class="form-check-input" name="checkboxes[]" value="<?php echo $listereponse->id; ?>"><?php echo $listereponse->texte; ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form action="<?php echo base_url('Test/question'); ?>" method="post">
                            <div class="form-group">
                                <label for="nom" class="form-label">Question :</label>
                                <input type="text" class="form-control" name="texte" required>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="form-label">Coefficient :</label>
                                <input type="number" class="form-control" name="coeff" required>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                        <button class="btn btn-primary rounded-0 py-2 px-4"><a href="<?php echo base_url('Test/all'); ?>">Finaliser le formulaire</a></button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
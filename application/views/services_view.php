<link rel="stylesheet" href="<?php echo site_url('assets/css/services.css')?>">
<div class="container">
<h2>Services</h2>
<div class="container liste">
    <?php foreach($services as $service){ ?>
        <div class="box">
            <a href="besoin?idService=<?php  echo $service['id']; ?>"><?php  echo $service['libelle']; ?></a>
        </div>
    <?php } ?>
</div>

</div>
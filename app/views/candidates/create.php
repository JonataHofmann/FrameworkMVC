<?php partial('partials/header'); ?>

    <h1 class=" page-header" >Criar</h1>

    <form action="<?= url('candidates', 'store')?>" method="POST" enctype="multipart/form-data">
        <?php partial('candidates/form'); ?>
    </form>
    
    

<?php partial('partials/footer'); ?>



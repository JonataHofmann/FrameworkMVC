<?php partial('partials/header'); ?>

    <h1 class=" page-header" >Criar</h1>

    <form action="<?= url('candidates', 'update', ['id'=>$candidate->id])?>" method="POST" enctype="multipart/form-data">
        <?php partial('candidates/form', compact('candidate','phones')); ?>
    </form>
    
    

<?php partial('partials/footer'); ?>



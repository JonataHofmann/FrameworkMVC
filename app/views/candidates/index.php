<?php partial('partials/header'); ?>
<div class="clearfix page-header"> 
    <h1 class="pull-left clearfix " >Candidates</h1>
    
</div>
<div class="row">
    <div class="pull-right">
        <a href="<?= url('candidates', 'create') ?>" class=" btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
    </div>
</div>


       
<?php partial('candidates/table',compact('candidates')); ?>

<?php partial('partials/footer'); ?>







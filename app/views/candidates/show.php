<?php partial('partials/header'); ?>
<h1 class="page-header"><?= $candidate->nome ?></h1>
<ul class='list-group'>
    <li class='list-group-item'><strong>Nome:</strong> <?= $candidate->nome  ?> </li>
    <li class='list-group-item'><strong>Email:</strong> <?= $candidate->email  ?> </li>
    <li class='list-group-item'><strong>Telefone Residencial:</strong> <?= "(".$phones[0]->DDD.") ".$phones[0]->number  ?> </li>
    <li class='list-group-item'><strong>Telefone Celular:</strong> <?= "(".$phones[1]->DDD.") ".$phones[1]->number  ?>  </li>
   <!-- <li class='list-group-item'><strong>Curriculum:</strong> <?//= $candidate['curriculum']  ?> </li>-->
</ul>
<a href="<?= url('candidates','index') ?>" class='btn btn-default'>Voltar</a>



<?php partial('partials/footer'); ?>




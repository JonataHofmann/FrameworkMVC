<table class="table">
    <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Email</th>
     
        <th>Opções</th>
    </thead>
    <tbody>
        <?php foreach ($candidates as $c): ?>
            <tr>
                <td><?= $c->id ?></td>
                <td>
                    <a href="<?= url('candidates', 'show', ['id'=>$c->id])   ?>"><?= $c->nome ?></a>
                </td>
                <td><?= $c->email ?></td>
                <!--<td><?//= $c['curriculum'] ?></td>-->
                <td>
                    <a href="<?= url('candidates', 'edit', ['id'=>$c->id])?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="<?= url('candidates', 'destroy', ['id'=>$c->id])?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
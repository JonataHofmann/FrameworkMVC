<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="candidate[nome]" value="<?= isset($candidate) ? $candidate->nome : '' ?>" class="form-control">
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" name="candidate[email]" value="<?= isset($candidate) ? $candidate->email : '' ?>" class="form-control">
</div>
<div class="form-group">
    <label for="">Telefone Celular</label>
    <div class="row">
        <div class="col-md-2">
            <input type="number" name="phones[cel][DDD]" value="<?= isset($phones[0]) ? $phones[0]->DDD : '' ?>" class="form-control">
        </div>
        <div class="col-md-4">
            <input type="number" name="phones[cel][number]" value="<?= isset($phones[0]) ? $phones[0]->number : '' ?>" class="form-control">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="">Telefone Residencial</label>
    <div class="row">
        <div class="col-md-2">
            <input type="number" name="phones[res][DDD]" value="<?= isset($phones[1]) ? $phones[1]->DDD : '' ?>" class="form-control">
        </div>
        <div class="col-md-4">
            <input type="number" name="phones[res][number]" value="<?= isset($phones[1]) ? $phones[1]->number : '' ?>" class="form-control">
        </div>
    </div>
</div>
<!--<div class="form-group">
    <label for="">Curriculo</label>
    <input type="file" name="curriculum" value="<?//= isset($candidate) ? $candidate['curriculum'] : '' ?>" class="form-control">
</div>-->
<div class="form-group">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
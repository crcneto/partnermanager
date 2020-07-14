
<div>
    <form action="<?= site_url('entidade/create')?>" method="post">
        <?php if(is_numeric($e['id'])){ ?>
        <input type="hidden" name="id" value="<?=$e['id']?>" />
        <?php } ?>
    <label>Razão Social</label>
    <input type="text" name="razao" class="form-control" value="<?=$e['razao']?>" />
    <label>Fantasia</label>
    <input type="text" name="fantasia" class="form-control" value="<?=$e['fantasia']?>" />
    <label>CNPJ</label>
    <input type="text" name="cnpj" class="form-control" value="<?=$e['cnpj']?>" />
    <label>Descrição</label>
    <textarea name="descricao" class="form-control" style="resize: none;" rows="2"><?=$e['descricao']?></textarea>
    <label>Observação</label>
    <textarea name="obs" class="form-control" style="resize: none;" rows="2"><?=$e['obs']?></textarea>
    <br>
    <button type="submit" class="btn btn-success"> Cadastrar </button>
</form>
</div>
<!--
    id
    razao,
    fantasia,
    cnpj,
    descricao,
    obs 
-->
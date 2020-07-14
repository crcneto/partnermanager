
<div>
    <form action="<?= site_url('entidade/create')?>" method="post">
    <label>Razão Social</label>
    <input type="text" name="razao" class="form-control" />
    <label>Fantasia</label>
    <input type="text" name="fantasia" class="form-control" />
    <label>CNPJ</label>
    <input type="text" name="cnpj" class="form-control" />
    <label>Descrição</label>
    <textarea name="descricao" class="form-control" style="resize: none;" rows="3"></textarea>
    <label>Observação</label>
    <textarea name="obs" class="form-control" style="resize: none;" rows="3"></textarea>
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
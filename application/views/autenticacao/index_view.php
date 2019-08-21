<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center;">
            <form action="<?= site_url('autenticacao/login') ?>" method="post">
                <label>Login</label>
                <input type="text" name="login" class="form-control" />
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" />
                <br>
                <button type="submit" class="btn btn-success btn-lg">Autenticar</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

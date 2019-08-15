<footer class="footer text-center">
    <br>
    <br>
    <br>
    <span style="font-size: 0.6em;">Copyright&copy; 7º BBM <?= date('Y') ?></span>
</footer>
<script>
    $(document).ready(function () {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    });
</script>
</body>
</html>
<?php $this->session->unset_userdata('erro_mensagem'); ?>
<?php $this->session->unset_userdata('sucesso_mensagem'); ?>
<?php //unset($_SESSION['erro_mensagem']); ?>
<?php //unset($_SESSION['sucesso_mensagem']); ?>
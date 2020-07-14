<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary load-modal" data-toggle="modal" data-target=".bs-example-modal-lg">Adicionar</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CNPJ</th>
                        <th>Razão Social</th>
                        <th>Fantasia</th>
                        <th>Descrição</th>
                        <th>Observação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($entidades) && count($entidades) > 0) { ?>
                        <?php foreach ($entidades as $v) { ?>
                            <tr>
                                <td class="text-center"><?= $v['id'] ?></td>
                                <td><?= $v['cnpj'] ?></td>
                                <td><?= ucwords($v['razao']) ?></td>
                                <td><?= ucwords($v['fantasia']) ?></td>
                                <td><?= $v['descricao'] ?></td>
                                <td><?= $v['obs'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-primary load-modal" title="Editar" data-toggle="modal" data-target=".bs-example-modal-lg" eid="<?=$v['id']?>"><i class="glyphicon glyphicon-edit"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <tr>
                        <?php if (isset($entidades)) { ?>
                            <td colspan="8" class="text-center" style="font-size: 0.7em;">A pesquisa retornou <?= count($entidades) ?> resultado(s).</td>
                        <?php } else { ?>
                            <td colspan="8" class="text-center" style="font-size: 0.7em;">A pesquisa retornou nenhum resultado</td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Modal-->
<!--button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button-->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <div class="modal-title" id="titulo_modal"></div>
            </div>
            <div class="modal-body col-md-12" id="conteudo_modal">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('.modal').modal('hide');">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!--Fim Modal-->
<script>
    $(".load-modal").click(function () {
        var titulo = "Cadastro de Entidade";
        var eid = $(this).attr('eid'); //Entidade ID
        
        $.ajax({
            type: "POST",
            url: "<?= site_url("entidade/cadastro") ?>",
            //data: {'id': eid, 'entrada': entrada},
            data: {'id': eid},
            success: function (data) {
                $('#titulo_modal').html(titulo);
                $("#conteudo_modal").html(data);
            },
            error: function () {
                alert("Erro na solicitação");
            }
        });

    });
</script>

<!DOCTYPE html>
<html lang="br">
    <head>
        <title>.: Partner Manager :.</title>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>" />
        <!--Bootstrap Datepicker-->
        <link rel="stylesheet" href="<?= base_url('public/css/bootstrap-datepicker.css') ?>" />
        <style>
            body { padding-bottom: 70px; }
        </style>
        <!--Ícone da aba-->
        <link rel="shortcut icon" href="<?= base_url('public/img/partner.ico') ?>" />
        <!--Seletor com busca-->
        <link rel="stylesheet" href="<?= site_url('public/css/bootstrap-select.min.css') ?>">
        <meta charset="utf-8">
        <!--JQuery-->
        <script src="<?= base_url('public/js/jquery-3.1.1.min.js') ?>"></script>
        <!--Bootstrap-->
        <script src="<?= base_url('public/js/bootstrap.js') ?>"></script>
        <!--Mask Money-->
        <script src="<?= base_url('public/js/jquery.maskMoney.min') ?>"></script>
        <!--Seletor com busca-->
        <script src="<?= site_url('public/js/bootstrap-select.min.js') ?>"></script>
        <!--DatePicker-->
        <script src="<?= base_url('public/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= base_url('public/js/bootstrap-datepicker.min.js') ?>"></script>
        <script src="<?= base_url('public/js/locales/bootstrap-datepicker.pt-BR.js') ?>"></script>

        <!--Configurações Gerais-->
        <script>
            $(document).ready(function () {

                //Datepicker geral
                $('.datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    todayBtn: "linked",
                    language: "pt-BR",
                    todayHighlight: true,
                    autoclose: true
                });

                //MaskMoney
                $(".money").maskMoney({'thousands': ''});

                //Seletor com busca
                $('.selectpicker').selectpicker();
            });
        </script>

        <!--Demais scripts-->
        <script src="<?= base_url('public/js/scripts.js') ?>"></script>

        <!--Customização-->
        <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>" />
    </head>
    <body role="document">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url('home') ?>"><span style=""><img src="<?= site_url("public/img/partner.ico") ?>" height="20" width="20" style="margin-bottom: 6px;"/></span>&nbsp;Partner Manager</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= site_url('home') ?>"><i class="glyphicon glyphicon-home"></i>&nbsp;Inicial <span class="sr-only"></span></a></li>
                        <!--li><a href="#">Link</a></li-->
                        <?php if ($this->session->userdata('autenticado') != NULL) { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i>&nbsp;Configurações <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header text-center">Cadastros</li>
                                    <li role="separator" class="divider"></li>
                                    <?php if ($this->session->userdata('adm_sistema') > 0) { ?>
                                        <li><a href="<?= site_url('municipio') ?>"><i class="glyphicon glyphicon-map-marker"></i> &nbsp;Município</a></li>
                                    <?php } ?>

                                    <li><a href="<?= site_url('obm') ?>"><i class="glyphicon glyphicon-home"></i>&nbsp;OBM</a></li>
                                    <li><a href="<?= site_url('obm/estrutura') ?>"><i class="glyphicon glyphicon-home"></i>&nbsp;Estrutura CBMSC</a></li>

                                    <?php if ($this->session->userdata('adm_sistema') > 0) { ?>
                                        <li><a href="<?= site_url('usuario') ?>"><i class="glyphicon glyphicon-user"></i>&nbsp;Usuário</a></li>
                                    <?php } ?>
                                    <?php if ($this->access->autorizado('controledeacesso')) { ?>
                                        <li><a href="<?= site_url('acesso') ?>"><i class="glyphicon glyphicon-certificate"></i>&nbsp;Controle de Acesso</a></li>
                                    <?php } ?>
                                    <?php if ($this->session->userdata('adm_sistema') > 0) { ?>
                                        <li><a href="<?= site_url('setor') ?>"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;Setor</a></li>
                                    <?php } ?>
                                    <?php if ($this->session->userdata('adm_sistema') > 0) { ?>
                                        <li><a href="<?= site_url('subsetor') ?>"><i class="glyphicon glyphicon-folder-close"></i>&nbsp;Subsetor</a></li>
                                    <?php } ?>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header text-center">Configurações</li>
                                    <li role="separator" class="divider"></li>
                                    <?php if ($this->session->userdata('adm_sistema') > 0) { ?>
                                        <li><a href="<?= site_url('postograd') ?>"><i class="glyphicon glyphicon-pawn"></i>&nbsp;Posto/Graduação</a></li>
                                    <?php } ?>
                                    <?php if ($this->session->userdata('adm_sistema') > 0) { ?>
                                        <li><a href="<?= site_url('modulo') ?>"><i class="glyphicon glyphicon-th-large"></i>&nbsp;Módulo</a></li>
                                    <?php } ?>

                                </ul>
                            </li>

                            <?php if ($this->access->autorizado('plano') || $this->access->autorizado('planejamento')) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-usd"></i>&nbsp;Contábil <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class=""><a href="<?= site_url('acesso/solicitar') ?>"><i class="glyphicon glyphicon-check"></i>&nbsp;Solicitar acesso</a></li>
                                        <li role="separator" class="divider"></li>
                                        <!--li class="dropdown-header">Planejamento</li-->
                                        <li role="separator" class="divider"></li>                                        
                                        <?php if ($this->access->autorizado('planejamento')) { ?>
                                                    <!--li><a href="<?= site_url('plano') ?>"><i class="glyphicon glyphicon-calendar"></i>&nbsp;Planejamentos em andamento</a></li>
                                                
                                                    <li><a href="<?= site_url('planejamento/regiao') ?>"><i class="glyphicon glyphicon-screenshot"></i>&nbsp;Planejamentos por região</a></li>
                                                
                                                    <li><a href="<?= site_url('plano/aprovados') ?>"><i class="glyphicon glyphicon-ok"></i>&nbsp;Planejamentos Aprovados</a></li-->
                                            <li><a href="<?= site_url('plano/menu') ?>"><i class="glyphicon glyphicon-hourglass"></i>&nbsp;Planejamento</a></li>
                                            <li><a href="<?= site_url('execucao/menu') ?>"> <i class="glyphicon glyphicon-stats"></i>&nbsp;Execução</a></li>
                                        <?php } ?>
                                        <!--li><a href="#">Relatório por OBM</a></li-->
                                        <li role="separator" class="divider"></li>

                                        <!--li class="dropdown-header">Fatos Contábeis</li>
                                        <li role="separator" class="divider"></li>
                                        <?php if ($this->access->autorizado('planejamento')) { ?>
                                                <li class="disabled"><a href="<?= site_url('') ?>"><i class="glyphicon glyphicon-calendar"></i>&nbsp;Fatos Contábeis</a></li>
                                        <?php } ?>
                                        <li role="separator" class="divider"></li-->

                                        <li role="separator" class="divider"></li>
                                        <!--li class="dropdown-header">Movimentação</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Fatos Contábeis</a></li>
                                        <li><a href="#">Relatório por OBM</a></li>
                                        <li role="separator" class="divider"></li-->
                                        <?php if ($this->session->userdata('bm4')) { ?>
                                            <li class="dropdown-header">BM-4</li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?= base_url('origemreceita') ?>">Fonte Pagadora</a></li>
                                            <li><a href="<?= base_url('categoriaeconomica') ?>">Categoria Econômica</a></li>
                                            <li><a href="<?= base_url('naturezadespesa') ?>" title="">Natureza da Despesa&nbsp;<span title="É um agregador de elementos de despesa com as mesmas características quanto ao objeto de gasto" data-toggle="tooltip" data-placement="right" ><i class="glyphicon glyphicon-question-sign"></i></span></a></li>
                                            <li><a href="<?= base_url('aplicacao') ?>">Modalidade de Aplicação</a></li>
                                            <li><a href="<?= base_url('objeto') ?>">Elemento de Despesa&nbsp;<span title="Objeto de Gasto" data-toggle="tooltip" data-placement="right" ><i class="glyphicon glyphicon-question-sign"></i></span></a></li>
                                            <li><a href="<?= base_url('elem_detalhamento') ?>">Detalhamento de Elemento&nbsp;<span title="Detalhamento de Elemento de Despesa" data-toggle="tooltip" data-placement="right" ><i class="glyphicon glyphicon-question-sign"></i></span></a></li>
                                            <li><a href="<?= base_url('especificacao') ?>">Especificação de Objeto&nbsp;<span title="Subitem da natureza da despesa" data-toggle="tooltip" data-placement="right" ><i class="glyphicon glyphicon-question-sign"></i></span></a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?= site_url('origemreceita/receitarestrita') ?>"><i class="glyphicon glyphicon-ban-circle"></i>&nbsp;Gerenciar Receitas Restritas</a></li>
                                            <li><a href="<?= site_url('receitarestrita') ?>"><i class="glyphicon glyphicon-transfer"></i>&nbsp;Distribuição de receitas restritas</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?= site_url('plano/obm_plano') ?>"><i class="glyphicon glyphicon-check"></i>&nbsp;Definir OBM c/ Plano Aplic./Mapa RD</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                            <?php if ($this->session->userdata('adm_sistema')) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Testes <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url('home/teste1') ?>">Teste 1(Listagem Objetos)</a></li>
                                        <li><a href="<?= base_url('home/teste2') ?>">Teste 2 (Sessão)</a></li>
                                        <li><a href="<?= base_url('home/teste3') ?>">Teste 3 (E-mail)</a></li>
                                        <li><a href="<?= base_url('home/teste4') ?>">Teste 4 (Setores)</a></li>
                                        <li><a href="<?= base_url('home/teste5') ?>">Teste 5 ()</a></li>
                                        <li><a href="<?= base_url('home/teste6') ?>">Teste 6 (LDAP)</a></li>
                                        <li><a href="<?= base_url('obm/estrutura') ?>">Teste OBM (Estrutura OBM)</a></li>
                                        <li><a href="<?= base_url('home/teste7') ?>">Teste 7 (Compara datas)</a></li>
                                        <li><a href="<?= base_url('obm/estrutura') ?>">Teste Estrutura</a></li>
                                        <li><a href="<?= base_url('home/teste8') ?>">Teste 8 (Acessos)</a></li>
                                        <li><a href="<?= base_url('home/teste9') ?>">Teste 9 (Sessão)</a></li>
                                        <li><a href="<?= base_url('home/teste_grafico') ?>">Teste Gráficos</a></li>
                                        <li><a href="<?= base_url('home/teste_email') ?>">Teste E-mail</a></li>
                                        <li><a href="<?= base_url('execucao/menu') ?>">Menu Execução</a></li>
                                        <li><a href="<?= base_url('execucao/') ?>">Execução</a></li>
                                        <li><a href="<?= base_url('produto') ?>">Produto</a></li>
                                        <li><a href="<?= base_url('planning_wizard') ?>">Assitente Planejamento</a></li>
                                        <li><a href="<?= base_url('execucao/relatorio') ?>">Relatório de Execução</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>

                    <!--Se usuário não estiver autenticado, exibe formulário de login-->
                    <?php if ($this->session->userdata('usuario') == null || $this->session->userdata('usuario') == '') { ?>

                        <div class="navbar-form navbar-right">
                            <a href="<?= site_url('autenticacao') ?>" class="btn btn-success">Entrar</a>
                        </div>

                    <?php } ?>

                    <!-- Se usuário autenticado, exibe opções de usuário -->
                    <?php if ($this->session->userdata('usuario') != null) { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>&nbsp;<?php
                                    $usuario = $this->session->userdata('usuario');
                                    echo $usuario['nome'];
                                    ?>&nbsp;<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= site_url('usuario/perfil') ?>"><i class="glyphicon glyphicon-user" style="color: blue;"></i>&nbsp; Perfil</a></li>
                                    
                                    <li><a href="<?= site_url('usuario/changepass') ?>"><i class="glyphicon glyphicon-edit text-warning"></i>&nbsp;Alterar senha</a></li>
                                    <!--li class="disabled"><a href="#"><i class="glyphicon glyphicon-envelope text-info"></i>&nbsp;Mensageiro</a></li-->
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= site_url('autenticacao/logout') ?>" style="color:red;"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Sair</a></li>
                                    <li role="separator" class="divider"></li>
                                    
                                    <li><a href="<?= site_url('sobre') ?>"><i class="glyphicon glyphicon-info-sign text-primary"></i>&nbsp;Sobre</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <br>
            <br>
            <br>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata("erro_mensagem")) { ?>
                        <div class="alert alert-danger text-center">
                            <span><?= $this->session->flashdata("erro_mensagem") ?></span>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata("sucesso_mensagem")) { ?>
                        <div class="alert alert-success text-center">
                            <span><?= $this->session->flashdata("sucesso_mensagem") ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once ("bd/bd_servico.php");

$codigo = $_GET['cod'];
$dados = buscaServicoeditar($codigo);
$nome = $dados["nome"];
$valor = $dados["valor"];
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('navbar.php');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ATUALIZAR DADOS DO SERVIÇO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="user" action="editar_servico_envia.php" method="post">
                    <input type="hidden" name="cod" value="<?=$codigo?>">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Nome do Serviço </label>
                            <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?= $nome ?>">
                        </div>
                        <div class="col-sm-6">
                            <label> Valor </label>
                            <input type="text" class="form-control form-control-user" id="valor" name="valor" value="<?= $valor ?>">
                        </div>
                    </div>                    

                    <div class="card-footer text-muted" id="btn-form">
                        <div class=text-right>
                            <a title="Voltar" href="servico.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;</i>Voltar</button></a>
                            <a title="Adicionar"><button type="submit" name="updatebtn" class="btn btn-primary uptadebtn"><i class="fas fa-edit">&nbsp;</i>Atualizar</button> </a>
                        </div>
                    </div>
                </form>  
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once('footer.php');
?>



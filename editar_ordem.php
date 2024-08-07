<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once("bd/bd_ordem.php");
require_once("bd/bd_terceirizado.php");
require_once("bd/bd_servico.php");
require_once("bd/bd_cliente.php");

$codigo = $_GET['cod'];
$dados = buscaOrdemeditar($codigo);

if (!$dados) {
    die("Erro: Ordem de serviço não encontrada.");
}

$cod = $dados['cod'];
$nome_cliente = $dados['nome_cliente'];
$nome_terceirizado = $dados['nome_terceirizado'];
$nome_servico = $dados['nome_servico'];
$data_servico = $dados['data_servico'];
$status = $dados['status'];
$cod_terceirizado = $dados['cod_terceirizado'];
$cod_servico = $dados['cod_servico'];
$cod_cliente = $dados['cod_cliente'];

$terceirizados = listaTerceirizados();
$servicos = listaServicos();
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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ATUALIZAR DADOS DA ORDEM DE SERVIÇO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="user" action="editar_ordem_envia.php" method="post">
                <input type="hidden" name="cod" value="<?= htmlspecialchars($cod, ENT_QUOTES, 'UTF-8') ?>">
                <input type="hidden" name="cod_cliente" value="<?= htmlspecialchars($cod_cliente, ENT_QUOTES, 'UTF-8') ?>">
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nome do Cliente</label>
                            <input type="text" class="form-control form-control-user" id="nome_cliente" name="nome_cliente" value="<?= htmlspecialchars($nome_cliente, ENT_QUOTES, 'UTF-8') ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label>Serviço</label>
                            <select class="form-control" id="cod_servico" name="cod_servico" required>
                                <option value="<?= htmlspecialchars($cod_servico, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($nome_servico, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php foreach($servicos as $servico): ?>
                                    <option value="<?= htmlspecialchars($servico['cod'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($servico['nome'], ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Terceirizado</label>
                            <select class="form-control" id="cod_terceirizado" name="cod_terceirizado" required>
                                <option value="<?= htmlspecialchars($cod_terceirizado, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($nome_terceirizado, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php foreach($terceirizados as $dados): ?>
                                    <option value="<?= htmlspecialchars($dados['cod'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($dados['nome'], ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Data do Serviço</label>
                            <input type="date" class="form-control form-control-user" id="data_servico" name="data_servico" value="<?= htmlspecialchars($data_servico, ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Situação</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" <?= ($status == 1) ? 'selected' : ''; ?>>Aberto</option>
                                <option value="2" <?= ($status == 2) ? 'selected' : ''; ?>>Executando</option>
                                <option value="3" <?= ($status == 3) ? 'selected' : ''; ?>>Concluída</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-muted" id="btn-form">
                        <div class="text-right">
                            <a title="Voltar" href="ordem.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"><i class="fas fa-edit">&nbsp;</i>Atualizar</button>
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

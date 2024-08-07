<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once ("bd/bd_terceirizado.php");

$codigo = $_GET['cod'];
$dados = buscaTerceirizadoeditar($codigo);
$nome = $dados["nome"];
$email = $dados["email"];
$telefone = $dados["telefone"];
$cep = $dados["cep"];
$endereco = $dados["endereco"];
$numero = $dados["numero"];
$bairro = $dados["bairro"];
$cidade = $dados["cidade"];
$uf = $dados["uf"];
$status = $dados["status"];
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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ATUALIZAR DADOS DO TERCEIRIZADO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="user" action="editar_terceirizado_envia.php" method="post">
                    <input type="hidden" name="cod" value="<?=$codigo?>">
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Nome Completo </label>
                            <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?= $nome ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label> Email </label>
                            <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= $email ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Telefone - Ex.: (11) 91234-1234 </label>
                            <input type="tel" class="form-control form-control-user" id="telefone" name="telefone" value="<?=$telefone ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label> CEP </label>
                            <input type="text" class="form-control form-control-user" id="cep" name="cep" value="<?= $cep ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Endereço </label>
                            <input type="text" class="form-control form-control-user" id="endereco" name="endereco" value="<?= $endereco ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label> Número </label>
                            <input type="text" class="form-control form-control-user" id="numero" name="numero" value="<?= $numero ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Bairro </label>
                            <input type="text" class="form-control form-control-user" id="bairro" name="bairro" value="<?= $bairro ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label> Cidade </label>
                            <input type="text" class="form-control form-control-user" id="cidade" name="cidade" value="<?= $cidade ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> UF </label>
                            <input type="text" class="form-control form-control-user" id="uf" name="uf" value="<?= $uf ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label> Situação </label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" <?php echo ($status == 1) ? 'selected': ''; ?>>Ativo</option>
                                <option value="2" <?php echo ($status == 2) ? 'selected': ''; ?>>Inativo</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="card-footer text-muted" id="btn-form">
                        <div class=text-right>
                            <a title="Voltar" href="terceirizado.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;</i>Voltar</button></a>
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

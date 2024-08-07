
<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once ("bd/bd_ordem.php");
require_once ("bd/bd_cliente.php");
require_once ("bd/bd_terceirizado.php");

$dadosOrdem = buscaOrdemadd();

if (!empty($dadosOrdem)) {
    // Verificar se os dados esperados existem antes de acessar
    $nome_cliente = isset($dadosOrdem['nome_cliente']) ? $dadosOrdem['nome_cliente'] : 'N/A';
    $nome_terceirizado = isset($dadosOrdem['nome_terceirizado']) ? $dadosOrdem['nome_terceirizado'] : 'N/A';
    $nome_servico = isset($dadosOrdem['nome_servico']) ? $dadosOrdem['nome_servico'] : 'N/A';
    $valor_servico = isset($dadosOrdem['valor_servico']) ? $dadosOrdem['valor_servico'] : 'N/A';
    $data_servico = isset($dadosOrdem['data_servico']) ? $dadosOrdem['data_servico'] : 'N/A';
    $status = isset($dadosOrdem['status']) ? $dadosOrdem['status'] : 'N/A';
} else {
    $nome_cliente = 'N/A';
    $nome_terceirizado = 'N/A';
    $nome_servico = 'N/A';
    $valor_servico = 'N/A';
    $data_servico = 'N/A';
    $status = 'N/A';
}
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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ORDEM DE SERVIÇO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <?php
            if (isset($_SESSION['texto_sucesso'])):
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-check"></i>&nbsp;&nbsp;<?= $_SESSION['texto_sucesso'] ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['texto_sucesso']);
            endif;
            ?>

                <form class="user" action="cad_ordem_envia.php" method="post" >
                    
                        <div class="form-group">
                            <label> Nome do Cliente </label>
                            <input type="text" class="form-control form-control-user" id="nome_cliente" name="nome_cliente" value="<?= $nome_cliente ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label> Serviço </label>
                            <input type="text" class="form-control form-control-user" id="nome_servico" name="nome_servico" value="<?= $nome_servico ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label> Valor do Serviço </label>
                            <input type="text" class="form-control form-control-user"
                            id="valor_servico" name="valor_servico" value="<?= $valor_servico?>" readonly>
                        </div> 

                        <div class="form-group">
                            <label> Terceirizado </label>
                            <input type="text" class="form-control form-control-user" id="nome_terceirizado" name="nome_terceirizado" value="<?= $nome_servico ?>" readonly>
                        </div>

                         <div class="form-group">
                            <label> Data do Serviço </label>
                            <input type="text" class="form-control form-control-user" id="data_servico" name="data_servico" value="<?= date('d/m/Y',strtotime($data_servico)) ?>" readonly>
                        </div>                          

                    <div class="card-footer text-muted" id="btn-form">
                        <div class=text-right>
                            <a title="Voltar" href="ordem.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;</i>Voltar</button></a>
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



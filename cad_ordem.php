
<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once ("bd/bd_servico.php");
require_once ("bd/bd_cliente.php");
require_once ("bd/bd_terceirizado.php");

$clientes = listaClientes();
$servicos = listaServicos();
$terceirizados = listaTerceirizados();
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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ADICIONAR ORDEM DE SERVIÇO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
             <?php
             if (isset($_SESSION['texto_erro'])):
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['texto_erro']);
            endif;
            ?>
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
                            <select class="form-control" id="cod_cliente" name="cod_cliente">
                                <?php foreach($clientes as $dados):?>
                                <option value="<?=$dados['cod']?>"><?=$dados['nome']?></option> 
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Servico </label>
                            <select class="form-control" id="cod_servico" name="cod_servico">
                                <?php foreach($servicos as $dados):?>
                                <option value="<?=$dados['cod']?>"><?=$dados['nome']?></option> 
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Terceirizado </label>
                            <select class="form-control" id="cod_terceirizado" name="cod_terceirizado">
                                <?php foreach($terceirizados as $dados):?>
                                <option value="<?=$dados['cod']?>"><?=$dados['nome']?></option> 
                                <?php endforeach ?>
                            </select>
                        </div>

                         <div class="form-group">
                            <label> Data do Serviço </label>
                            <input type="date" class="form-control form-control-user"
                            id="data_servico" name="data_servico" aria-describedby="emailHelp"
                            placeholder="00/00/0000" maxlength="10" onkeypress="mascaraData(this)"required>
                        </div>                          

                    <div class="card-footer text-muted" id="btn-form">
                        <div class=text-right>
                            <a title="Voltar" href="ordem.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;</i>Voltar</button></a>
                            <a title="Adicionar"><button type="submit" name="updatebtn" class="btn btn-primary uptadebtn"><i class="fas fa-fw fa-clipboard-list">&nbsp;</i>Adicionar</button> </a>
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



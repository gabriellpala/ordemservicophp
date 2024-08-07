<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 

unset ($_SESSION['nome']);
unset ($_SESSION['email']);
unset ($_SESSION['senha']);
unset ($_SESSION['cep']);
unset ($_SESSION['endereco']);
unset ($_SESSION['numero']);
unset ($_SESSION['bairro']);
unset ($_SESSION['cidade']);
unset ($_SESSION['uf']);
unset ($_SESSION['telefone']);

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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">GERENCIAR INFORMAÇÕES DOS CLIENTES</h6>
                    </div>
                    <div class="col-md-4 card_button_title">
                        <a title="Adicionar novo cliente" href="cad_cliente.php"><button type="button" class="btn btn-primary btn-sm card_button_title" data-toggle="modal" id=" "> <i class="fas fa-fw fa-user">&nbsp;</i> Adicionar Cliente</button></a>

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


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="display:none";>cod</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Perfil</th>
                                <th class="text-center">Situação</th>
                                <th class="text-center" data-orderable="false">Atualizar</th>
                                <th class="text-center" data-orderable="false">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require_once ("bd/bd_cliente.php");
                            $clientes = listaClientes();
                            foreach($clientes as $dados): 
                                ?>
                                <tr>
                                    <td style="display:none";><?= $dados['cod'] ?></td>
                                    <td><?= $dados['nome'] ?></td>
                                    <td><?= $dados['telefone'] ?></td>
                                    <td>Cliente</td>
                                    <td class="text-center"><?= ($dados['status'] == 1 ? '<span class="badge badge-info">Ativo</span>' : '<span class="badge badge-warning">Inativo</span>') ?></td>
                                    <td class="text-center"> 
                                        <a title="Atualizar" href="editar_cliente.php?cod=<?=$dados['cod']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit">&nbsp;</i>Atualizar</a>
                                    </td>
                                    <td class="text-center">
                                        <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#excluir-<?=$dados['cod'];?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">&nbsp;</i>Excluir</a>
                                    </td> 
                                </tr>


                                <div class="modal fade" id="excluir-<?=$dados['cod'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Excluir cliente</h5>
                                            </div>
                                            <div class="modal-body">Deseja realmente excluir esta informação?</div>
                                            <div class="modal-footer">
                                             <a href="remove_cliente.php?cod=<?=$dados['cod'];?>"><button class="btn btn-primary btn-user" type="button">Confirmar</button></a>
                                             <a href="cliente.php"><button class="btn btn-danger btn-user" type="button">Cancelar</button></a>

                                         </div>
                                     </div>
                                 </div>
                             </div>


                            <?php endforeach ?>   
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <?php
    require_once('footer.php');
    ?>


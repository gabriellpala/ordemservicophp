<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
unset($_SESSION['name']);
unset($_SESSION['src']);
unset($_SESSION['alt']);
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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">GERENCIAR IMAGENS DO CARROSSEL</h6>
                    </div>
                    <div class="col-md-4 card_button_title">
                        <a title="Adicionar nova imagem" href="cad_carousel.php"><button type="button" class="btn btn-primary btn-sm card_button_title" data-toggle="modal" id=" "> <i class="fas fa-fw fa-plus">&nbsp;</i> Adicionar Imagem</button></a>
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
                                <th style="display:none";>ID</th>
                                <th>Nome</th>
                                <th>Imagem</th>
                                <th>Descrição (alt)</th>
                                <th class="text-center" data-orderable="false">Atualizar</th>
                                <th class="text-center" data-orderable="false">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require_once ("bd/bd_carousel.php");
                            $carousels = listaCarousel();
                            foreach($carousels as $dados): 
                                ?>
                                <tr>
                                    <td style="display:none";><?= $dados['id'] ?></td>
                                    <td><?= $dados['name'] ?></td>
                                    <td><img src="<?= $dados['src'] ?>" alt="<?= $dados['alt'] ?>" class="img-thumbnail" style="width: 100px;"></td>
                                    <td><?= $dados['alt'] ?></td>
                                    <td class="text-center"> 
                                        <a title="Atualizar" href="editar_carousel.php?id=<?=$dados['id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit">&nbsp;</i>Atualizar</a>
                                    </td>
                                    <td class="text-center">
                                        <a title="Excluir" href="javascript:void(0)" data-toggle="modal" data-target="#excluir-<?=$dados['id'];?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">&nbsp;</i>Excluir</a>
                                    </td> 
                                </tr>
                                <div class="modal fade" id="excluir-<?=$dados['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Excluir Imagem</h5>
                                            </div>
                                            <div class="modal-body">Deseja realmente excluir esta imagem do carrossel?</div>
                                            <div class="modal-footer">
                                             <a href="remove_carousel.php?id=<?=$dados['id'];?>"><button class="btn btn-primary btn-user" type="button">Confirmar</button></a>
                                             <a href="carousel.php"><button class="btn btn-danger btn-user" type="button">Cancelar</button></a>

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
</div>

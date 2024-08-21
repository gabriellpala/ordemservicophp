<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ADICIONAR IMAGEM DO CARROSSEL</h6>
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

                <form class="user" action="cad_carousel_envia.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Nome da Imagem </label>
                            <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Nome da Imagem" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Descrição (alt) </label>
                            <input type="text" class="form-control form-control-user" id="alt" name="alt" placeholder="Descrição da Imagem" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Escolher Imagem</label>
                        <input type="file" id="src" name="src" accept="image/*" required>
                    </div>

                    <div class="card-footer text-muted" id="btn-form">
                        <div class="text-right">
                            <a title="Voltar" href="carousel.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
                            <button type="submit" name="savebtn" class="btn btn-primary"><i class="fas fa-fw fa-save">&nbsp;</i>Salvar</button>
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

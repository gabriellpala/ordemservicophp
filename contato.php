
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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">CONTATO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="user" action="" method="post" >
                   <div class="form-group">
                        <label> Nome Completo </label>
                        <input type="text" class="form-control form-control-user" id="name" name="name" value="TESTE" readonly>
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="text" class="form-control form-control-user" id="email" name="email" value="teste@gmail.com" readonly>
                    </div>
                    <div class="form-group">
                        <label> Assunto </label>
                        <input type="text" class="form-control form-control-user" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label> Mensagem </label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                                        

                    <div class="card-footer text-muted" id="btn-form">
                        <div class=text-right>
                            <a title="Voltar" href="home.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;</i>Voltar</button></a>
                            <a title="Enviar"><button type="submit" name="updatebtn" class="btn btn-primary uptadebtn"><i class="fa fa-envelope">&nbsp;</i>Enviar</button> </a>
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



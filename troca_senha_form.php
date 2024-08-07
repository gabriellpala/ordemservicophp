<?php
session_start();
require_once('header.php'); 
?>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Troca de Senha</h1>
                                    </div>
                                    
                                    <?php
                                    if (isset($_SESSION['mensagem_erro'])):
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong><?= $_SESSION['mensagem_erro'] ?></strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                   <?php
                                    unset($_SESSION['mensagem_erro']);
                                    endif;
                                    ?>

                                    <form class="user" action="troca_senha.php" method="post">
                                        <div class="form-group">
                                            <label> Email </label>
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" placeholder="Endereço de Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <label> Perfil </label>
                                            <select class="form-control" id="perfil" name="perfil" required>
                                                <option value=""> </option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Cliente</option>
                                                <option value="3">Terceirizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-3">
                                                <label> Nova Senha </label>
                                                <input type="password" class="form-control form-control-user"
                                                id="senha" name="senha" placeholder="Nova Senha" required>
                                            </div>
                                            <div class="col-sm-12 mb-3 mb-sm-3">
                                                <label> Confirmar Senha </label>
                                                <input type="password" class="form-control form-control-user"
                                                id="confirma_senha" name="confirma_senha" placeholder="Confirmar Senha" oninput="validatepassword(this)" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Trocar Senha
                                        </button>  
                                        <br>
                                        <a title="Voltar" href="index.php">
                                            <button type="button" class="btn btn-success btn-user" style="width:100%">
                                                <i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar
                                            </button>
                                        </a>                                  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<script src="js/validate.js"></script>
</body>
</html>
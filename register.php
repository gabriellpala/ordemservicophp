<?php
session_start();
require_once('header.php'); 
?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Criar uma Conta!</h1>
                            </div>

                            <?php
                                if (isset($_SESSION['texto_erro_register'])):
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro_register'] ?></strong> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                               <?php
								unset($_SESSION['texto_erro_register']);
                                endif;
                               ?>

                            <form class="user" action="register_envia.php" method="post">
                                <div class="form-group">
                                    <label> Nome Completo </label>
                                    <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?php if (!empty($_SESSION['nome'])) { echo $_SESSION['nome'];} ?>"  
                                        placeholder="Nome Completo" required>
                                </div>
                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="email" class="form-control form-control-user" id="email" name="email" 
                                        placeholder="Endereço de Email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> Senha </label>
                                        <input type="password" class="form-control form-control-user"
                                            id="senha" name="senha" placeholder="Senha" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Confirmar Senha </label>
                                        <input type="password" class="form-control form-control-user"
                                            id="confirma_senha" name="confirma_senha" placeholder="Confirmar Senha"  oninput="validatepassword(this)" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Criar Conta
                                </button>                               
                            </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="index.php">Possui uma conta? Conecte-se!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
require_once('footer.php');
?>
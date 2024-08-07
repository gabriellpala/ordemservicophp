<?php
session_start();
require_once('header.php'); 
include_once('./api/cep/viacep.php');
?>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cadastro de Cliente</h1>
                            </div>

                            <?php
                            if (isset($_SESSION['texto_erro'])):
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?= $_SESSION['texto_erro'] ?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            unset($_SESSION['texto_erro']);
                            endif;

                            if (isset($_SESSION['texto_sucesso'])):
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?= $_SESSION['texto_sucesso'] ?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            unset($_SESSION['texto_sucesso']);
                            endif;
                            ?>

                            <form class="user" action="cad_cliente_index_envia.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> Nome Completo </label>
                                        <input type="text" class="form-control form-control-user" id="nome" name="nome" 
                                        value="<?php if (!empty($_SESSION['nome'])) { echo $_SESSION['nome'];} ?>" placeholder="Nome Completo" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Email </label>
                                        <input type="email" class="form-control form-control-user" id="email" name="email" 
                                        value="<?php if (!empty($_SESSION['email'])) { echo $_SESSION['email'];} ?>" placeholder="Endereço de Email" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> Senha </label>
                                        <input type="password" class="form-control form-control-user" id="senha" name="senha" 
                                        placeholder="Senha" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Confirmar Senha </label>
                                        <input type="password" class="form-control form-control-user" id="confirma_senha" 
                                        name="confirma_senha" placeholder="Confirmar Senha" oninput="validatepassword(this)" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> CEP </label>
                                        <input type="text" class="form-control form-control-user" id="cep" name="cep" 
                                        value="<?php if (!empty($_SESSION['cep'])) { echo $_SESSION['cep'];} ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Endereço </label>
                                        <input type="text" class="form-control form-control-user" id="endereco" name="endereco" 
                                        value="<?php if (!empty($_SESSION['endereco'])) { echo $_SESSION['endereco'];} ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> Número </label>
                                        <input type="number" class="form-control form-control-user" id="numero" name="numero" 
                                        value="<?php if (!empty($_SESSION['numero'])) { echo $_SESSION['numero'];} ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Bairro </label>
                                        <input type="text" class="form-control form-control-user" id="bairro" name="bairro" 
                                        value="<?php if (!empty($_SESSION['bairro'])) { echo $_SESSION['bairro'];} ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> Cidade </label>
                                        <input type="text" class="form-control form-control-user" id="cidade" name="cidade" 
                                        value="<?php if (!empty($_SESSION['cidade'])) { echo $_SESSION['cidade'];} ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> UF </label>
                                        <input type="text" class="form-control form-control-user" id="uf" name="uf" 
                                        value="<?php if (!empty($_SESSION['uf'])) { echo $_SESSION['uf'];} ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> Telefone - Ex.: (11) 91234-1234 </label>
                                        <input type="tel" class="form-control form-control-user" id="telefone" name="telefone" 
                                        placeholder="(xx)xxxxx-xxxx" value="<?php if (!empty($_SESSION['telefone'])) { echo $_SESSION['telefone'];} ?>" maxlength="15" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Situação </label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value=""> </option>
                                            <option value="1">Ativo</option>
                                            <option value="2">Inativo</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="card-footer text-muted">
                                    <div class="text-right">
                                        <a title="Voltar" href="index.php">
                                            <button type="button" class="btn btn-success">
                                                <i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar
                                            </button>
                                        </a>
                                        <button type="submit" name="updatebtn" class="btn btn-primary">
                                            <i class="fas fa-fw fa-user">&nbsp;</i>Adicionar
                                        </button>
                                    </div>
                                </div>
                            </form>
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
<script src='./api/cep/viacep.js'></script>
</body>
</html>

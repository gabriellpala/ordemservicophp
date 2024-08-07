<?php

    if ($_SESSION['perfil']==1) {
        $texto = "PAINEL ADMINISTRATIVO DO USUÁRIO";
    }elseif($_SESSION['perfil']==2){
        $texto = "PAINEL ADMINISTRATIVO DO CLIENTE";
    }else{
        $texto = "PAINEL ADMINISTRATIVO DO TERCEIRIZADO";
    }

?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" value="<?=$texto?>" readonly
        aria-label="Search" aria-describedby="basic-addon2">
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nome_usu']?> &nbsp; <i class="fa fa-arrow-circle-down"></i></span>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        <?php
            if($_SESSION['perfil']== 1){
        ?>           
            <a class="dropdown-item" href="editar_perfil_usuario.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-900"></i>
            Perfil do Usuário
        <?php
            }
        ?>

        <?php
            if($_SESSION['perfil']== 2){
        ?>           
            <a class="dropdown-item" href="editar_perfil_cliente.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-900"></i>
            Perfil do Cliente
        <?php
            }
        ?>
        <?php
            if($_SESSION['perfil']== 3){
        ?>           
            <a class="dropdown-item" href="editar_perfil_terceirizado.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-900"></i>
            Perfil do Terceirizado
        <?php
            }
        ?>
            
        </a>
        <a class="dropdown-item" href="editar_senha.php">
            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-900"></i>
            Senha
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900"></i>
            Sair
        </a>
    </div>
</li>

</ul>

</nav>
<!-- End of Topbar -->



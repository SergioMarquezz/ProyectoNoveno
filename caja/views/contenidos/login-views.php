<body id="body">
    <div class="container-all">
        <div class="container-form">
            <img src="<?php echo SERVER;?>views/assets/img/utec.jpg" alt="" class="logo">
            <h1 class="title">Iniciar Sesión</h1>
                <form action="<?php echo SERVER?>ajax/loginAjax.php" method="POST" autocomplete="off" class="Ajax">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="md-form">
                                <input type="text" id="usuario" name="usuario-login" class="form-control text-white">
                                <label for="usuario" class="text-white label-login">Usuario</label>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="md-form">
                                <input type="password" name="usuario-pass" id="contrasenia" class="form-control text-white">
                                <label for="contrasenia" class="text-white label-login">Contraseña</label>
                            </div>
                        </div>
                    </div>
                    <button id="btn-login" type="submit" class="btn btn-block">Entrar</button>
                </form>
        </div>


            <div class="container-text">
                <div class="capa"></div>
                
                <h1 class="litle-description text-center"><?php echo COMPANY ?> ---SAE---</h1>
                <p class="text-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Praesentium eaque repellat beatae eligendi, placeat, qui veritatis voluptates 
                    architecto repellendus amet inventore? Nihil aspernatur repellat enim voluptatibus 
                    magnam totam debitis exercitationem.</p>
            </div>

       

    </div>
    
</body>

<?php

    /*$peticion = true;

    require_once "./controllers/loginControlador.php";

    $login = new LoginControlador();

    echo $login->startSesionAdminController();*/

?>
<header>
    <div class="container">
        <nav class="menu">
            <?php session_start();
            if(!isset($_SESSION["UserClient"]) || $_SESSION["UserClient"] == FALSE): 
                echo '<a href="#" id="inicia-sesion">Inicia sesión</a>';
            elseif(isset($_SESSION["UserClient"]) && $_SESSION["UserClient"] == TRUE):
             echo '<a href="' . base_url() . 'perfil">Mi perfíl</a>
                   <a href="' . base_url() . 'logout">Cerrar sesión</a>';
            endif;
            echo '<a href="#">Mis platos (0)</a>'; ?>
        </nav>

        <div class="logo">
            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo.svg" alt=""></a>
        </div>
         
        <nav class="submenu">
            <?php foreach ($findAll->result() as $page):
            if($page->idPageType == 2):
                echo '<a href="' . base_url() . $page->url . '">' . $page->name . '</a>';
            endif;
            endforeach; ?>
        </nav>
    </div>
</header>

<?php if(!isset($_SESSION["UserClient"]) || $_SESSION["UserClient"] == FALSE): 
echo '
<div id="login">
    <div class="form-login">
        <div class="close">
            <a href=""><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>

        <div class="content-form">

        <div class="item inicio-sesion">
            <h2>¿Tienes cuenta?</h2>

            <form action="' . base_url() . 'processUser/usuario">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar sesión en F4U</button>
            </form>

            <a href="">¿Has olvidado tu contraseña?</a>
            
        </div>

        <div class="item registro">
            <h2>Regístrate</h2>
            <label>Este es el primer paso para el gran cambio</label>

            <form action="' . base_url() . 'processUser/agregar_nuevo_usuario">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <button type="submit">Registrarme</button>
            </form>
        </div>

        </div>
    </div>
</div>';
endif;
?>
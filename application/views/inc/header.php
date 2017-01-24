<header>
    <div class="container">
        <nav class="menu">
            <?php 
            if(!$this->session->has_userdata('user_logged_in') || $this->session->userdata('user_logged_in') == FALSE): 
                echo '<a href="#" id="inicia-sesion">Inicia sesión</a>';
            elseif($this->session->has_userdata('user_logged_in') && $this->session->userdata('user_logged_in') == TRUE):
             echo '<a href="' . base_url() . 'perfil">Mi perfíl</a>
                   <a href="' . base_url() . 'logout">Cerrar sesión</a>';
            endif;
            echo '<a href="" id="mis-platos">Mis platos (<span class="count">' . $this->cart->total_items() . '</span>)</a>'; ?>
            <div id="platos">
                <div class="platos-load">
                <a href="<?= base_url() ?>calculador-de-nutricion">Añadir plato personalizado</a>
                <table>
                    <tbody>
                    <?php 
                    foreach ($this->cart->contents() as $items): 
                        echo '
                        <tr>
                            <td><img src="' . base_url() . 'assets/images/' . $items["options"]["image"] . '" /></td>
                            <td>' . $items["qty"] . ' uds.</td>
                            <td>' . $items["name"] . '</td>
                            <td>S/. ' . $this->cart->format_number($items['price'])  . '</td>
                            <td><a href="#">X</a></td>
                        </tr>';
                    endforeach;    
                    ?>
                    </tbody>
                </table>
                <p>Total: <?= $this->cart->format_number($this->cart->total()) ?></p>
                </div>
            </div>
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
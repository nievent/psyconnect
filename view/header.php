<?php 
function printHeader($urlLogo, $urlIndex, $urlLogin, $urlRegistrarse) {
    echo <<<HTML
        <header class="header">
            <nav class="navbar">
                <div class="logo">
                    <a href="$urlIndex">
                    <img src="$urlLogo" alt="logo de PsyConnect" class="logoImg">
                        <span class="logoText">PsyConnect</span>
                    </a>
                </div>
                <ul class="navLinks">
                    <li>
                        <a href="$urlLogin" class="navLink">Inicia Sesión</a>
                    </li>
                    <li>
                        <a href="$urlRegistrarse" class="navLink">Regístrate</a>
                    </li>
                </ul>
            </nav>
        </header>
HTML;
}
?>

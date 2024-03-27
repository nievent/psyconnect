<?php require "./view/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Nieves Ventura">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="true" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Madimi+One&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossOrigin="anonymous" />
        <link rel="stylesheet" href="./view/styles/header/header.css">
        <link rel="stylesheet" href="./view/styles/index/index.css">
        <link rel="stylesheet" href="./view/styles/footer/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <title>PsyConnect</title>
    </head>
    <body>
        <?php printHeader("./view/img/logo-sin-fondo.png", "./index.php", "./view/login.php", "./view/registrarse.php"); ?>
        <main>
            <section class="inicio">
                <div>
                    <h1>Todo el poder de la psicología</h1>
                    <h2>Al alcance de un click</h2>
                    <p>En PsyConnect buscamos la manera más eficiente de atender a un paciente. Con PsyConnect el psicólogo se ahorra esperas innecesarias para observar cómo se siente su paciente, y a su vez el paciente puede invertir toda la hora de terapia que ha pagado, únicamente en su bienestar.</p>
                    <button class="boton"><a href="./view/registrarse.php">Regístrate</a></button>
                </div>
                <img class="movil" src="./view/img/movil.png" alt="telefono movil con el logo" />
            </section>
        </main>

<?php require "./view/footer.php"; ?>
    </body>
</html>
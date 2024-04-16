<?php require './header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="true" />
        <link rel="shortcut icon" type="image/png" href="./img/logo-sin-fondo.png"/>s
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Madimi+One&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossOrigin="anonymous" />
        <link rel="stylesheet" href="./styles/header/header.css">
        <link rel="stylesheet" href="./styles/footer/footer.css">
        <link rel="stylesheet" href="./styles/login/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        
    <title>Inicia sesión</title>
</head>
<body>
<?php printHeader("./img/logo-sin-fondo.png", "../index.php", "./login.php", "./registrarse.php"); ?>
    <main>
        <form action="../controller/loginLogic.php" method="POST">
            <h1>Login</h1>
            <img src="./img/logo-sin-fondo.png" alt="logo psyconnect">
            <label for="user">Correo electrónico:</label>
            <input type="text" name="user" placeholder="Escribe tu correo electrónico">
            <label for="pwd">Contraseña:</label>
            <input type="password" name="password" placeholder="Escribe tu contraseña">
            <button type="submit" name="submit" class="btn-submit"><i class="fa-solid fa-arrow-right"></i></button>
        <?php 
            if(isset($_GET['error']) && $_GET['error'] == 1){
                echo '<div class="alert alert-danger" role="alert">Usuario o contraseña incorrectos</div>';
            }
        ?>
        </form>
    </main>
    <?php require './footer.php'; ?>
</body>
</html>
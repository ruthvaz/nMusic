<?php
session_start();

if (isset($_SESSION['mensagem'])) :
    $msg = $_SESSION['mensagem'];
    echo "<script> alert('$msg') </script>";
endif;

session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title> nMusic </title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body style="background-color: #1f2021;" class="bg2">

    <input type="checkbox" id="bt_menu">
    <label for="bt_menu">&#9776;</label>

    <nav class="menu">
        <ul>
            <li><a href="index.html"> Home </a></li>
            <li><a href="generos.php"> Gêneros </a>
                <ul>
                    <li><a href="#"> Rock </a></li>
                    <li><a href="#"> Pop </a></li>
                    <li><a href="#"> Rap </a></li>
                </ul>
            </li>
            <li><a href="artistas.php"> Artistas </a>
                <ul>
                    <li><a href="#"> Beatles </a></li>
                    <li><a href="#"> Michael Jackson </a></li>
                    <li><a href="#"> Eminen </a></li>
                </ul>
            </li>
            <li><a href="radios.php"> Radios </a></li>
            <li><a href="contato.php"> Contato </a></li>
            <li><a href="login.php"> Login </a></li>
            <li><a href="cadastro.php"> Cadastro </a></li>
            <li><a href="atividades.php"> Atividades </a></li>
        </ul>
    </nav>

    <div id="main-container">

        <h1>Cadastre-se</h1>

        <form id="register-form" action="create.php" method="POST">
            <div class="full-box">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" data-min-length="2" data-email-validate>
            </div>
            <div class="half-box spacing">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="Digite seu nome" data-required data-min-length="3" data-max-length="16">
            </div>
            <div class="half-box">
                <label for="lastname">Sobrenome</label>
                <input type="text" name="lastname" id="lastname" placeholder="Digite seu sobrenome" data-required data-only-letters>
            </div>
            <div class="half-box spacing">
                <label for="lastname">Senha</label>
                <input type="password" name="password" id="password" placeholder="Digite sua senha" data-password-validate data-required>
            </div>
            <div class="half-box">
                <label for="passconfirmation">Confirmação de senha</label>
                <input type="password" name="passconfirmation" id="passwordconfirmation" placeholder="Digite novamente sua senha" data-equal="password">
            </div>
            <div>
                <input type="checkbox" name="agreement" id="agreement">
                <label for="agreement" id="agreement-label">Eu li e aceito os <a href="#">termos de uso</a></label>
            </div>
            <div class="g-recaptcha" data-sitekey="6Lf6CYMdAAAAAJ0-PYtu2qzlWGIj9UJ-qDTn0gNR"></div>
            
            <div class="full-box">
                <br>
                <input id="btn-submit" type="submit" value="Registrar" name="send" onclick="return valida()">
            </div>
        </form>

        <script type="text/javascript">
            function valida() {
                if (grecaptcha.getResponse() == "") {
                    alert("Você precisa macar a validação!");
                    return false;
                }
            }
        </script>

        <?php

        if (isset($_POST['send'])) {

            if (!empty($_POST['g-recaptcha-response'])) {
                $url = "https://www.google.com/recaptcha/api/siteverify";
                $secret = "6Lf6CYMdAAAAAFlELh79zD5W-4VlSRwfZ_-MoTZY";
                $response = $_POST['g-recaptcha-response'];
                $variaveis = "secret=" . $secret . "&response=" . $response;

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $variaveis);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $resposta = curl_exec($ch);
                $resultado = json_decode($resposta);

                if ($resultado->success == 1) {
                    echo "<br> Formulário enviado!";
                }
            }
        }

        ?>

    </div>

    <p class="error-validation template"></p>

    <script src="scripts.js"></script>

</body>

</html>
<?php

require_once 'db_connect.php';

session_start();

if (isset($_POST['send'])) :

    $errors = array();
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if ((empty($email)) || (empty($senha))) :
        $errors[] = "<li> Email e Senha devem ser informados. ";
    else :
        $sql = "SELECT * FROM usuario where email = '$email'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) == 1) :
            $dados = mysqli_fetch_array($result);

            if (password_verify($senha, $dados['senha'])) :
                $data = mysqli_fetch_array($result);
                $_SESSION['user'] = $data;
                $_SESSION['logged'] = true;
                mysqli_close($connect);
                header('Location: generos.php');
            else:
                $errors[] = "<li> User and password don't match. </li>";
            endif;

        else :
            $errors[] = "<li> Usuario não encontrado. </li>";
        endif;

    endif;

endif;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title> nMusic </title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
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

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h3>Entrar em Contato</h3>
        <input id="email" type="email" name="email" placeholder="Informe seu e-mail">
        <input id="senha" type="password" name="senha" placeholder="Informe sua senha">
        <div class="g-recaptcha" data-sitekey=""></div>

        <input type="submit" name="send" value="Enviar">
        <!--<input type="submit" name="send" value="Enviar" onclick="return valida()">-->
    </form>

    <!--
        <script type="text/javascript">
            function valida() {
                if(grecaptcha.getResponse() == "") {
                    alert("Você precisa macar a validação!");
                    return false;
                }
            }
        </script>
        -->

    <script>
        var email = document.getElementById('email');

        email.addEventListener('focus', () => {
            email.style.borderColor = "#ccca62";
        });
        email.addEventListener('blur', () => {
            email.style.borderColor = "#0dca55";
        });

        var senha = document.getElementById('senha');

        senha.addEventListener('focus', () => {
            senha.style.borderColor = "#ccca62";
        });
        senha.addEventListener('blur', () => {
            senha.style.borderColor = "#0dca55";
        });
    </script>

</body>

</html>
<?php
session_start();

require_once 'db_connect.php';  

if(!isset($_SESSION['logged']) || ($_SESSION['user']['tipo'] != 'ADM')):
    header('Location: index.html');
endif;

if(!empty($_GET['id'])):
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario WHERE id = $id";

    $result = $connect->query($sqlSelect);

    if($result->num_rows > 0):
        while($user_data = mysqli_fetch_assoc($result)):
            $nome = $user_data['id'];
            $nome = $user_data['nome'];
            $sobrenome = $user_data['sobrenome'];
            $email = $user_data['email'];
            $tipo = $user_data['tipo'];
        endwhile;
    endif;
else:
    header('Location: index.html'); 
endif;


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
    <br>
    <a href="usuarios.php">Voltar</a>

    <div id="main-container">

        <h1>Atualizar</h1>

        <form id="register-form" action="update.php" method="POST">
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="full-box">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" data-min-length="2" data-email-validate value="<?php echo $email; ?>">
            </div>
            <div class="half-box spacing">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="Digite seu nome" data-required data-min-length="3" data-max-length="16" value="<?php echo $nome; ?>">
            </div>
            <div class="half-box">
                <label for="lastname">Sobrenome</label>
                <input type="text" name="lastname" id="lastname" placeholder="Digite seu sobrenome" data-required data-only-letters value="<?php echo $sobrenome; ?>">
            </div>
            <div class="half-box spacing">
                <label for="usr">Usuário</label>
                <input type="radio" id="usr" name="tipo" value="USR" <?php echo ($tipo == 'USR') ? 'checked' : '' ?> require>
                <label for="usr">ADM</label>
                <input type="radio" id="adm" name="tipo" value="ADM" <?php echo ($tipo == 'ADM') ? 'checked' : '' ?> require>
            </div>
            
            <div class="full-box">
                <br>
                <input id="btn-submit" type="submit" value="Atualizar" name="send">
            </div>
        </form>

        <?php
       
        ?>

    </div>

    <script src="scripts.js"></script>

</body>

</html>
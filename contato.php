<?php

require_once 'db_connect.php';

session_start();

if (!isset($_SESSION['logged'])) :
    header('Location: index.html');
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title> nMusic </title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" type="image/png" href="img/logo.png" />
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
            <li><a href="atividades.php"> Atividades </a></li>
            <li><a href="logout.php"> Sair </a></li>
        </ul>
    </nav>

    <table class="table-contatos">
        <tr>
            <td> <a href="#"><img src="img/instagram.png"> </a> </td>
            <td> <a href="#"><img src="img/facebook.png"> </a> </td>
            <td> <a href="#"><img src="img/twitter.png"> </a> </td>
            <td> <a href="#"><img src="img/email.png"> </a> </td>
        </tr>
    </table>

</body>

</html>
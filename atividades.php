<?php

require_once 'db_connect.php';

session_start();

if(!isset($_SESSION['logged'])):
    header('Location: index.html');
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title> nMusic </title>
    <link rel="stylesheet" href="estilo.css" />
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

    <table class="table-atv">

        <thead>
            <tr>
                <th> Atividade </th>
                <th> Encontro </th>
                <th> Tarefa </th>
            </tr>
        </thead>
        <tr>
            <td> <a href="atividades/encontro1/index.html"><img src="img/enter.png" alt="entrar"></a> </td>
            <td> 1 </td>
            <td> Introdução - JavaScript </td>
        </tr>
        <tr>
            <td> <a href="atividades/encontro2/dom/video1.html"><img src="img/enter.png" alt="entrar"></a> </td>
            <td> 2 </td>
            <td> dom - video 1</td>
        </tr>
        <tr>
            <td> <a href="atividades/encontro2/dom/video2.html"><img src="img/enter.png" alt="entrar"></a> </td>
            <td> 2 </td>
            <td> dom - video 2</td>
        </tr>
        <tr>
            <td> <a href="atividades/encontro2/dom/video22.html"><img src="img/enter.png" alt="entrar"></a> </td>
            <td> 2 </td>
            <td> dom - video 2 pt. 2</td>
        </tr>
    </table>

</body>

</html>
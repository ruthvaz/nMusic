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
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" type="image/png" href="img/logo.png"/>
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
            <li><a href="atividades.php"> Atividades </a></li>
            <?php
                
                if($_SESSION['user']['tipo'] == "ADM"):
                    echo "<li><a href=\"usuarios.php\"> Usuários </a></li>";
                endif;
                
            ?>

            <li><a href="logout.php"> Sair </a></li>
        </ul>
    </nav>

    <table class="table-genero">
        <tr>
            <td> <img src="img/guitar.png"/> </td>
            <td> <a href="#"> Rock </a> </td>
        </tr>
        <tr>
            <td> <img src="img/microphone.png"/> </td>
            <td> <a href="#"> Pop </a> </td>
        </tr>
        <tr>
            <td> <img src="img/singing.png"/> </td>
            <td> <a href="#"> Rap </a> </td>
        </tr>
    </table>

    <div id="bandas">
        <select id="banda">
            <option value="rock"> Rock </option>
            <option value="pop"> Pop </option>
            <option value="rap"> Rap </option>
        </select>
        <input type="number" placeholder="Sua idade" name="idade" id="idade" />
        <button onclick="mostra()"> Mostrar bandas </button>
        <div id="video"></div>
    </div>

    <script src="bandas.js"></script>

</body>
</html>
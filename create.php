<?php

session_start();

require_once "db_connect.php";

//clean
function clear($input) {
    global $connect;
    $var = mysqli_escape_string($connect, $input);
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['send'])) :
    
    $nome = clear($_POST['name']);
    $sobrenome = clear($_POST['lastname']);
    $email = clear($_POST['email']);
    $senha = clear($_POST['password']);

    if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha)):

        $senha_segura = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `usuario`(`id`, `nome`, `email`, `sobrenome`, `senha`) VALUES (null, '$nome', '$email', '$sobrenome', '$senha_segura')";

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: generos.php');
            $_SESSION['logged'] = true;
        else :
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('Location: cadastro.php');
        endif;

    else:    
        $_SESSION['mensagem'] = "Preencha os campos!";
        header('Location: cadastro.php');
    endif;
endif;
?>
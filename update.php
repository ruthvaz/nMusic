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

if (isset($_POST['send'])):
    
    $id = $_POST['id'];
    $nome = clear($_POST['name']);
    $sobrenome = clear($_POST['lastname']);
    $email = clear($_POST['email']);
    $tipo = clear($_POST['tipo']);

    if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($tipo)):

        // $sql = "UPDATE `usuario` SET nome = '$nome', email = '$email', sobrenome = '$sobrenome', tipo = '$tipo' WHERE id = '$id'";
        $sql = "UPDATE `usuario` SET `nome`='$nome',`email`='$email',`sobrenome`='$sobrenome',`tipo`='$tipo' WHERE id = '$id'";

        $result = $connect->query($sql);  
    endif;
endif;

header('Location: usuarios.php');  

?>

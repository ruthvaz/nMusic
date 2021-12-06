<?php

$captcha = isset($_POST['g-recaptcha-response'])
                ? $_POST['g-recaptcha-response']
                : null;

if(!is_null($captcha)) {
    $res = file_get_contents("https://google.com/recaptcha/api/siteverify?secret=CHAVE-SECRETA&" . 
    "response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']); // Retorna um json (informando certo ou errado) //
    
    $res = json_decode($res); // Transforma em um objeto do PHP //
    
    if($res->success === true) {
        echo "Captcha validado!";
        // Dá continuidade ao formulário 
    }
    else{
        echo "Captcha não foi validado!";
    }

}
else{
    echo "Captcha Nullo!";
}
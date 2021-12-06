<?php

if(isset($_POST['acao'])) {

    if(!empty($_POST['g-recaptcha-response'])) {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $secret = "";
        $response = $_POST['g-recaptcha-response'];
        $variaveis = "secret=".$secret."&response=".$response;

        $ch = curl_init($url);
        curl_setopt( $c, CURLOPT_POST, 1);
        curl_setopt( $c, CURLOPT_POSTFIELDS, $variaveis);
        curl_setopt( $c, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $c, CURLOPT_HEADER, 0);
        curl_setopt( $c, CURLOPT_RETURNTRANSFER, 1);
        $resposta = curl_exec($ch);
        $resultado = json_decode($resposta);

        if($resultado->success == 1) {
            echo "<br> Formulário enviado!";
        }
            
    }


}

<?php
    require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder

    // test_access_token = "TEST-3570270571866309-042401-397feedc8a90254349eb4e1b28e48c05-99290503";

    MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398"); // Either Production or SandBox AccessToken

    $payment = new MercadoPago\Payment();
    
    $payment->transaction_amount = 141;
    $payment->token = "YOUR_CARD_TOKEN";
    $payment->description = "​ Dispositivo móvil de Tienda e-commerce";
    $payment->installments = 1;
    $payment->payment_method_id = "visa";
    $payment->payer = array(
      "email" => "test_user_63274575@testuser.com"
    );

    $payment->save();

    echo $payment->status;
  ?>
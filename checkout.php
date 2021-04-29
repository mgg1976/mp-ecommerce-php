<?php
    require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder

    MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398"); // Either Production or SandBox AccessToken
    MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->id = '1234';
    $item->title = $_POST['title'];
    $item->description = "Dispositivo móvil de Tienda e-commerce";
    $item->quantity = 1;
    $item->unit_price = floatval($_POST['price']);
    $item->picture_url = $_POST['img'];
    $preference->items = array($item);

    // Datos del pagador
    $payer = new MercadoPago\Payer();
    $payer->name = "Lalo";
    $payer->surname = "Landa";
    $payer->email = "test_user_63274575@testuser.com";
    $phone = array(
      "area_code" => "11",
      "number" => "22223333"
    );
    $payer->phone = $phone;
    $address = array(
      "street_name" => "False",
      "street_number" => "123",
      "zip_code" => "1111"
    );
    $payer->address = $address;
    $preference->payer = $payer;


    // Condiciones de pago admitidas
    $preference->payment_methods = array(
      "excluded_payment_methods" => array(
        array("id" => "amex")
      ),
      "excluded_payment_types" => array(
        array("id" => "atm")
      ),
      "installments" => 6
    );

    // Otras preferencias
    $preference->back_urls = array(
      "success" => "$_SERVER[HTTP_HOST]/success.php",
      "failure" => "$_SERVER[HTTP_HOST]/failure.php",
      "pending" => "$_SERVER[HTTP_HOST]/pending.php"
    );
    $preference->auto_return = "approved";
    $preference->external_reference = 'gastongrimberg@gmail.com';
    $preference->notification_url = "https://webhook.site/e5c97c8b-5d02-41d7-84e9-66f84b5e6f9b";
    $preference->save();
  ?>

<!Doctype html>
<html>
  <head>
    <title>Pagar</title>
  </head>
  <body>
    <a href="<?php echo $preference->init_point; ?>">Pagar la compra</a>
  </body>
</html>

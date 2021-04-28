<!DOCTYPE html>
<html>
    <body>
        <h1><?php echo "Pago exitoso."; ?></h1>
        <ul>
            <li><?php echo $_GET["payment_type"]?></li>
            <li><?php echo $_GET["external_reference"]?></li>
            <li><?php echo $_GET["collection_id"]?></li>
        </ul>
    </body>
</html>


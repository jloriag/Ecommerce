<?php

namespace App\Services\Email;

require_once __DIR__ . '/../../../models/Product.php';

class SaleEmailService extends EmailService {

    private $product_id;
    private $sale_id;
    private $email;

    #[\Override]
    public function __construct($product_id, $sale_id, $_email, $_full_name,$_tel,$client_name,$_place) {
        parent::__construct();
        $this->product_id = $product_id;
        $productModel=new \Product();
        $product=$productModel->getProductById($this->product_id);
        $this->sale_id = $sale_id;
        $this->email = $_email;
        $this->addAddress($_email, $_full_name); // Añadir destinatario
        $this->Subject = 'Han comprado el producto: '.$product['name'];
        $this->Body = $this->buildSellHtml($product['name'], $product['price'], $product['description'],$_tel,$client_name,$_place);
    }

    #[\Override]
    public function sendEmail() {
        try {
            $isSuccessfull = $this->send();
        } catch (Exception $e) {
            $isSuccessfull = false;
            throw new Exception($e);
        }
        return $isSuccessfull;
    }

    public function buildSellHtml($product_title, $product_price, $product_description,$_tel, $_client_name,$_place) {
        // Iniciar el buffer de salida
        ob_start();
        ?>
        <p>Han solicitado el producto <strong><?= htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') ?></strong> con un valor de <?= htmlspecialchars($product_price, ENT_QUOTES, 'UTF-8') ?></p>
        <p>La descripci&oacute;n del producto es: <strong><?= htmlspecialchars($product_description, ENT_QUOTES, 'UTF-8') ?></strong></p>
        <p>El tel&eacute;fono es: <?= $_tel ?></p>
        <p>El cliente se llama: <?= $_client_name ?></p>
        <p>La ubicaci&oacute;n es: <?= $_place ?></p>
        <?php
        // Capturar el contenido del buffer y almacenarlo en una variable
        $html = ob_get_clean();
        return $html; // Retornar el HTML como string
    }
}

<?php

namespace App\Services\Email;

class SaleEmailService extends EmailService {

    private $product_id;
    private $sale_id;
    private $email;

    public function __construct($product_id, $sale_id, $_email, $_full_name) {
        parent::__construct();
        $this->product_id = $product_id;
        $this->sale_id = $sale_id;
        $this->email = $_email;
        $this->addAddress($_email, $_full_name); // Añadir destinatario
        $this->Subject = 'Compra de articulo';
        $this->Body = $this->buildSellHtml("Titulo del producto", "Precio", "Descripcion");
    }

    public function sendEmail() {
        $this->send();
        // Configurar encabezado para indicar que la respuesta es JSON
        header('Content-Type: application/json');

        // Datos que deseas enviar como JSON
        $response = [
            'status' => 'success',
            'message' => 'Formulario enviado correctamente',
            'data' => [
                'userId' => 123,
                'userName' => 'Josué Loría',
            ]
        ];

        // Convertir el array a JSON y enviarlo como respuesta
        return json_encode($response);
    }

    public function buildSellHtml($product_title, $product_price, $product_description) {
        // Iniciar el buffer de salida
        ob_start();
        ?>
        <p>Han solicitado el producto <strong><?= htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') ?></strong> con un valor de <?= htmlspecialchars($product_price, ENT_QUOTES, 'UTF-8') ?></p>
        <p>La descripción del producto es: <strong><?= htmlspecialchars($product_description, ENT_QUOTES, 'UTF-8') ?></strong></p>
        <?php
        // Capturar el contenido del buffer y almacenarlo en una variable
        $html = ob_get_clean();
        return $html; // Retornar el HTML como string
    }
}

<?php

namespace App\Services\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class EmailService extends PHPMailer {

    public function __construct() {
        parent::__construct(true);
        // Configuración del servidor SMTP de Gmail
        $this->isSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->SMTPAuth = true;
        $this->Username = 'jozzlg@gmail.com'; // Tu dirección de correo de Gmail
        $this->Password = 'zvsmfldglsoiyuho'; // Contraseña de tu correo o contraseña de aplicación
        $this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita TLS en Gmail
        $this->Port = 587; // Puerto de Gmail para TLS
        $this->isHTML(true);
        
        $this->setFrom('jozzlg@gmail.com', 'Josue');
    }

    public function sendEmail() {
 
        $this->addAddress('jozzlg@gmail.com', 'Josue Loria'); // Añadir destinatario

        $this->Subject = 'Compra de articulo';
        $this->Body = 'El contenido de una nueva compra';

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
    

}

<?php
use App\Services\EmailService;

class SaleController {

    private $emailService;
    
    public function __construct() {
        $this->emailService=new EmailService();
    }
    
    // Method to save a sale
    public function save(){
        $this->emailService->sendEmail();
    }
}
<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/Sale.php';

class SaleModelTest extends TestCase{
    private $saleModel;
    
    #[\Override]
    protected function setUp(): void {
        $this->saleModel = new Sale();
    }
    
    public function testSaveSale():void{
       $result = $this->saleModel->create("Efectivo", "Creado")['message'];
       $this->assertEquals($result,"Sale created successfully");
    }
}
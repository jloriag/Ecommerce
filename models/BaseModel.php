<?php


abstract class BaseModel {

    
    public function __construct() {
        $this->config = require __DIR__ . '/../config/config.php';
    }

    private $curl;
    
    protected $config;

    public function getEcommerceData() {
        $response = file_get_contents("{$this->config['app']['api']}public/api/ecommercedata/1");
        return json_decode($response, true)['data'];
    }

    abstract function path($param="");

    protected function postRequest($postfields) {
        $this->curl = curl_init();
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->config['app']['api'] . $this->path(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postfields));
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        return json_decode($response, true);
    }
    
    protected function getRequest($param="") {
        $this->curl = curl_init();
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->config['app']['api'] . $this->path($param),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET'));
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        return json_decode($response, true);
    }
    
    public function getConfig() {
        return $this->config;
    }


}

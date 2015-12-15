<?php

/**
 * Description of OpenExchangeRate
 *
 * @author Cristian Tala Sánchez
 */
class OpenExchangeRateCT {

    private $apiKey;
    private $file = 'latest.json';
    private $url = "http://openexchangerates.org/api/%FILE%?app_id=%KEY%";
    private $exchangeRates;

    /**
     * Se inicia el construtor con el API Key a utilizar
     * @param type $apiKey
     */
    public function __construct($apiKey) {


        $this->apiKey = $apiKey;
        $this->url = str_replace("%FILE%", $this->file, $this->url);
        $this->url = str_replace("%KEY%", $this->apiKey, $this->url);
        error_log(print_r("URL :".$this->url, true));
        // Open CURL session:
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Get the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $this->exchangeRates = json_decode($json);
    }

    /**
     * Esta función obtiene el valor en USD de un valor en CLP
     * @param type $clp
     */
    public function CLPToUSD($clp) {
        $convert_rate = $this->valorDolar();
        return round($clp / $convert_rate, 2);
    }

    /**
     * Esta función retorna el valor de en CLP del monto en USD
     * usando OpenXRate
     * @param type $USD
     */
    public function USDToCLP($USD) {
        $convert_rate = $this->valorDolar();
        return round($clp * $convert_rate, 2);
    }

    public function valorDolar() {
        return $this->exchangeRates->rates->CLP;
    }

}

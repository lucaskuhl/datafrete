<?php

declare(strict_types=1);

namespace App\Controller\Helpers;

use Exception;

class CepHandler
{
    private static $apiToken = "ae3ddda75a5c9698969506c8f15556f4";

    private static $url = "https://www.cepaberto.com/api/v3/cep?cep=";

    public static function GetCoords($cepOrigem, $cepDestino)
    {
        $returnData = array();
        $headers = array();

        $cr = curl_init();

        $headers[] = "Authorization: Token token=" . self::$apiToken;

        curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cr, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($cr, CURLOPT_URL, self::$url . $cepOrigem);

        $responseCepOrigem = json_decode(curl_exec($cr), true);

        if (empty($responseCepOrigem) || isset($responseCepOrigem["message"])) {
            throw new Exception("Cep de origem é inválido", 1);
        }

        curl_setopt($cr, CURLOPT_URL, self::$url . $cepDestino);

        sleep(2);

        $responseCepDestino = json_decode(curl_exec($cr), true);

        if (empty($responseCepDestino) || isset($responseCepDestino["message"])) {
            throw new Exception("Cep de destino é inválido", 1);
        }

        curl_close($cr);

        $returnData['cepOrigem'] = $responseCepOrigem;
        $returnData['cepDestino'] = $responseCepDestino;

        return $returnData;
    }
}

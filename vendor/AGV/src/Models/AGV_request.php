<?php

namespace BREND\AGV\Models;

use BREND\Constants\STATUS;
use Symfony\Component\HttpClient\HttpClient;

class AGV_request{
    public static $url = "http://192.168.101.234:50100/AGV/SendAgvCmd";

    public static function POST($name, $cmd, $param, $url){
        if(is_array($param) == false){
            $param = array($param);
        }
        $httpClient = HttpClient::create();
        $response = $httpClient->request(
            "POST",
            $url,
            [
                'headers' => [
                    "Accept" => "application/json",
                ],
                'json' => [
                    "Name" => $name . "",
                    "Cmd" => $cmd . "",
                    "Param" => $param
                ]
            ]
        );

        //$responseData[]

        $httpCode = $response->getStatusCode();
        if($httpCode != 200){
            throw Exception("httpCode: " . $httpCode, STATUS::RESPONSE_ERROR);
        }
        $httpContentType = $response->getHeaders()['content-type'][0];
        $httpContent = json_decode($response->getContent(), true);
        return $httpContent;
    }
}
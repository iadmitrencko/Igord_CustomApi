<?php

class Igord_CustomApi_Model_Input_HttpRequest_PackageFactory
{
    /**
     * @param Igord_CustomApi_Model_Input_HttpRequest $httpRequest
     * @param Igord_CustomApi_Model_Input_HttpRequestValidator_Result $result
     * @return Igord_CustomApi_Model_Package
     */
    public function create(Igord_CustomApi_Model_Input_HttpRequest $httpRequest,
                           Igord_CustomApi_Model_Input_HttpRequestValidator_Result $result)
    {
        $expUri = explode('/', $httpRequest->getRequestUri());

        $packageData = [
            'version' => $expUri[1],
            'command' => $this->getCommand($expUri),
            'params' => $this->getParams($result->getBodyType(), $httpRequest->getBody())
        ];

        return Mage::getModel('customapi/Package', $packageData);
    }

    /**
     * @param array $data
     * @return string
     */
    protected function getCommand($data)
    {
        $count = count($data);
        $result = "";

        for($i = 2; $i < $count; $i++) {
            $result .= $data[$i] . "_";
        }

        return trim($result, "_");
    }

    /**
     * Convert params in JSON or XML to array
     * @param $type
     * @param $body
     * @return array
     */
    protected function getParams($type, $body)
    {
        if($type == 'XML') {
            $xml = simplexml_load_string($body);
            $json = json_encode($xml);
            $data = json_decode($json,true);
        } else
            $data = json_decode($body, true);

        return $data;
    }
}
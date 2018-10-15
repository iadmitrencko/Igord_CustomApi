<?php

class Igord_CustomApi_Model_Command_Definition_DefinitionFactory
{
    public function create($version, $command)
    {
        $validators = Mage::getConfig()
            ->getNode("customapi/$version/$command/validators")
            ->asArray();

        $handler = Mage::getConfig()
            ->getNode("global/customapi_config/$version/$command/handler/name");

        $data = [
            'version' => $version,
            'command' => $command,
            'validators' => $validators,
            'handler' => $handler
        ];

        return Mage::getModel('customapi/Command_Definition')->create($data);
    }
}
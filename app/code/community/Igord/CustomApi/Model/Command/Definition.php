<?php

class Igord_CustomApi_Model_Command_Definition
{
    protected $version;
    protected $command;
    protected $handler;
    protected $validators;

    public function __construct($data)
    {
        $this->version = $data['version'];
        $this->command = $data['command'];
        $this->validators = $data['validators'];
        $this->handler = $data['handler'];
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getCommand()
    {
        return $this->command;
    }

    public function getValidators()
    {
        return $this->validators;
    }

    public function getHandler()
    {
        return $this->handler;
    }
}
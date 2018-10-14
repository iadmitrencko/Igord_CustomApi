<?php

class Igord_CustomApi_Model_Package
{
    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $command;

    /**
     * @var array
     */
    protected $params;

    /**
     * Igord_CustomApi_Model_Package constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->version = $data['version'];
        $this->command = $data['command'];
        $this->params = $data['params'];
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}
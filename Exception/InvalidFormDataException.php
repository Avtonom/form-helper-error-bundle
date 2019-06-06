<?php

namespace FormHelper\ErrorBundle\Exception;

class InvalidFormDataException extends \RuntimeException implements InvalidFormBaseException
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @param string $message
     * @param array|null $data
     */
    public function __construct($message, $data = null)
    {
        parent::__construct($message);
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }
}
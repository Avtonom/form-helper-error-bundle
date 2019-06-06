<?php

namespace FormHelper\ErrorBundle\Exception;

class InvalidFormDataException extends \RuntimeException implements InvalidFormBaseException
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @param array|null $data
     * @param string|null $message
     */
    public function __construct($data = null, $message = 'Invalid submitted data')
    {
        parent::__construct($message, 400);
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
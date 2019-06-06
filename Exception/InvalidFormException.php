<?php

namespace FormHelper\ErrorBundle\Exception;

use Symfony\Component\Form\FormInterface;

class InvalidFormException extends \RuntimeException implements InvalidFormBaseException
{
    /**
     * @var FormInterface|null
     */
    protected $form;

    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var array
     */
    protected $errors = array();

    /**
     * @param FormInterface|null $form
     * @param array|null $data
     * @param array|null $errors
     * @param string|null $message
     */
    public function __construct($form = null, $data = array(), $errors = array(), $message = 'Invalid submitted data')
    {
        parent::__construct($message, 400);
        $this->form = $form;
        $this->data = $data;
        $this->errors = $errors;
    }

    /**
     * @return FormInterface|null
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param FormInterface $form
     */
    public function setForm(FormInterface $form)
    {
        $this->form = $form;
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

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }
}
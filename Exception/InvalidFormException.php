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
     * @param FormInterface|null $form
     * @param string $message|null
     */
    public function __construct($form = null, $message = 'Invalid submitted data')
    {
        parent::__construct($message, 400);
        $this->form = $form;
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
}
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
     * InvalidFormException constructor.
     *
     * @param string $message
     * @param FormInterface|null $form
     */
    public function __construct($message, $form = null)
    {
        parent::__construct($message);
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
<?php

namespace FormHelper\ErrorBundle\Helper;

use FormHelper\ErrorBundle\Helper\FormErrorHelper;

trait FormErrorHelperTrait
{
    /**
     * @var FormErrorHelper
     */
    protected $formErrorHelper;

    /**
     * @return FormErrorHelper
     */
    public function getFormErrorHelper()
    {
        return $this->formErrorHelper;
    }

    /**
     * @param FormErrorHelper $formErrorHelper
     */
    public function setFormErrorHelper(FormErrorHelper $formErrorHelper)
    {
        $this->formErrorHelper = $formErrorHelper;
    }
}
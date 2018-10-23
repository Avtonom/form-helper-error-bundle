<?php

namespace FormHelper\ErrorBundle\Helper;

use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class FormErrorHelper
 */
class FormErrorHelper
{
    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @var FormInterface
     */
    protected $form;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param FormInterface $form
     * @return $this
     */
    public function setForm(FormInterface $form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @return FormFactoryInterface
     */
    public function getFormFactory()
    {
        return $this->formFactory;
    }

    /**
     * @param FormFactoryInterface $formFactory
     */
    public function setFormFactory(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @param string $class
     * @param array $data
     *
     * @return FormFactoryInterface
     */
    public function create($class, array $data = array())
    {
        $form = $this->getFormFactory()->create($class, $data);
        $form->submit($data);
        $this->setForm($form);
        return $form;
    }

    /**
     * @return Translator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * @param FormInterface|null $form
     * @return array
     */
    public function getErrorsAsArray(FormInterface $form = null)
    {
        $violations = [];

        $form = ($form) ? $form : $this->getForm();
        /** @var FormInterface $child */
        foreach ($form->getIterator() as $key => $child) {
            foreach ($child->getErrors() as $error) {
                $violations[$key] = $this->getTranslator()->trans($error->getMessage());
            }
        }

        foreach ($form->getErrors() as $error) {
            $message = $this->getTranslator()->trans($error->getMessage());

            if (preg_match('/\[\S+\]/', $message, $match)) {
                $violations[str_replace(['[', ']'], '', $match[0])] = str_replace($match[0], '', $message);
            } else {
                $violations[] = $message;
            }
        }
        return $violations;
    }
}

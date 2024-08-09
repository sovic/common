<?php

namespace Sovic\Common\Controller\Trait;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * @property FormFactoryInterface $formFactory
 */
trait FormTrait
{
    public function getErrors(FormInterface $form): array
    {
        $errors = [];
        /** @var FormError $error */
        foreach ($form->getErrors(true) as $error) {
            if ($error->getOrigin() === null) {
                $errors['form'] = $error->getMessage();
                continue;
            }
            $errors[$error->getOrigin()->getName()] = $error->getMessage();
        }

        return $errors;
    }
}

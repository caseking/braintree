<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\Braintree\Form;

use Spryker\Shared\Braintree\BraintreeConstants;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class CreditCardSubForm extends AbstractSubForm
{

    const PAYMENT_METHOD = 'credit_card';

    /**
     * @return string
     */
    public function getName()
    {
        return BraintreeConstants::PAYMENT_METHOD_CREDIT_CARD;
    }

    /**
     * @return string
     */
    public function getPropertyPath()
    {
        return BraintreeConstants::PAYMENT_METHOD_CREDIT_CARD;
    }

    /**
     * @return string
     */
    public function getTemplatePath()
    {
        return BraintreeConstants::PROVIDER_NAME . '/' . static::PAYMENT_METHOD;
    }

    /**
     * @param \Symfony\Component\Form\FormView $view The view
     * @param \Symfony\Component\Form\FormInterface $form The form
     * @param array $options The options
     *
     * @return void
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

        $view->vars[static::CLIENT_TOKEN] = $this->generateClientToken();
    }

}

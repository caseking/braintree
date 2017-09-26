<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\Braintree\Presentation;

use SprykerTest\Yves\Braintree\BraintreePresentationTester as CheckoutPresentationTester;
use SprykerTest\Yves\Braintree\PageObject\ProductDetailPage;
use SprykerTest\Zed\Braintree\BraintreePresentationTester;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Zed
 * @group Braintree
 * @group Presentation
 * @group PayPalGuestHappyCaseCest
 * Add your own group annotations below this line
 */
class PayPalGuestHappyCaseCest
{

    /**
     * @skip Broken because of new checkout
     *
     * @param \SprykerTest\Zed\Braintree\BraintreePresentationTester $i
     *
     * @return void
     */
    public function closePayPalGuestOrderHappyCase(BraintreePresentationTester $i)
    {
        $checkoutTester = $i->haveFriend('checkoutTester', CheckoutPresentationTester::class);
        $checkoutTester->does(function (CheckoutPresentationTester $i) {
            $i->addToCart(ProductDetailPage::URL);
            $i->checkoutWithPayPalAsGuest();
        });
        $checkoutTester->leave();
        $i->wait(10);

        $i->amZed();
        $i->amLoggedInUser();
        $i->closePayPalOrderHappyCase();
    }

}

<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Service\Braintree;

use Codeception\Test\Unit;
use SprykerEco\Service\Braintree\BraintreeService;
use SprykerEco\Service\Braintree\BraintreeServiceFactory;
use SprykerEco\Service\Braintree\BraintreeServiceInterface;
use SprykerEco\Service\Braintree\Model\TokenGenerator\TokenGeneratorInterface;

/**
 * @group SprykerEcoTest
 * @group Service
 * @group Braintree
 * @group BraintreeTest
 * @group BraintreeServiceTest
 */
class BraintreeServiceTest extends Unit
{
    protected static $tokenValue;

    /**
     * @return void
     */
    public function testGenerateToken(): void
    {
        $service = $this->prepareService();

        $this->assertNotEmpty($service->generateToken());
        $this->assertNotNull($service->generateToken());
        $this->assertEquals($this->getToken(), $service->generateToken());
    }

    protected function prepareService(): BraintreeServiceInterface
    {
        $service = new BraintreeService();
        $service->setFactory($this->getBraintreeServiceFactoryMock());

        return $service;
    }

    /**
     * @return BraintreeServiceFactory
     */
    protected function getBraintreeServiceFactoryMock(): BraintreeServiceFactory
    {
        $factory = $this->getMockBuilder(BraintreeServiceFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['createTokenGenerator'])
            ->getMock();

        $factory->method('createTokenGenerator')->willReturn($this->getTokenGeneratorMock());

        return $factory;
    }

    /**
     * @return TokenGeneratorInterface
     */
    protected function getTokenGeneratorMock(): TokenGeneratorInterface
    {
        $tokenGenerator = $this->getMockBuilder(TokenGeneratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['generateToken'])
            ->getMock();

        $tokenGenerator->method('generateToken')->willReturn($this->getToken());

        return $tokenGenerator;
    }

    /**
     * @return string
     */
    protected function getToken(): string
    {
        if (!static::$tokenValue) {
            static::$tokenValue = uniqid();
        }

        return static::$tokenValue;
    }
}

<?php namespace Anomaly\PaypalGatewayExtension;

use Anomaly\PaymentsModule\Account\Contract\AccountInterface;
use Anomaly\PaymentsModule\Gateway\GatewayExtension;
use Anomaly\PaypalGatewayExtension\Command\MakePaypalGateway;
use Omnipay\Common\AbstractGateway;

/**
 * Class PaypalGatewayExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PaypalGatewayExtension
 */
class PaypalGatewayExtension extends GatewayExtension
{

    /**
     * This extension provides the PayPal
     * payment gateway for the Payments module.
     *
     * @var null|string
     */
    protected $provides = 'anomaly.module.payments::gateway.paypal';

    /**
     * Return an Omnipay gateway.
     *
     * @param AccountInterface $account
     * @return AbstractGateway
     * @throws \Exception
     */
    public function make(AccountInterface $account)
    {
        return $this->dispatch(new MakePaypalGateway($account));
    }
}

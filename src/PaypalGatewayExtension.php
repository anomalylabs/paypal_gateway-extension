<?php namespace Anomaly\PaypalGatewayExtension;

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
     * This extension provides the Stripe
     * payment gateway for the Payments module.
     *
     * @var null|string
     */
    protected $provides = 'anomaly.module.payments::payment_gateway.paypal';

    /**
     * Return a gateway instance.
     *
     * @return AbstractGateway
     */
    public function make()
    {
        return $this->dispatch(new MakePaypalGateway());
    }
}

<?php namespace Anomaly\PaypalGatewayExtension\Command;

use Anomaly\EncryptedFieldType\EncryptedFieldTypePresenter;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Omnipay\PayPal\ExpressGateway;

/**
 * Class MakePaypalGateway
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PaypalGatewayExtension\Command
 */
class MakePaypalGateway implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        /* @var EncryptedFieldTypePresenter $username */
        /* @var EncryptedFieldTypePresenter $password */
        $username = $settings->presenter('anomaly.extension.paypal_gateway::username');
        $password = $settings->presenter('anomaly.extension.paypal_gateway::password');

        $gateway = new ExpressGateway();

        $gateway->setUsername($username->decrypted());
        $gateway->setPassword($password->decrypted());

        return $gateway;
    }
}

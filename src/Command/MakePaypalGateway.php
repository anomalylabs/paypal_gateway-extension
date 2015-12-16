<?php namespace Anomaly\PaypalGatewayExtension\Command;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\EncryptedFieldType\EncryptedFieldTypePresenter;
use Anomaly\PaymentsModule\Account\Contract\AccountInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Omnipay\PayPal\ExpressGateway;
use Omnipay\PayPal\ProGateway;

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
     * The account instance.
     *
     * @var AccountInterface
     */
    protected $account;

    /**
     * Create a new MakePaypalGateway instance.
     *
     * @param AccountInterface $account
     */
    public function __construct(AccountInterface $account)
    {
        $this->account = $account;
    }

    /**
     * Handle the command.
     *
     * @param ConfigurationRepositoryInterface $configuration
     */
    public function handle(ConfigurationRepositoryInterface $configuration)
    {
        /* @var EncryptedFieldTypePresenter $username */
        /* @var EncryptedFieldTypePresenter $password */
        /* @var EncryptedFieldTypePresenter $signature */
        /* @var ConfigurationInterface $mode */
        $username  = $configuration->presenter('anomaly.extension.paypal_gateway::username', $this->account->getSlug());
        $password  = $configuration->presenter('anomaly.extension.paypal_gateway::password', $this->account->getSlug());
        $signature = $configuration->presenter(
            'anomaly.extension.paypal_gateway::signature',
            $this->account->getSlug()
        );
        $mode      = $configuration->get(
            'anomaly.extension.paypal_gateway::test_mode',
            $this->account->getSlug()
        );

        $gateway = new ExpressGateway();

        $gateway->setUsername($username->decrypted());
        $gateway->setPassword($password->decrypted());
        $gateway->setSignature($signature->decrypted());
        $gateway->setTestMode($mode->getValue());

        return $gateway;
    }
}

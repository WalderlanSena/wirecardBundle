<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 20:56
 */

namespace App\Bundles\WirecardBundle\Tests;

use App\Bundles\WirecardBundle\Exception\WirecardErrorException;
use App\Bundles\WirecardBundle\Factory\CreateNewWirecardPaymentFactory;
use App\Bundles\WirecardBundle\Service\WirecardAuthService;
use App\Bundles\WirecardBundle\Service\WirecardOrderService;
use App\Bundles\WirecardBundle\Service\WirecardPaymentService;
use Moip\Exceptions\Error;
use Moip\Exceptions\UnexpectedException;
use Moip\Resource\Orders;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class WirecardNewPaymentControllerTest extends TestCase
{
    private $wirecardPaymentService;
    private $wirecardOrderService;

    public function __construct()
    {
        parent::__construct();
        $this->wirecardPaymentService = new WirecardPaymentService(new WirecardAuthService());
        $this->wirecardOrderService   = new WirecardOrderService(new WirecardAuthService());
    }

    public function testCreateNewPayment()
    {
        $foundErrors = [];

        $payment = '';

        $newPayment = CreateNewWirecardPaymentFactory::createNewWirecardPaymentTicket()
        ->setExpirationDate(new \DateTime())
        ->setInstructionLines(['Descrição teste','',''])
        ->setLogoUri('https://cursar.me/assets/img/cursarme-logo-min.png');

        try {
            /**
             * @var Orders $order
             */
            $order = $this->wirecardOrderService->findOneOrder('ORD-0EKCW6P1QDN2');
            $payment = $this->wirecardPaymentService->createNewPaymentTicketTransaction($order, $newPayment);
        } catch (WirecardErrorException $wirecardErrorException) {
            if (is_array($wirecardErrorException->getErrorsApi())) {
                /**
                 * @var Error $errors
                 */
                foreach ($wirecardErrorException->getErrorsApi() as $errors) {
                    array_push($foundErrors, $errors->getDescription());
                }
            }
        } catch (UnexpectedException $unexpectedException) {
            foreach ($unexpectedException as $errors) {
                array_push($foundErrors, $errors);
            }
        }

        $this->assertEquals([], $foundErrors,'Payment não registrado...');

        print_r([
            'WirecardPayment ID : ' => $payment->getHrefBoleto()
        ]);
    }
}
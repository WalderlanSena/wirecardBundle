<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 03:01
 */

namespace App\Bundles\WirecardBundle\Tests;

use App\Bundles\WirecardBundle\Exception\WirecardErrorException;
use App\Bundles\WirecardBundle\Factory\CreateNewWirecardOrderFactory;
use App\Bundles\WirecardBundle\Service\WirecardAuthService;
use App\Bundles\WirecardBundle\Service\WirecardOrderService;
use Moip\Exceptions\Error;
use Moip\Exceptions\UnexpectedException;
use Moip\Resource\Orders;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

class WirecardRegisterNewOrderControllerTest extends TestCase
{
    private $wirecardOrderService;

    public function __construct()
    {
        parent::__construct();
        $this->wirecardOrderService = new WirecardOrderService(new WirecardAuthService());
    }

    public function testFindOneOrder()
    {
        try {
            $order = $this->wirecardOrderService->findOneOrder('ORD-2O8BT5HSZ8T7');
        } catch (WirecardErrorException $wirecardErrorException) {
            var_dump($wirecardErrorException);
        }

        $this->assertInstanceOf(Orders::class, $order,'Order não encontrada...');

        var_dump($order);
    }

    public function testCreateNewOrder()
    {
        $order = '';
        $wirecardOrder = CreateNewWirecardOrderFactory::createNewWirecardOrder()
            ->setOwnId(uniqid())
            ->setCustomerId('CUS-J81A2GC787SU');
        $item = CreateNewWirecardOrderFactory::createNewItemWirecardOrder()
            ->setProduct('Curso')
            ->setDetail('Curso de teste')
            ->setPrice(160)
            ->setQuantity(1)
            ->setCategory('OTHER_CATEGORIES');

        $foundErrors = [];

        try {
            $order = $this->wirecardOrderService->registerNewOrder($wirecardOrder)
                                                ->addItem($item)
                                                ->createNewOrder();
        } catch (WirecardErrorException $wirecardErrorException) {
            if (is_array($wirecardErrorException->getErrorsApi())) {
                /**
                 * @var Error $errors
                 */
                foreach ($wirecardErrorException->getErrorsApi() as $errors) {
                    array_push($foundErrors, $errors->getDescription());
                }
            }
        }  catch (UnexpectedException $unexpectedException) {
            foreach ($unexpectedException as $errors) {
                array_push($foundErrors, $errors);
            }
        }

        $this->assertEquals([], $foundErrors,'Costumer não registrado...');

        print_r([
            'WirecardOrder ID : ' => $order->getId()
        ]);
    }
}
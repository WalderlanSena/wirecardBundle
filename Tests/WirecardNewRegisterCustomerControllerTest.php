<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 08/03/19
 * Time: 02:17
 */

namespace App\Bundles\WirecardBundle\Tests;

use App\Bundles\WirecardBundle\Exception\WirecardErrorException;
use App\Bundles\WirecardBundle\Factory\CreateNewWirecardCustomerFactory;
use App\Bundles\WirecardBundle\Service\WirecardAuthService;
use App\Bundles\WirecardBundle\Service\WirecardCustomerService;
use Moip\Exceptions\Error;
use Moip\Exceptions\UnexpectedException;
use Moip\Resource\Customer;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

class WirecardNewRegisterCustomerControllerTest extends TestCase
{
    private $wirecardCustomerService;

    public function __construct()
    {
        parent::__construct();
        $this->wirecardCustomerService = new WirecardCustomerService(new WirecardAuthService());
    }

    public function testFindOneCustomerById()
    {
        try {
            $customer = $this->wirecardCustomerService->findOneCustomerById('CUS-J81A2GC787SU');
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            die;
        }

        $this->assertInstanceOf(Customer::class, $customer,'WirecardCustomer não encontrado');
    }

    public function testNewRegisterCustomer()
    {
        $customer = '';

        $wirecardCustomer = CreateNewWirecardCustomerFactory::createNewWirecardCustomer()
            ->setOwnId(uniqid())
            ->setFullName('sdasda')
            ->setEmail('asdasdasd@adasda.com')
            ->setAddressType('SHIPPING')
            ->setAddressCity('sdasda')
            ->setAddressStreet('asdasd')
            ->setAddressState('SADAS')
            ->setAddressStateCod('sdasd')
            ->setAddressZipCode(60212312);

        $foundErrors = [];

        try {
            $customer = $this->wirecardCustomerService->registerNewCustomer($wirecardCustomer);
        } catch (WirecardErrorException $exception) {
            if (is_array($exception->getErrorsApi())) {
                /**
                 * @var Error $errors
                 */
                foreach ($exception->getErrorsApi() as $errors) {
                    array_push($foundErrors, $errors->getDescription());
                }
            }
        } catch (UnexpectedException $unexpectedException) {
            foreach ($unexpectedException as $errors) {
                array_push($foundErrors, $errors);
            }
        }
        $this->assertEquals([], $foundErrors,'Costumer não registrado...');
        /**
         * @var Customer $customer
         */
        print_r([
            'WirecardCustomer ID : ' => $customer->getId()
        ]);
    }
}
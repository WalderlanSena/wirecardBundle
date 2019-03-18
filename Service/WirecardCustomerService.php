<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 08/03/19
 * Time: 01:09
 */

namespace App\Bundles\WirecardBundle\Service;

use App\Bundles\WirecardBundle\Exception\WirecardErrorException;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardCustomer;
use App\Bundles\WirecardBundle\Service\Interfaces\WirecardAuthServiceInterface;
use App\Bundles\WirecardBundle\Service\Interfaces\WirecardCustomerServiceInterface;
use App\Domain\Entity\Users;
use Moip\Exceptions\InvalidArgumentException;
use Moip\Exceptions\UnexpectedException;
use Moip\Exceptions\ValidationException;

class WirecardCustomerService implements WirecardCustomerServiceInterface
{
    private $wirecardAuthService;

    public function __construct(WirecardAuthServiceInterface $wirecardAuthService)
    {
        $this->wirecardAuthService = $wirecardAuthService->authenticate();
    }

    /**
     * @param string $idCustomer
     * @return \Moip\Resource\Customer|\stdClass|null
     * @throws \Exception
     */
    public function findOneCustomerById(string $idCustomer)
    {
        try {
            $customer = $this->wirecardAuthService->customers()->get($idCustomer);
        } catch (ValidationException $validationException) {
            throw new \Exception($validationException);
        } catch (InvalidArgumentException $invalidArgumentException) {
            throw new \Exception($invalidArgumentException->getMessage());
        } catch (UnexpectedException $unexpectedException) {
            throw new \Exception($unexpectedException->getMessage());
        }

        return $customer;
    }

    /**
     * @param WirecardCustomer $wirecardCustomer
     * @return \stdClass
     * @throws WirecardErrorException
     */
    public function registerNewCustomer(WirecardCustomer $wirecardCustomer)
    {
        try {
            return $this->wirecardAuthService
                        ->customers()
                        ->setOwnId($wirecardCustomer->getOwnId())
                        ->setFullname($wirecardCustomer->getFullName())
                        ->setEmail($wirecardCustomer->getEmail())
                        ->setBirthDate($wirecardCustomer->getBirthDate())
//                        ->setTaxDocument($users->)
                        ->setPhone(11, 66778899)
                        ->addAddress($wirecardCustomer->getAddressType(),
                            $wirecardCustomer->getAddressStreet(),
                            $wirecardCustomer->getAddressNumber(),
                            $wirecardCustomer->getAddressCity(),
                            $wirecardCustomer->getAddressState(),
                            $wirecardCustomer->getAddressStateCod(),
                            $wirecardCustomer->getAddressZipCode(),
                            $wirecardCustomer->getAddressComplement())
                        ->addAddress($wirecardCustomer->getAddressType(),
                            $wirecardCustomer->getAddressStreet(),
                            $wirecardCustomer->getAddressNumber(),
                            $wirecardCustomer->getAddressCity(),
                            $wirecardCustomer->getAddressState(),
                            $wirecardCustomer->getAddressStateCod(),
                            $wirecardCustomer->getAddressZipCode(),
                            $wirecardCustomer->getAddressComplement())
                        ->create();
        } catch (ValidationException $validationException) {
            throw new WirecardErrorException('',0, $validationException->getErrors());
        } catch (UnexpectedException $unexpectedException) {
            throw new WirecardErrorException('',0, [$unexpectedException->getMessage()]);
        }
    }
}
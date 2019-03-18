<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 20:58
 */

namespace App\Bundles\WirecardBundle\Service;

use App\Bundles\WirecardBundle\Exception\WirecardErrorException;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardPaymentCreditCard;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardPaymentTicket;
use App\Bundles\WirecardBundle\Service\Interfaces\WirecardAuthServiceInterface;
use App\Bundles\WirecardBundle\Service\Interfaces\WirecardPaymentServiceInterface;
use Moip\Exceptions\ValidationException;
use Moip\Resource\Orders;

class WirecardPaymentService implements WirecardPaymentServiceInterface
{
    private $wirecardAuthService;

    public function __construct(WirecardAuthServiceInterface $wirecardAuthService)
    {
        $this->wirecardAuthService = $wirecardAuthService->authenticate();
    }

    /**
     * @param Orders $orders
     * @param WirecardPaymentTicket $wirecardPaymentTicket
     * @return \Moip\Resource\Payment
     * @throws WirecardErrorException
     */
    public function createNewPaymentTicketTransaction(Orders $orders, WirecardPaymentTicket $wirecardPaymentTicket)
    {
        try {
            return $orders->payments()
                ->setBoleto(
                   $wirecardPaymentTicket->getExpirationDate(),
                   $wirecardPaymentTicket->getLogoUri(),
                   $wirecardPaymentTicket->getInstructionLines()
                )
                ->execute();
        } catch (ValidationException $validationException) {
            throw new WirecardErrorException('', 0 , [$validationException->getMessage()]);
        }
    }

    /**
     * @param Orders $order
     * @param WirecardPaymentCreditCard $wirecardPaymentCreditCard
     * @param string $hash
     * @return \Moip\Resource\Payment
     * @throws WirecardErrorException
     */
    public function createNewPaymentCreditCardTransaction(
        Orders $order,
        WirecardPaymentCreditCard $wirecardPaymentCreditCard,
        string $hash
    )
    {
        try {
            $holder = $this->wirecardAuthService->holders()
                ->setFullname($wirecardPaymentCreditCard->getFullName())
                ->setBirthDate($wirecardPaymentCreditCard->getBirthDate())
                ->setTaxDocument($wirecardPaymentCreditCard->getTaxDocument())
                ->setAddress(
                    $wirecardPaymentCreditCard->getAddress()->getType(),
                    $wirecardPaymentCreditCard->getAddress()->getStreet(),
                    $wirecardPaymentCreditCard->getAddress()->getNumber(),
                    $wirecardPaymentCreditCard->getAddress()->getDistrict(),
                    $wirecardPaymentCreditCard->getAddress()->getCity(),
                    $wirecardPaymentCreditCard->getAddress()->getState(),
                    $wirecardPaymentCreditCard->getAddress()->getZip()
                );

            return $order->payments()
                ->setCreditCardHash($hash, $holder)
                ->setInstallmentCount($wirecardPaymentCreditCard->getInstallmentCount())
                ->setStatementDescriptor($wirecardPaymentCreditCard->getStatementDescriptor())
                ->execute();
        } catch (ValidationException $validationException) {
            throw new WirecardErrorException('', 0, [$validationException->getMessage()]);
        }
    }
}
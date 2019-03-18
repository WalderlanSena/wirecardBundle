<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 03:03
 */

namespace App\Bundles\WirecardBundle\Service;

use App\Bundles\WirecardBundle\Exception\WirecardErrorException;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardOrder;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardOrderItem;
use App\Bundles\WirecardBundle\Service\Interfaces\WirecardAuthServiceInterface;
use App\Bundles\WirecardBundle\Service\Interfaces\WirecardOrderServiceInterface;
use Doctrine\Common\Persistence\Mapping\StaticReflectionService;
use Moip\Exceptions\UnexpectedException;
use Moip\Exceptions\ValidationException;
use Moip\Resource\Orders;

class WirecardOrderService implements WirecardOrderServiceInterface
{
    private $wirecardAuthService;
    /**
     * @var Orders $order
     */
    private $order;

    public function __construct(WirecardAuthServiceInterface $wirecardAuthService)
    {
        $this->wirecardAuthService = $wirecardAuthService->authenticate();
    }

    /**
     * @param string $orderId
     * @return \stdClass
     * @throws WirecardErrorException
     */
    public function findOneOrder(string $orderId)
    {
        try {
            return $this->wirecardAuthService->orders()->get($orderId);
        } catch (ValidationException $validationException) {
            throw new WirecardErrorException('', 0, [$validationException->getMessage()]);
        }
    }

    /**
     * @param WirecardOrder $wirecardOrder
     * @return WirecardOrderService
     * @throws WirecardErrorException
     */
    public function registerNewOrder(WirecardOrder $wirecardOrder) : WirecardOrderService
    {
        try {
            $this->order = $this->wirecardAuthService->orders()
                ->setOwnId($wirecardOrder->getOwnId())
                ->setCustomerId($wirecardOrder->getCustomerId())
                ->setShippingAmount($wirecardOrder->getShippingAmount());
        } catch (ValidationException $validationException) {
            throw new WirecardErrorException('', 0, $validationException->getErrors());
        }

        return $this;
    }

    /**
     * @param WirecardOrderItem $wirecardOrderItem
     * @return WirecardOrderService
     * @throws WirecardErrorException
     */
    public function addItem(WirecardOrderItem $wirecardOrderItem) : WirecardOrderService
    {
        try {
            $this->order->addItem(
                $wirecardOrderItem->getProduct(),
                $wirecardOrderItem->getQuantity(),
                $wirecardOrderItem->getDetail(),
                $wirecardOrderItem->getPrice()
            );
        } catch (UnexpectedException $unexpectedException) {
            throw new WirecardErrorException('',0, [$unexpectedException->getMessage()]);
        }
        return $this;
    }

    /**
     * @param float $value
     * @return WirecardOrderService
     * @throws WirecardErrorException
     */
    public function addAddition(float $value) : WirecardOrderService
    {
        try {
            $this->order->setAddition($value);
        } catch (UnexpectedException $unexpectedException) {
            throw new WirecardErrorException('',0, [$unexpectedException->getMessage()]);
        }
        return $this;
    }

    /**
     * @param float $discount
     * @return WirecardOrderService
     * @throws WirecardErrorException
     */
    public function addDiscount(float $discount) : WirecardOrderService
    {
        try {
            $this->order->setDiscount($discount);
        } catch (UnexpectedException $unexpectedException) {
            throw new WirecardErrorException('',0, [$unexpectedException->getMessage()]);
        }

        return $this;
    }

    /**
     * @return Orders|\stdClass
     * @throws WirecardErrorException
     */
    public function createNewOrder()
    {
        try {
            return $this->order->create();
        } catch (UnexpectedException $unexpectedException) {
            throw new WirecardErrorException('',0, [$unexpectedException->getMessage()]);
        } catch (ValidationException $validationException) {
            throw new WirecardErrorException('', 0, $validationException->getErrors());
        }
    }
}
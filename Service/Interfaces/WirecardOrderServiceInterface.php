<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 03:03
 */

namespace App\Bundles\WirecardBundle\Service\Interfaces;

use App\Bundles\WirecardBundle\ModelWirecard\WirecardOrder;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardOrderItem;
use App\Bundles\WirecardBundle\Service\WirecardOrderService;

interface WirecardOrderServiceInterface
{
    /**
     * @param string $orderId
     * @return mixed
     */
    public function findOneOrder(string $orderId);

    /**
     * @param WirecardOrder $wirecardOrder
     * @return mixed
     */
    public function registerNewOrder(WirecardOrder $wirecardOrder) : WirecardOrderService;

    /**
     * @param float $value
     * @return WirecardOrderService
     */
    public function addAddition(float $value) : WirecardOrderService;

    /**
     * @param float $discount
     * @return WirecardOrderService
     */
    public function addDiscount(float $discount) : WirecardOrderService;

    /**
     * @param WirecardOrderItem $wirecardOrderItem
     * @return mixed
     */
    public function addItem(WirecardOrderItem $wirecardOrderItem) : WirecardOrderService;

    /**
     * @return mixed
     */
    public function createNewOrder();
}
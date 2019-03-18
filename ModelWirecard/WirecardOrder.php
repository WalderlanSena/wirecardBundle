<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 13:12
 */

namespace App\Bundles\WirecardBundle\ModelWirecard;

class WirecardOrder
{
    private $ownId;
    private $customerId;
    private $shippingAmount;
    private $addition;
    private $discount;
    private $addItem;

    /**
     * @return mixed
     */
    public function getOwnId()
    {
        return $this->ownId;
    }

    /**
     * @param mixed $ownId
     * @return WirecardOrder
     */
    public function setOwnId($ownId)
    {
        $this->ownId = $ownId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     * @return WirecardOrder
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShippingAmount()
    {
        return $this->shippingAmount;
    }

    /**
     * @param mixed $shippingAmount
     * @return WirecardOrder
     */
    public function setShippingAmount($shippingAmount)
    {
        $this->shippingAmount = $shippingAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddition()
    {
        return $this->addition;
    }

    /**
     * @param mixed $addition
     * @return WirecardOrder
     */
    public function setAddition($addition)
    {
        $this->addition = $addition;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     * @return WirecardOrder
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddItem()
    {
        return $this->addItem;
    }

    /**
     * @param mixed $addItem
     * @return WirecardOrder
     */
    public function setAddItem($addItem)
    {
        $this->addItem = $addItem;
        return $this;
    }
}
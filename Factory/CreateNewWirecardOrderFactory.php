<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 19:44
 */

namespace App\Bundles\WirecardBundle\Factory;

use App\Bundles\WirecardBundle\ModelWirecard\WirecardOrder;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardOrderItem;

abstract class CreateNewWirecardOrderFactory
{
    /**
     * @return WirecardOrder
     */
    public static function createNewWirecardOrder() : WirecardOrder
    {
        return new WirecardOrder();
    }

    /**
     * @return WirecardOrderItem
     */
    public static function createNewItemWirecardOrder() : WirecardOrderItem
    {
        return new WirecardOrderItem();
    }
}
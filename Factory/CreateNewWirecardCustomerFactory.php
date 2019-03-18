<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 12:53
 */

namespace App\Bundles\WirecardBundle\Factory;

use App\Bundles\WirecardBundle\ModelWirecard\WirecardCustomer;

abstract class CreateNewWirecardCustomerFactory
{
    /**
     * @return WirecardCustomer
     */
    public static function createNewWirecardCustomer()
    {
        return new WirecardCustomer();
    }
}
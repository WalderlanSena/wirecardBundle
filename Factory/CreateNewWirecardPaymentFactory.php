<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 21:14
 */

namespace App\Bundles\WirecardBundle\Factory;

use App\Bundles\WirecardBundle\ModelWirecard\WirecardPaymentCreditCard;
use App\Bundles\WirecardBundle\ModelWirecard\WirecardPaymentTicket;

abstract class CreateNewWirecardPaymentFactory
{
    public static function createNewWirecardPaymentTicket() : WirecardPaymentTicket
    {
        return new WirecardPaymentTicket();
    }

    public static function createNewWirecardPaymentCreditCard() : WirecardPaymentCreditCard
    {
        return new WirecardPaymentCreditCard();
    }
}
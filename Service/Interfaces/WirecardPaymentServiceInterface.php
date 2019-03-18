<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 20:58
 */

namespace App\Bundles\WirecardBundle\Service\Interfaces;

use App\Bundles\WirecardBundle\ModelWirecard\WirecardPaymentTicket;
use Moip\Resource\Orders;

interface WirecardPaymentServiceInterface
{
    public function createNewPaymentTicketTransaction(Orders $orders, WirecardPaymentTicket $wirecardPaymentTicket);
}
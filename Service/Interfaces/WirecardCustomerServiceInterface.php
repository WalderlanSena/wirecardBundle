<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 08/03/19
 * Time: 01:10
 */

namespace App\Bundles\WirecardBundle\Service\Interfaces;

use App\Bundles\WirecardBundle\ModelWirecard\WirecardCustomer;

interface WirecardCustomerServiceInterface
{
    /**
     * @param string $idCustomer
     * @return mixed
     */
    public function findOneCustomerById(string $idCustomer);

    /**
     * @param WirecardCustomer $wirecardCustomer
     * @return mixed
     */
    public function registerNewCustomer(WirecardCustomer $wirecardCustomer);
}
<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 08/03/19
 * Time: 00:59
 */

namespace App\Bundles\WirecardBundle\Service\Interfaces;

use Moip\Moip;

interface WirecardAuthServiceInterface
{
    public function authenticate(string $environment = Moip::ENDPOINT_SANDBOX): Moip;
}
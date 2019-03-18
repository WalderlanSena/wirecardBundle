<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 08/03/19
 * Time: 00:58
 */

namespace App\Bundles\WirecardBundle\Service;

use App\Bundles\WirecardBundle\Service\Interfaces\WirecardAuthServiceInterface;
use Moip\Auth\BasicAuth;
use Moip\Moip;

class WirecardAuthService implements WirecardAuthServiceInterface
{
    public function authenticate(string $environment = Moip::ENDPOINT_SANDBOX): Moip
    {
        return new Moip(new BasicAuth(getenv('WIRECARD_TOKEN'), getenv('WIRECARD_KEY')), $environment);
    }
}
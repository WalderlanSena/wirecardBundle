<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 08/03/19
 * Time: 01:57
 */

namespace App\Bundles\WirecardBundle\Controller;

use App\Bundles\WirecardBundle\Service\Interfaces\WirecardCustomerServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WirecardNewRegisterCustomerController extends AbstractController
{
    private $wirecardCustomerService;

    public function __construct(WirecardCustomerServiceInterface $wirecardCustomerService)
    {
        $this->wirecardCustomerService = $wirecardCustomerService;
    }

    public function newRegisterCustomer()
    {
        try {
            $this->wirecardCustomerService->findOneCustomerById($this->getUser()['id_moip']);
        } catch (\Exception $exception) {

        }
        die('sucesso');
    }
}
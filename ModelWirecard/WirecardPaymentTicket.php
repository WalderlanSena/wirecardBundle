<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 21:06
 */

namespace App\Bundles\WirecardBundle\ModelWirecard;

class WirecardPaymentTicket
{
    private $expirationDate;
    private $logoUri;
    private $instructionLines = [];

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     * @return WirecardPaymentTicket
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogoUri()
    {
        return $this->logoUri;
    }

    /**
     * @param mixed $logoUri
     * @return WirecardPaymentTicket
     */
    public function setLogoUri($logoUri)
    {
        $this->logoUri = $logoUri;
        return $this;
    }

    /**
     * @return array
     */
    public function getInstructionLines(): array
    {
        return $this->instructionLines;
    }

    /**
     * @param array $instructionLines
     * @return WirecardPaymentTicket
     */
    public function setInstructionLines(array $instructionLines): WirecardPaymentTicket
    {
        $this->instructionLines = $instructionLines;
        return $this;
    }
}
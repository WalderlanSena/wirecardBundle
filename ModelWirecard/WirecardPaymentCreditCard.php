<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 18/03/19
 * Time: 13:41
 */

namespace App\Bundles\WirecardBundle\ModelWirecard;

class WirecardPaymentCreditCard
{
    private $fullName;
    private $birthDate;
    private $taxDocument;
    private $phone;
    private $address;
    private $installmentCount;
    private $statementDescriptor;

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     * @return WirecardPaymentCreditCard
     */
    public function setFullName(string $fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     * @return WirecardPaymentCreditCard
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxDocument()
    {
        return $this->taxDocument;
    }

    /**
     * @param mixed $taxDocument
     * @return WirecardPaymentCreditCard
     */
    public function setTaxDocument(string $taxDocument)
    {
        $this->taxDocument = $taxDocument;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return WirecardPaymentCreditCard
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress() : WirecardAddress
    {
        return $this->address;
    }

    /**
     * @param WirecardAddress $wirecardAddress
     * @return $this
     */
    public function setAddress(WirecardAddress $wirecardAddress)
    {
        $this->address = $wirecardAddress;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstallmentCount()
    {
        return $this->installmentCount;
    }

    /**
     * @param mixed $installmentCount
     * @return WirecardPaymentCreditCard
     */
    public function setInstallmentCount($installmentCount)
    {
        $this->installmentCount = $installmentCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param mixed $statementDescriptor
     * @return WirecardPaymentCreditCard
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;
        return $this;
    }
}
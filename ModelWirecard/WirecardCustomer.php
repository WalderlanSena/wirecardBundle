<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 03:25
 */

namespace App\Bundles\WirecardBundle\ModelWirecard;

class WirecardCustomer
{
    private $ownId;
    private $fullName;
    private $email;
    private $birthDate;
    private $taxDocument;
    private $phone;
    private $addressType;
    private $addressStreet;
    private $addressNumber;
    private $addressCity;
    private $addressState;
    private $addressStateCod;
    private $addressZipCode;
    private $addressComplement;

    /**
     * @return mixed
     */
    public function getOwnId()
    {
        return $this->ownId;
    }

    /**
     * @param mixed $ownId
     * @return WirecardCustomer
     */
    public function setOwnId($ownId)
    {
        $this->ownId = $ownId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     * @return WirecardCustomer
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return WirecardCustomer
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return WirecardCustomer
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
     * @return WirecardCustomer
     */
    public function setTaxDocument($taxDocument)
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
     * @return WirecardCustomer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressType()
    {
        return $this->addressType;
    }

    /**
     * @param mixed $addressType
     * @return WirecardCustomer
     */
    public function setAddressType($addressType)
    {
        $this->addressType = $addressType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressStreet()
    {
        return $this->addressStreet;
    }

    /**
     * @param mixed $addressStreet
     * @return WirecardCustomer
     */
    public function setAddressStreet($addressStreet)
    {
        $this->addressStreet = $addressStreet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressNumber()
    {
        return $this->addressNumber;
    }

    /**
     * @param mixed $addressNumber
     * @return WirecardCustomer
     */
    public function setAddressNumber($addressNumber)
    {
        $this->addressNumber = $addressNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * @param mixed $addressCity
     * @return WirecardCustomer
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * @param mixed $addressState
     * @return WirecardCustomer
     */
    public function setAddressState($addressState)
    {
        $this->addressState = $addressState;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressStateCod()
    {
        return $this->addressStateCod;
    }

    /**
     * @param mixed $addressStateCod
     * @return WirecardCustomer
     */
    public function setAddressStateCod($addressStateCod)
    {
        $this->addressStateCod = $addressStateCod;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressZipCode()
    {
        return $this->addressZipCode;
    }

    /**
     * @param mixed $addressZipCode
     * @return WirecardCustomer
     */
    public function setAddressZipCode($addressZipCode)
    {
        $this->addressZipCode = $addressZipCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressComplement()
    {
        return $this->addressComplement;
    }

    /**
     * @param mixed $addressComplement
     * @return WirecardCustomer
     */
    public function setAddressComplement($addressComplement)
    {
        $this->addressComplement = $addressComplement;
        return $this;
    }
}
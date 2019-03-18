<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 18/03/19
 * Time: 13:51
 */

namespace App\Bundles\WirecardBundle\ModelWirecard;

class WirecardAddress
{
    private $type;
    private $street;
    private $number;
    private $district;
    private $city;
    private $state;
    private $zip;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return WirecardAddress
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     * @return WirecardAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return WirecardAddress
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     * @return WirecardAddress
     */
    public function setDistrict($district)
    {
        $this->district = $district;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return WirecardAddress
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return WirecardAddress
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     * @return WirecardAddress
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }
}
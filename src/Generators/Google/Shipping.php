<?php

namespace Mk\Feed\Generators\Google;

class Shipping
{

    private $country;
    private $name;
    private $price;
    private $currency;

    /**
     * @param $country
     * @param $name
     * @param $price
     */
    public function __construct($country, $name, $price, $currency = 'CZK')
    {
        $this->country = $country;
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed|string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

}

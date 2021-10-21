<?php

namespace Mk\Feed\Generators\Shoptet;


use Mk, Nette;

/**
 * Class Image
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 */
class Variant
{
    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    /** @var string */
    private $code;

    /** @var Parameter[] */
    protected $parameters = array();

    /** @var string */
    protected $vat;

    /** @var float */
    protected $weight;

    /** @var float @required */
    protected $priceVat;

    /** @var string */
    protected $availability;

    /**
     * @return string
     */
    public function getCode(): ?string {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Variant
     */
    public function setCode(?string $code): Variant {
        $this->code = $code;
        return $this;
    }

    /**
     * @return Parameter[]
     */
    public function getParameters(): array {
        return $this->parameters;
    }

    /**
     * @param Parameter[] $parameters
     * @return Variant
     */
    public function setParameters(array $parameters): Variant {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return string
     */
    public function getVat(): ?string {
        return $this->vat;
    }

    /**
     * @param string $vat
     * @return Variant
     */
    public function setVat(?string $vat): Variant {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return float
     */
    public function getWeight(): ?float {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return Variant
     */
    public function setWeight(?float $weight): Variant {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceVat(): float {
        return $this->priceVat;
    }

    /**
     * @param float $priceVat
     * @return Variant
     */
    public function setPriceVat(float $priceVat): Variant {
        $this->priceVat = $priceVat;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvailability(): ?string {
        return $this->availability;
    }

    /**
     * @param string $availability
     * @return Variant
     */
    public function setAvailability(?string $availability): Variant {
        $this->availability = $availability;
        return $this;
    }

    /**
     * @param $name
     * @param $val
     * @return Variant
     */
    public function addParameter($name, $val)
    {
        $this->parameters[] = new Parameter($name, $val);

        return $this;
    }




}

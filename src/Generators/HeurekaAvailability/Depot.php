<?php

namespace Mk\Feed\Generators\HeurekaAvailability;


use Mk, Nette;

/**
 * Class Image
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 */
class Depot
{
    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;



    /** @var string */
    private $id;
    /**
     * @var int
     */
    private $stock;

    /**
     * Image constructor.
     * @param string $url
     */
    public function __construct($id, int $stock)
    {
        $this->id = $id;
        $this->stock = $stock;
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStock(): int {
        return $this->stock;
    }





}

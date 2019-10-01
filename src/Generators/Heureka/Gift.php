<?php

namespace Mk\Feed\Generators\Heureka;

use Mk, Nette;

/**
 * Class Gift
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 */
class Gift {

    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    /** @var string */
    protected $name;

    /** @var int */
    protected $id;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * Gift constructor.
	 * @param $name
	 * @param null $id
	 */
    public function __construct($name, $id = null)
    {
		if($id) {
			$this->id = $id;
		}
        $this->name = (string)$name;
    }

}

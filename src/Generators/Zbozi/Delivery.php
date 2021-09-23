<?php

namespace Mk\Feed\Generators\Zbozi;

use Mk, Nette;

/**
 * Class Delivery
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 */
class Delivery{

    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    CONST CESKA_POSTA_NA_POSTU = 'CESKA_POSTA_NA_POSTU',
        CESKA_POSTA_BALIKOVNA = 'CESKA_POSTA_BALIKOVNA',
        DPD_PICKUP = 'DPD_PICKUP',
        GEIS_POINT = 'GEIS_POINT',
        GLS_PARCELSHOP = 'GLS_PARCELSHOP',
        PPL_PARCELSHOP = 'PPL_PARCELSHOP',
        TOPTRANS_DEPO = 'TOPTRANS_DEPO',
        ULOZENKA = 'ULOZENKA',
        ZASILKOVNA = 'ZASILKOVNA',
        VLASTNI_VYDEJNI_MISTA = 'VLASTNI_VYDEJNI_MISTA',
        CESKA_POSTA = 'CESKA_POSTA',
        DB_SCHENKER = 'DB_SCHENKER',
        DPD = 'DPD',
        DHL = 'DHL',
        DSV = 'DSV',
        FOFR = 'FOFR',
        GEBRUDER_WEISS = 'GEBRUDER_WEISS',
        GEIS = 'GEIS',
        GLS = 'GLS',
        HDS = 'HDS',
        WEDO_HOME = 'WEDO_HOME',
        MESSENGER = 'MESSENGER',
        PPL = 'PPL',
        TNT = 'TNT',
        TOPTRANS = 'TOPTRANS',
        UPS = 'UPS',
        FEDEX = 'FEDEX',
        RABEN_LOGISTICS = 'RABEN_LOGISTICS',
        VLASTNI_PREPRAVA = 'VLASTNI_PREPRAVA';

    static $ids = array(
        self::CESKA_POSTA_NA_POSTU,
        self::CESKA_POSTA_BALIKOVNA,
        self::DPD_PICKUP,
        self::GEIS_POINT,
        self::GLS_PARCELSHOP,
        self::PPL_PARCELSHOP,
        self::TOPTRANS_DEPO,
        self::ULOZENKA,
        self::ZASILKOVNA,
        self::VLASTNI_VYDEJNI_MISTA,
        self::CESKA_POSTA,
        self::DB_SCHENKER,
        self::DPD,
        self::DHL,
        self::DSV,
        self::FOFR,
        self::GEBRUDER_WEISS,
        self::GEIS,
        self::GLS,
        self::HDS,
        self::WEDO_HOME,
        self::MESSENGER,
        self::PPL,
        self::TNT,
        self::TOPTRANS,
        self::UPS,
        SELF::FEDEX,
        self::RABEN_LOGISTICS,
        self::VLASTNI_PREPRAVA
    );

    /** @var string */
    private $id;
    /** @var float */
    private $price;
    /** @var float|null */
    private $priceCod;

    /**
     * Delivery constructor.
     * @param $id
     * @param $price
     * @param null $priceCod
     */
    public function __construct($id, $price, $priceCod = null)
    {
        if (!in_array($id, self::$ids)) {
            throw new \InvalidArgumentException("Delivery with id $id doesn\t exist");
        }
        $this->id = (string) $id;
        $this->price = (float) $price;
        $this->priceCod = isset($priceCod) ? (float) $priceCod : null;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return float|null
     */
    public function getPriceCod()
    {
        return $this->priceCod;
    }

}

<?php

namespace Mk\Feed\Generators\Acra;

use Mk;
use Mk\Feed\Generators\BaseItem;

/**
 * Class Item
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 * @see http://sluzby.heureka.cz/napoveda/xml-feed/ Documentation
 */
class Item extends BaseItem
{

    /** @var string @required */
    protected $itemId;

    /** @var string @required */
    protected $productName;

    /** @var string|null */
    protected $product;

    /** @var string @required */
    protected $description;

    /**  @var string @required */
    protected $url;

    /** @var Image[] */
    protected $images = array();

    /** @var string|null */
    protected $videoUrl;

    /** @var float @required */
    protected $priceVat;

    /** @var float */
    protected $price;

    /** @var int */
    protected $vat;

    /** @var float */
    protected $priceWholesale;

    /** @var string|null */
    protected $itemType;

    /** @var Parameter[] */
    protected $parameters = array();

    /** @var string|null */
    protected $manufacturer;

    /** @var string|null */
    protected $categoryText;

    /** @var string|null */
    protected $ean;

    /** @var string|null */
    protected $itemGroupId;

    /** @var string|null */
    protected $customLabel;

    /** @var array */
    protected $accessories = array();

    /** @var Gift[] */
    protected $gifts = array();

    /** @var string[] */
    protected $specialServices = array();

    /** @var string|null */
    protected $metaTitle;

    /** @var string|null */
    protected $metaDescription;

    /** @var array */
    protected $downloads = array();



    /**
     * @return string
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * @param string $videoUrl
     * @return $this
     */
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function addImage($url)
    {
        $this->images[] = new Image($url);

        return $this;
    }

    /**
     * @param $name
     * @param $val
     * @param null $unit
     * @return Item
     */
    public function addParameter($name, $val, $unit = null, $percentage = null)
    {
        $this->parameters[] = new Parameter($name, $val, $unit, $percentage);

        return $this;
    }

    /**
     * @param $name
     * @param null $id
     * @return $this
     */
    public function addGift($name, $id = null)
    {
        $this->gifts[] = new Gift($name, $id);

        return $this;
    }

    /**
     * @param $itemId
     * @return $this
     */
    public function addAccessory($itemId)
    {
        $this->accessories[] = $itemId;

        return $this;
    }

    /**
     * @return array
     */
    public function getAccessories()
    {
        return $this->accessories;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return Item
     */
    public function setProductName($productName)
    {
        $this->productName = (string)$productName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Item
     */
    public function setUrl($url)
    {
        $this->url = (string)$url;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriceVat()
    {
        return $this->priceVat;
    }

    /**
     * @param float $priceVat
     * @return Item
     */
    public function setPriceVat($priceVat)
    {
        $this->priceVat = (float)$priceVat;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param null|string $itemId
     * @return Item
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param null|string $ean
     * @return Item
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getItemGroupId()
    {
        return $this->itemGroupId;
    }

    /**
     * @param null|string $itemGroupId
     * @return Item
     */
    public function setItemGroupId($itemGroupId)
    {
        $this->itemGroupId = $itemGroupId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param null|string $manufacturer
     * @return Item
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCategoryText()
    {
        return $this->categoryText;
    }

    /**
     * @param null|string $categoryText
     * @return Item
     */
    public function setCategoryText($categoryText)
    {
        $this->categoryText = $categoryText;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param null|string $product
     * @return Item
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getItemType()
    {
        return $this->itemType;
    }

    /**
     * @return Image[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return Gift[]
     */
    public function getGifts()
    {
        return $this->gifts;
    }

    /**
     * @return Parameter[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getCustomLabel(): ?string
    {
        return $this->customLabel;
    }

    public function setCustomLabel(?string $customLabel): void
    {
        $this->customLabel = $customLabel;
    }

    /**
     * @return string[]
     */
    public function getSpecialServices(): array
    {
        return $this->specialServices;
    }

    /**
     * @param string[] $specialServices
     */
    public function setSpecialServices(array $specialServices): void
    {
        $this->specialServices = $specialServices;
    }

    public function addService(string $service): void
    {
        if (count($this->specialServices) < 5) {
            $this->specialServices[] = $service;
        }
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(?string $metaTitle): void
    {
        $this->metaTitle = $metaTitle;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    public function addDownload(string $url)
    {
        $this->downloads[] = $url;

        return $this;
    }

    public function getDownloads(): array
    {
        return $this->downloads;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getVat(): int
    {
        return $this->vat;
    }

    public function setVat(int $vat): void
    {
        $this->vat = $vat;
    }

    public function getPriceWholesale(): float
    {
        return $this->priceWholesale;
    }

    public function setPriceWholesale(float $priceWholesale): void
    {
        $this->priceWholesale = $priceWholesale;
    }

}

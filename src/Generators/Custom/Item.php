<?php

namespace Mk\Feed\Generators\Custom;

use Mk, Nette;
use Mk\Feed\Generators\BaseItem;

/**
 * Class Item
 * @property itemId
 * @property heurekaCpc
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 * @see http://sluzby.heureka.cz/napoveda/xml-feed/ Documentation
 */
class Item extends BaseItem {

    /** @var string @required */
    protected $itemId;

    /** @var string @required */
    protected $productName;

    /** @var string|null */
    protected $product;

    /** @var bool */
    protected $status;

    /** @var string|null */
    protected $name;
    /** @var string |null*/
    protected $nameExt;
    /** @var string |null*/
    protected $descriptionShort;
    /** @var string |null*/
    protected $title;
    /** @var string|null */
    protected $metaDescription;
    /** @var string |null*/
    protected $metaKeywords;
    /** @var string |null*/
    protected $parts;
    /** @var float|null */
    protected $priceOriginal;
    /** @var int |null*/
    protected $soldQty;
    /** @var string |null*/
    protected $defaultCategory;
    /** @var float|null */
    protected $weight;
    /** @var float |null*/
    protected $cost;
    /** @var float |null*/
    protected $margin;
    /** @var bool|null */
    protected $freeDelivery;
    /** @var string|null */
    protected $model;
    /** @var bool */
    protected $inSale;
    /** @var bool */
    protected $archived;
    /** @var int |null*/
    protected $minQuantity;
    /** @var int|null */
    protected $maxQuantity;
    /** @var string|null */
    protected $guarantee;
    /** @var string |null*/
    protected $unit;
    /** @var string |null*/
    protected $vat;
    /** @var int |null*/
    protected $stock;
    /** @var string |null*/
    protected $sku;

    /** @var string[] */
    protected $suppliers;

    /** @var string | null */
    protected $availability;

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
    /** @var float  */
    protected $priceNoVat;

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
    protected $isbn;

    /** @var float|null */
    protected $heurekaCpc;

    /** @var \DateTime|int @required */
    protected $deliveryDate;

    /** @var Delivery[] */
    protected $deliveries = array();

    /** @var string|null */
    protected $itemGroupId;

    /** @var array */
    protected $accessories = array();

    /** @var float */
    protected $dues = 0;

    /** @var Gift[] */
    protected $gifts = array();

    /**
     * @return float
     */
    public function getDues()
    {
        return $this->dues;
    }

    /**
     * @param float $dues
     * @return Item
     */
    public function setDues($dues)
    {
        $this->dues = (float)$dues;

        return $this;
    }

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
     * @param $id
     * @param $price
     * @param null $priceCod
     * @return $this
     */
    public function addDelivery($id, $price, $priceCod = null)
    {
        $this->deliveries[] = new Delivery($id, $price, $priceCod);

        return $this;
    }

    /**
     * @return Delivery[]
     */
    public function getDeliveries()
    {
        return $this->deliveries;
    }

    /**
     * @param $name
     * @param $val
     * @param null $unit
     * @return Item
     */
    public function addParameter($name, $val, $unit = null)
    {
        $this->parameters[] = new Parameter($name, $val, $unit);

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function addGift($name)
    {
        $this->gifts[] = new Gift($name);

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
     * @return int|string
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate instanceof \DateTime ? $this->deliveryDate->format('Y-m-d') : $this->deliveryDate;
    }

    /**
     * @param int|\DateTime $deliveryDate
     * @return Item
     */
    public function setDeliveryDate($deliveryDate)
    {
        if (!is_int($deliveryDate) && !($deliveryDate instanceof \DateTime)) {
            throw new \InvalidArgumentException("Delivery date must be integer or DateTime");
        }
        $this->deliveryDate = $deliveryDate;

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
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param null|string $isbn
     * @return Item
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

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
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return null|string
     */
    public function getHeurekaCpc()
    {
        return $this->heurekaCpc;
    }

    /**
     * @param null|string $heurekaCpc
     * @return $this
     */
    public function setHeurekaCpc($heurekaCpc)
    {
        $this->heurekaCpc = $heurekaCpc;

        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus(): ?bool {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return Item
     */
    public function setStatus(bool $status): Item {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Item
     */
    public function setName(?string $name): Item {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNameExt(): ?string {
        return $this->nameExt;
    }

    /**
     * @param null|string $nameExt
     * @return Item
     */
    public function setNameExt(?string $nameExt): Item {
        $this->nameExt = $nameExt;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescriptionShort(): ?string {
        return $this->descriptionShort;
    }

    /**
     * @param null|string $descriptionShort
     * @return Item
     */
    public function setDescriptionShort(?string $descriptionShort): Item {
        $this->descriptionShort = $descriptionShort;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * @param null|string $title
     * @return Item
     */
    public function setTitle(?string $title): Item {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMetaDescription(): ?string {
        return $this->metaDescription;
    }

    /**
     * @param null|string $metaDescription
     * @return Item
     */
    public function setMetaDescription(?string $metaDescription): Item {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMetaKeywords(): ?string {
        return $this->metaKeywords;
    }

    /**
     * @param null|string $metaKeywords
     * @return Item
     */
    public function setMetaKeywords(?string $metaKeywords): Item {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getParts(): ?string {
        return $this->parts;
    }

    /**
     * @param null|string $parts
     * @return Item
     */
    public function setParts(?string $parts): Item {
        $this->parts = $parts;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPriceOriginal(): ?float {
        return $this->priceOriginal;
    }

    /**
     * @param float|null $priceOriginal
     * @return Item
     */
    public function setPriceOriginal(?float $priceOriginal): Item {
        $this->priceOriginal = $priceOriginal;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldQty(): ?int {
        return $this->soldQty;
    }

    /**
     * @param int|null $soldQty
     * @return Item
     */
    public function setSoldQty(?int $soldQty): Item {
        $this->soldQty = $soldQty;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDefaultCategory(): ?string {
        return $this->defaultCategory;
    }

    /**
     * @param null|string $defaultCategory
     * @return Item
     */
    public function setDefaultCategory(?string $defaultCategory): Item {
        $this->defaultCategory = $defaultCategory;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     * @return Item
     */
    public function setWeight(?float $weight): Item {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getCost(): ?float {
        return $this->cost;
    }

    /**
     * @param float|null $cost
     * @return Item
     */
    public function setCost(?float $cost): Item {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getMargin(): ?float {
        return $this->margin;
    }

    /**
     * @param float|null $margin
     * @return Item
     */
    public function setMargin(?float $margin): Item {
        $this->margin = $margin;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFreeDelivery(): ?bool {
        return $this->freeDelivery;
    }

    /**
     * @param bool|null $freeDelivery
     * @return Item
     */
    public function setFreeDelivery(?bool $freeDelivery): Item {
        $this->freeDelivery = $freeDelivery;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getModel(): ?string {
        return $this->model;
    }

    /**
     * @param null|string $model
     * @return Item
     */
    public function setModel(?string $model): Item {
        $this->model = $model;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInSale(): ?bool {
        return $this->inSale;
    }

    /**
     * @param bool $inSale
     * @return Item
     */
    public function setInSale(bool $inSale): Item {
        $this->inSale = $inSale;
        return $this;
    }

    /**
     * @return bool
     */
    public function isArchived(): bool {
        return $this->archived;
    }

    /**
     * @param bool $archived
     * @return Item
     */
    public function setArchived(bool $archived): Item {
        $this->archived = $archived;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinQuantity(): ?int {
        return $this->minQuantity;
    }

    /**
     * @param int|null $minQuantity
     * @return Item
     */
    public function setMinQuantity(?int $minQuantity): Item {
        $this->minQuantity = $minQuantity;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxQuantity(): ?int {
        return $this->maxQuantity;
    }

    /**
     * @param int|null $maxQuantity
     * @return Item
     */
    public function setMaxQuantity(?int $maxQuantity): Item {
        $this->maxQuantity = $maxQuantity;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getGuarantee(): ?string {
        return $this->guarantee;
    }

    /**
     * @param null|string $guarantee
     * @return Item
     */
    public function setGuarantee(?string $guarantee): Item {
        $this->guarantee = $guarantee;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUnit(): ?string {
        return $this->unit;
    }

    /**
     * @param null|string $unit
     * @return Item
     */
    public function setUnit(?string $unit): Item {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAvailability(): ?string {
        return $this->availability;
    }

    /**
     * @param null|string $availability
     * @return Item
     */
    public function setAvailability(?string $availability): Item {
        $this->availability = $availability;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getVat(): ?string {
        return $this->vat;
    }

    /**
     * @param null|string $vat
     * @return Item
     */
    public function setVat(?string $vat): Item {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStock(): ?int {
        return $this->stock;
    }

    /**
     * @param int|null $stock
     * @return Item
     */
    public function setStock(?int $stock): Item {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceNoVat(){
        return $this->priceNoVat;
    }

    /**
     * @param float $priceNoVat
     * @return Item
     */
    public function setPriceNoVat(float $priceNoVat): Item {
        $this->priceNoVat = $priceNoVat;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSku(): ?string {
        return $this->sku;
    }

    /**
     * @param null|string $sku
     * @return Item
     */
    public function setSku(?string $sku): Item {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getSuppliers(): ?array {
        return $this->suppliers;
    }

    /**
     * @param string[] $supplier
     * @return Item
     */
    public function addSupplier(string $supplier): Item {
        $this->suppliers[] = $supplier;
        return $this;
    }





}

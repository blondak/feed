<?php

namespace Mk\Feed\Generators\Custom;

use Nette\Caching\Cache;
use Nette\Caching\IStorage;

class CategoriesHelper {

    CONST CATEGORY_URL = 'http://www.heureka.cz/direct/xml-export/shops/heureka-sekce.xml';

    /** @var \Nette\Caching\Cache */
    private $cache;

    function __construct(?IStorage $storage = null)
    {
        if ($storage) {
            $this->cache = new Cache($storage, __CLASS__);
        }
    }

    public function getCategories()
    {
        $categories = array();
        if (!$this->cache || !($categories = $this->cache->load('categories'))) {
            $xml = file_get_contents(self::CATEGORY_URL);
            $dom = new \DOMDocument();

            $dom->loadXML($xml);
            $xpath = new \DOMXPath($dom);
            /** @var \DOMElement[] $_categories */
            $_categories = $xpath->query(".//CATEGORY");

            foreach ($_categories as $category) {
                $categoryIdElement = $xpath->query($category->getNodePath().'/CATEGORY_ID');
                $id = isset($categoryIdElement[0]) ? (int)$categoryIdElement[0]->nodeValue : null;
                
                $categoryFullNameElement = $xpath->query($category->getNodePath().'/CATEGORY_FULLNAME');
                $_cat = isset($categoryFullNameElement[0]) ? (string)$categoryFullNameElement[0]->nodeValue : null;
                
                if($id && $_cat) {
                    $_cat = str_replace('Heureka.cz | ', '', $_cat);
                    $categories[$id] = $_cat;
                }
            }

            asort($categories);

            if ($this->cache) {
                $this->cache->save('categories', $categories);
            }
        }

        return $categories;
    }
}
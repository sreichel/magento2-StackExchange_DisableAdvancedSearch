<?php
/**
 * SR-Module
 *
 * @author   Sven Reichel <github-sr@hotmail.com>
 * @category StackExchange
 * @package  StackExchange_DisableAdvancedSearch
 */

/**
 * Observer Model
 */
namespace StackExchange\DisableAdvancedSearch\Observer;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class DisableAdvancedSearch
 * @package StackExchange\DisableAdvancedSearch\Observer
 */
class DisableAdvancedSearch implements ObserverInterface
{
    const CONFIG_ADVANCED_SEARCH_ENABLE = 'catalog/search/enable_advanced_search';

    const CONFIG_DEFAULT_NO_ROUTE = 'web/default/cms_no_route';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfigInterface;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    public function __construct(
        ScopeConfigInterface $scopeConfigInterface,
        UrlInterface $urlInterface
    ) {
        $this->scopeConfigInterface = $scopeConfigInterface;
        $this->urlBuilder = $urlInterface;
    }

    /**
     * Disable Advanced Search at storeview scope
     *
     * @param  Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->scopeConfigInterface->isSetFlag(self::CONFIG_ADVANCED_SEARCH_ENABLE, ScopeInterface::SCOPE_STORE)) {
            $path = $this->scopeConfigInterface->getValue(self::CONFIG_DEFAULT_NO_ROUTE, ScopeInterface::SCOPE_STORE);
            $observer->getControllerAction()->getResponse()->setRedirect($this->urlBuilder->getUrl($path));
        }
    }
}

<?php
/**
 * SR-Module
 *
 * @author      Sven Reichel <github-sr@hotmail.com>
 * @category    StackExchange
 * @package     StackExchange_DisableAdvancedSearch
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

class DisableAdvancedSearch implements ObserverInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfigInterface;
    protected $urlBuilder;

    public function __construct(
        ScopeConfigInterface $configScopeConfigInterface,
        UrlInterface $urlInterface
    )
    {
        $this->_scopeConfigInterface = $configScopeConfigInterface;
        $this->urlBuilder = $urlInterface;
    }

    /**
     * Disable Advanced Search at storeview scope
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->_scopeConfigInterface->isSetFlag('catalog/search/enable_advanced_search', ScopeInterface::SCOPE_STORE)) {
            $path = $this->_scopeConfigInterface->getValue('web/default/cms_no_route', ScopeInterface::SCOPE_STORE);
            $observer->getControllerAction()->getResponse()->setRedirect($this->urlBuilder->getUrl($path));
        }
    }
}

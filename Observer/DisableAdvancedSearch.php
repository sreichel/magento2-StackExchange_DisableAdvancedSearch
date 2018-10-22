<?php
/**
 * Magento2-Module
 *
 * @author   Sven Reichel <github-sr@hotmail.com>
 * @category StackExchange
 * @package  StackExchange_DisableAdvancedSearch
 */

declare(strict_types=1);

namespace StackExchange\DisableAdvancedSearch\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;
use StackExchange\DisableAdvancedSearch\Helper\Data as Helper;

/**
 * Class DisableAdvancedSearch
 * @package StackExchange\DisableAdvancedSearch\Observer
 */
class DisableAdvancedSearch implements ObserverInterface
{
    /**
     * @var Helper
     */
    protected $helper;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * DisableAdvancedSearch constructor.
     * @param Helper $helper
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        Helper $helper,
        UrlInterface $urlBuilder
    ) {
        $this->helper = $helper;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Disable Advanced Search at storeview scope
     *
     * @param  Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $path = $this->helper->getRedirectPath();
        if ($path) {
            $observer->getControllerAction()
                ->getResponse()
                ->setRedirect($this->urlBuilder->getUrl($path));
        }
    }
}

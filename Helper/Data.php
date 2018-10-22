<?php
/**
 * Magento2-Module
 *
 * @author   Sven Reichel <github-sr@hotmail.com>
 * @category StackExchange
 * @package  StackExchange_DisableAdvancedSearch
 */

declare(strict_types=1);

namespace StackExchange\DisableAdvancedSearch\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 * @package StackExchange\DisableAdvancedSearch\Helper
 * @SuppressWarnings(PHPMD.CamelCasePropertyName)
 */
class Data extends AbstractHelper
{
    /**
     * Config path to disable advanced search
     */
    const CONFIG_ADVANCED_SEARCH_ENABLE = 'catalog/search/enable_advanced_search';

    /**
     * Config path to no-route setting
     */
    const CONFIG_DEFAULT_NO_ROUTE = 'web/default/cms_no_route';

    /**
     * Helper module name
     *
     * @var string
     */
    protected $_moduleName = 'StackExchange_DisableAdvancedSearch'; //phpcs:ignore

    /**
     * Get redirect path from config
     *
     * @return string
     */
    public function getRedirectPath(): string
    {
        $enabled = $this->scopeConfig->isSetFlag(
            self::CONFIG_ADVANCED_SEARCH_ENABLE,
            ScopeInterface::SCOPE_STORE
        );

        $path = $this->scopeConfig->getValue(
            self::CONFIG_DEFAULT_NO_ROUTE,
            ScopeInterface::SCOPE_STORE
        );

        return (!$enabled && $path) ? $path : '';
    }
}

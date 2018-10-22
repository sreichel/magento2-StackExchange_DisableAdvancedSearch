<?php
/**
 * Magento2-Module
 *
 * @author   Sven Reichel <github-sr@hotmail.com>
 * @category StackExchange
 * @package  StackExchange_DisableAdvancedSearch
 */

declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'StackExchange_DisableAdvancedSearch',
    __DIR__
);

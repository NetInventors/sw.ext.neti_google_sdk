<?php
/**
 * @copyright  Copyright (c) 2017, Net Inventors GmbH
 * @category   Shopware
 * @author     hrombach
 */

namespace NetiGoogleSdk;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NetiGoogleSdk extends Plugin
{
    public const MINIMUM_SDK_VERSION  = '2.0.0';
    public const BREAKING_SDK_VERSION = '2.1.0';

    public function build(ContainerBuilder $container)
    {
        $container->setParameter('neti_google_sdk.vendor_dir', $this->getPath() . '/vendor');

        parent::build($container);
    }

}
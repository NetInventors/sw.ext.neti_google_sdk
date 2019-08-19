<?php
/**
 * @copyright  Copyright (c) 2017, Net Inventors GmbH
 * @category   Shopware
 * @author     hrombach
 */

namespace NetiGoogleSdk\Service;

use NetiGoogleSdk\Exceptions\GoogleSdkFactoryException;
use NetiGoogleSdk\NetiGoogleSdk;

class GoogleSdkFactory
{
    /**
     * @var \Google_Client[]
     */
    private static $clients;

    /**
     * @var string
     */
    private $vendorPath;

    /**
     * SdkFactory constructor.
     *
     * @param string $vendorPath
     */
    public function __construct($vendorPath)
    {
        $this->vendorPath = $vendorPath;
    }

    /**
     * @param string      $applicationName
     * @param string      $developerKey
     * @param array       $config
     * @param string|null $cacheKey
     *
     * @return \Google_Client
     *
     * @throws GoogleSdkFactoryException
     */
    public function getClient($applicationName, $developerKey, array $config = [], $cacheKey = null): \Google_Client
    {
        $this->loadLibrary();

        $config += [
            'application_name' => $applicationName,
            'developer_key'    => $developerKey,
        ];

        $cacheKey = $cacheKey ?? $developerKey;

        $client = self::$clients[$cacheKey];

        if (!$client instanceof \Google_Client) {
            $client = self::$clients[$cacheKey] = new \Google_Client($config);
        }

        return $client;
    }

    /**
     * @return bool
     *
     * @throws GoogleSdkFactoryException
     */
    private function loadLibrary(): bool
    {
        if (!class_exists('Google_Client')) {
            require_once $this->vendorPath . '/autoload.php';
        } elseif (!$this->assertCompatible()) {
            throw new GoogleSdkFactoryException(
                sprintf(
                    'Loaded Google Client version "%s" is incompatible with required version "%s".',
                    \Google_Client::LIBVER, NetiGoogleSdk::MINIMUM_SDK_VERSION
                )
            );
        }

        return true;
    }

    /**
     * @return bool
     */
    private function assertCompatible(): bool
    {
        return (
            version_compare(\Google_Client::LIBVER, NetiGoogleSdk::MINIMUM_SDK_VERSION, '>=') &&
            version_compare(\Google_Client::LIBVER, NetiGoogleSdk::BREAKING_SDK_VERSION, '<=')
        );
    }
}
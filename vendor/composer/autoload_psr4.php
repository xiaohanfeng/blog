<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'think\\view\\driver\\' => array($vendorDir . '/topthink/think-view/src'),
    'think\\trace\\' => array($vendorDir . '/topthink/think-trace/src'),
    'think\\app\\' => array($vendorDir . '/topthink/think-multi-app/src'),
    'think\\' => array($vendorDir . '/topthink/think-helper/src', $vendorDir . '/topthink/think-orm/src', $vendorDir . '/topthink/framework/src/think', $vendorDir . '/topthink/think-template/src'),
    'app\\' => array($baseDir . '/app'),
    'Symfony\\Polyfill\\Php80\\' => array($vendorDir . '/symfony/polyfill-php80'),
    'Symfony\\Polyfill\\Php72\\' => array($vendorDir . '/symfony/polyfill-php72'),
    'Symfony\\Polyfill\\Mbstring\\' => array($vendorDir . '/symfony/polyfill-mbstring'),
    'Symfony\\Component\\VarDumper\\' => array($vendorDir . '/symfony/var-dumper'),
    'React\\Promise\\' => array($vendorDir . '/react/promise/src'),
    'Psr\\SimpleCache\\' => array($vendorDir . '/psr/simple-cache/src'),
    'Psr\\Log\\' => array($vendorDir . '/psr/log/Psr/Log'),
    'Psr\\Container\\' => array($vendorDir . '/psr/container/src'),
    'Psr\\Cache\\' => array($vendorDir . '/psr/cache/src'),
    'League\\MimeTypeDetection\\' => array($vendorDir . '/league/mime-type-detection/src'),
    'League\\Flysystem\\Cached\\' => array($vendorDir . '/league/flysystem-cached-adapter/src'),
    'League\\Flysystem\\' => array($vendorDir . '/league/flysystem/src'),
    'GuzzleHttp\\Stream\\' => array($vendorDir . '/ezimuel/guzzlestreams/src'),
    'GuzzleHttp\\Ring\\' => array($vendorDir . '/ezimuel/ringphp/src'),
    'Elasticsearch\\' => array($vendorDir . '/elasticsearch/elasticsearch/src/Elasticsearch'),
);

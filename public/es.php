<?php

namespace think;
require __DIR__ . '/../vendor/autoload.php';
use Elasticsearch\ClientBuilder;

class Indextest
{

    public function elasticsearch()
    {
        echo phpinfo();die();
        $hosts = ['49.235.236.47:9200'];//本地使用localhost  也可指定IP
        $client = ClientBuilder::create()->setHosts($hosts)->build();
        $params = [
            'index' => 'accounts',
            'type' => 'person',
            'id' => 1,
            'client' => ['ignore' => 404]
        ];
        print_r($client->get($params));
    }
}

$test = new Indextest();

$test->elasticsearch();
<?php

use Clue\React\Soap\Client;
use Clue\React\Soap\Factory;
use Clue\React\Soap\Proxy;
use Clue\React\Soap\RequestException;
use Clue\React\Soap\Response;

require __DIR__ . '/../vendor/autoload.php';

$loop = React\EventLoop\Factory::create();
$factory = new Factory($loop);

$blz = isset($argv[1]) ? $argv[1] : '12070000';

$factory->createClient('http://www.thomas-bayer.com/axis2/services/BLZService?wsdl')->then(function (Client $client) use ($blz) {
    //var_dump($client->getFunctions(), $client->getTypes());

    $api = new Proxy($client);

    $api->getBank(['blz' => $blz])->then(
        function (Response $response) {
            echo 'SUCCESS!' . PHP_EOL;
            var_dump((string)$response->getRequest()->getBody());
            var_dump((string)$response->getResponse()->getBody());
            var_dump($response->getResult());
        },
        function (RequestException $e) {
            echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
            var_dump((string)$e->getRequest()->getBody());
        }
    );
});

$loop->run();

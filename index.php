<?php


$dataProvider = new \SkyEng\HttpDataProvider();
$dataProvider = new \SkyEng\CacheDataProviderDecorator($dataProvider, $simpleCache);
$dataProvider = new \SkyEng\LoggerDataProviderDecorator($dataProvider, $logger);

$request = (new SkyEng\Request\JsonDataRequest('http://api.service.ru'))
    ->setUrl('/api/v1/getUser')
    ->setJsonContent(['id' => 1]);

/** @var \SkyEng\Response\JsonDataResponse $response */
$response = $dataProvider->getData($request);

$logger->info($response->getJsonContent());
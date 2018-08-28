<?php

namespace SkyEng;

use Psr\SimpleCache\CacheInterface;
use SkyEng\Request\DataRequest;
use SkyEng\Response\DataResponse;

class CacheDataProviderDecorator implements DataProviderInterface
{
    private $dataProvider;
    private $cache;

    public function __construct(DataProviderInterface $dataProvider, CacheInterface $cache)
    {
        $this->dataProvider = $dataProvider;
        $this->cache = $cache;
    }

    public function getData(DataRequest $request): DataResponse
    {
        $cacheString = md5($request->__toString());

        if ($this->cache->has($cacheString)) {
            return $this->cache->get($cacheString);
        }

        $response = $this->dataProvider->getData($request);
        $this->cache->set($cacheString, $response);

        return $response;
    }
}
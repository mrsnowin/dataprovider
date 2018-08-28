<?php

namespace SkyEng;


use SkyEng\Request\DataRequest;
use SkyEng\Response\DataResponse;

class HttpDataProvider implements DataProviderInterface
{
    public function getData(DataRequest $request): DataResponse
    {
        /** получение данных с помощью curl/guzzle/... из внешнего сервиса */

        $responseClass = $request->getResponseClass();
        return new $responseClass($request, $headers, $content);
    }
}
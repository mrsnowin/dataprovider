<?php

namespace SkyEng;


use SkyEng\Request\DataRequest;
use SkyEng\Response\DataResponse;

interface DataProviderInterface
{
    public function getData(DataRequest $request): DataResponse;
}
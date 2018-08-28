<?php

namespace SkyEng;

use Psr\Log\LoggerInterface;
use SkyEng\Request\DataRequest;
use SkyEng\Response\DataResponse;


class LoggerDataProviderDecorator implements DataProviderInterface
{
    private $dataProvider;
    private $logger;

    /**
     * @param DataProviderInterface $dataProvider
     * @param LoggerInterface $logger
     */
    public function __construct(DataProviderInterface $dataProvider, LoggerInterface $logger)
    {
        $this->dataProvider = $dataProvider;
        $this->logger = $logger;
    }

    /**
     * @param DataRequest $request
     * @return DataResponse
     * @throws \Exception
     */
    public function getData(DataRequest $request): DataResponse
    {
        try {
            $response = $this->dataProvider->getData($request);
        } catch (\Exception $e) {
            $this->logger->critical($e->getMessage());
            throw $e;
        }

        return $response;
    }
}
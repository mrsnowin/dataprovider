<?php

namespace SkyEng\Response;


use SkyEng\Request\DataRequest;

class DataResponse
{
    /** @var DataRequest */
    private $request;

    /** @var array */
    private $headers = [];

    /** @var string */
    private $content = '';

    public function __construct(DataRequest $request, $headers, $content)
    {
        $this->request = $request;
        $this->headers = $headers;
        $this->content = $content;
    }

    /**
     * @return DataRequest
     */
    public function getRequest(): DataRequest
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
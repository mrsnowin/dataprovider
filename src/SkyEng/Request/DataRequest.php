<?php

namespace SkyEng\Request;


use SkyEng\Response\DataResponse;

class DataRequest
{
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';

    private $methods = [self::METHOD_POST, self::METHOD_GET];

    /** @var [] */
    private $headers = [];

    /** @var string */
    private $content;

    /** @var string */
    private $url = '';

    /** @var string */
    private $host;

    /** @var string */
    private $method = self::METHOD_GET;

    /** @var string */
    protected $responseClass = DataResponse::class;

    /**
     * @param String $host
     */
    public function __construct(String $host)
    {
        $this->host = $host;
    }

    /**
     * @param string $url
     *
     * @return DataRequest
     */
    public function setUrl(String $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return DataRequest
     */
    public function setHeader(String $name, String $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
    * @param string $content
    *
    * @return DataRequest
    */
    public function setContent(String $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param string $method
     *
     * @throws \InvalidArgumentException
     * @return DataRequest
     */
    public function setMethod(String $method)
    {
        if (!in_array($method, $this->methods)) {
            throw new \InvalidArgumentException();
        }

        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getResponseClass(): string
    {
        return $this->responseClass;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode('|', get_object_vars($this));
    }

}
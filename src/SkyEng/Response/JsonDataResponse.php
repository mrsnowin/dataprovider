<?php

namespace SkyEng\Response;


class JsonDataResponse extends DataResponse
{
    /**
     * @return mixed
     */
    public function getJsonContent()
    {
        return json_decode(parent::getContent());
    }
}
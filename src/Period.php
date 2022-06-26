<?php

namespace Borisey\RussianParliamentApi;

class Period extends BaseRequest
{
    const TYPE = 'periods';

    public function getPeriods($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
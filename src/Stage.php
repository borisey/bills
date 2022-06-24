<?php

namespace Borisey\RussianParliamentApi;

class Stage extends BaseRequest
{
    const TYPE = 'stages';

    public function getStages($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
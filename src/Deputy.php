<?php

namespace Borisey\RussianParliamentApi;

class Deputy extends BaseRequest
{
    const TYPE = 'deputies';

    public function getDeputies($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
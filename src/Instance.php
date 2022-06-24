<?php

namespace Borisey\RussianParliamentApi;

class Instance extends BaseRequest
{
    const TYPE = 'instances';

    public function getInstances($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
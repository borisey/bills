<?php

namespace Borisey\RussianParliamentApi;

class Topic extends BaseRequest
{
    const TYPE = 'topics';

    public function getTopics($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
<?php

namespace Borisey\RussianParliamentApi;

class Committee extends BaseRequest
{
    const TYPE = 'committees';

    public function getCommittees($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
<?php

namespace Borisey\RussianParliamentApi;

class FederalOrgans extends BaseRequest
{
    const TYPE = 'federal-organs';

    public function getFederalOrgans($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
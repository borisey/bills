<?php

namespace Borisey\RussianParliamentApi;

class Deputy extends BaseRequest
{
    const DEPUTIES_TYPE = 'deputies';
    const DEPUTY_TYPE   = 'deputy';

    public function getDeputies($parliament) {
        $url = $this->getRequestUrl($parliament, self::DEPUTIES_TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    public function getDeputy($parliament, $deputyId) {
        $url = $this->getDeputyRequestUrl($parliament, self::DEPUTY_TYPE, $deputyId);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
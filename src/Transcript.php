<?php

namespace Borisey\RussianParliamentApi;

class Transcript extends BaseRequest
{
    const TYPE = 'transcript';

    public function getTranscript($parliament, $billNumber) {
        $url = $this->getTransctiptRequestUrl($parliament, self::TYPE, $billNumber);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
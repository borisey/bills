<?php

namespace Borisey\RussianParliamentApi;

class Transcript extends BaseRequest
{
    const TYPE = [
        'bill'       => 'transcript',
        'resolution' => 'transcriptResolution',
        'date'       => 'transcriptFull',
    ];

    public function getTranscriptBill($parliament, $billNumber) {
        $url = $this->getTransctiptRequestUrl($parliament, self::TYPE['bill'], $billNumber);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    public function getTranscriptResolution($parliament, $resolutionNumber) {
        $url = $this->getTransctiptRequestUrl($parliament, self::TYPE['resolution'], $resolutionNumber);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    public function getTranscriptDate($parliament, $date) {
        $url = $this->getTransctiptRequestUrl($parliament, self::TYPE['date'], $date);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
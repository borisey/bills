<?php

namespace Borisey\RussianParliamentApi;

class Question extends BaseRequest
{
    const TYPE = 'questions';

    public function getQuestions($parliament) {
        $url = $this->getRequestUrl($parliament, self::TYPE);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
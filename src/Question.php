<?php

namespace Borisey\RussianParliamentApi;

class Question extends BaseRequest
{
    const TYPE = 'questions';

    public function getQuestions($parliament, $page) {
        $url = $this->getRequestUrl($parliament, self::TYPE, null, null, null, $page);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }
}
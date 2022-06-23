<?php

namespace Borisey\RussianParliamentApi;

use \Borisey\RussianParliamentApi\Topic;

class Parliament
{
    public $token;
    public $appToken;
    public $billService;

    public $topic;

    public function __construct()
    {
        $this->topic = new Topic;
    }

    public function setAccessTokens($token, $appToken): Parliament
    {
        $this->token    = $token;
        $this->appToken = $appToken;

        return $this;
    }

    public function getTopics()
    {
        return $this->topic->getTopics($this);

    }

    public function getBills($lawNumber = null, $searchMode, $stage, $page = 1) {
        $url = $this->getRequestUrl($lawNumber, $searchMode, $stage, $page);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    public function getBill($lawNumber)
    {
        $url = $this->getRequestUrl($lawNumber, 1, 1);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    protected function getRequestUrl($lawNumber = null, $searchMode, $stage, $page = 1)
    {
        return 'http://api.duma.gov.ru/api/' . $this->token
            . '/search.json?app_token=' . $this->appToken
            . (isset($lawNumber) ? "&number=" . $lawNumber : '')
            . '&search_mode=' . $searchMode
            . '&stage=' . $stage
            . '&page=' . $page;
    }

    protected function getContents($url)
    {
        return file_get_contents($url);
    }
}
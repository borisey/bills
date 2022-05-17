<?php

namespace Borisey\RussianParliamentApi;

class Parliament
{
    public $token;
    public $appToken;
    public $billService;

    public function setAccessTokens($token, $appToken): Parliament
    {
        $this->token    = $token;
        $this->appToken = $appToken;

        return $this;
    }

    public function getBills() {
        $url = $this->getRequestUrl(null, 1, 1);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    public function getBill($lawNumber)
    {
        $url = $this->getRequestUrl($lawNumber, 1, 1);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    private function getRequestUrl($lawNumber = null, $searchMode, $stage)
    {
        return 'http://api.duma.gov.ru/api/' . $this->token
            . '/search.json?app_token=' . $this->appToken
            . (isset($lawNumber) ? "&number=" . $lawNumber : '')
            . '&search_mode=' . $searchMode
            . '&stage=' . $stage;
    }

    private function getContents($url)
    {
        return file_get_contents($url);
    }
}
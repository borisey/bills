<?php

namespace Borisey\RussianParliamentApi;

class Parliament
{
    public $token;
    public $appToken;

    public function setAccessTokens($token, $appToken): Parliament
    {
        $this->token    = $token;
        $this->appToken = $appToken;

        return $this;
    }

    public function showData()
    {
        return 123;
    }

    public function getBills() {
        ob_start();

        $config = array(
            "token"     => $this->token,
            "app_token" => $this->appToken,
            "status" => "1",
            "page" => 1,
        );

        $url = "http://api.duma.gov.ru/api/$config[token]/search.json?app_token=$config[app_token]&status=$config[status]&page=$config[page]";

        $get_bills = file_get_contents($url);

        return json_decode($get_bills,true);
    }


    public function getBill($lawNumber)
    {

        $url_bills = $this->getRequestUrl($lawNumber, 1, 1);
        $get_bills = file_get_contents($url_bills);

        return json_decode($get_bills,true);
    }


    private function getRequestUrl($lawNumber = null, $searchMode, $stage)
    {
        return 'http://api.duma.gov.ru/api/' . $this->token
            . '/search.json?app_token=' . $this->appToken
            . (isset($lawNumber) ? "&number=" . $lawNumber : '')
            . '&search_mode=' . $searchMode
            . '&stage=' . $stage;
    }
}

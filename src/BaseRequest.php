<?php

namespace Borisey\RussianParliamentApi;

class BaseRequest
{
    protected function getRequestUrl(
        $parliament,
        $type,
        $lawNumber = false,
        $searchMode = false,
        $stage = false,
        $page = false
    )
    {
        return 'http://api.duma.gov.ru/api/' . $parliament->token
            . "/{$type}.json?app_token=" . $parliament->appToken
            . (($lawNumber) ? "&number=" . $lawNumber : '')
            . (($searchMode) ? '&search_mode=' . $searchMode : '')
            . (($stage) ? '&stage=' . $stage : '')
            . (($page) ? '&page=' . $page : '');
    }

    protected function getTransctiptRequestUrl($parliament, $type, $number, $kodvopr = false) {
        return 'http://api.duma.gov.ru/api/' . $parliament->token
            . "/{$type}/{$number}"
            . (($kodvopr) ? '/' . $kodvopr : '')
            . ".json?app_token=" . $parliament->appToken;
    }

    protected function getTransctiptRequestDeputyUrl(
        $parliament,
        $type,
        $deputyNumber = false,
        $dateFrom = false,
        $dateTo = false,
        $name = false,
        $page = false,
        $limit = false
    ) {
        return 'http://api.duma.gov.ru/api/' . $parliament->token
            . "/{$type}/{$deputyNumber}"
            . ".json?app_token=" . $parliament->appToken
            . (($dateFrom) ? '&dateFrom=' . $dateFrom : '')
            . (($dateTo) ? '&dateTo=' . $dateTo : '')
            . (($name) ? '&name=' . $name : '')
            . (($page) ? '&page=' . $page : '')
            . (($limit) ? '&limit=' . $limit : '');
    }

    protected function getDeputyRequestUrl($parliament, $type, $deputyId) {
        return 'http://api.duma.gov.ru/api/' . $parliament->token
            . "/{$type}.json?app_token=" . $parliament->appToken
            . "&id=" . $deputyId;
    }

    protected function getContents($url)
    {
        return file_get_contents($url);
    }
}
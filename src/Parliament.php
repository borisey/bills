<?php

namespace Borisey\RussianParliamentApi;

use \Borisey\RussianParliamentApi\{Topic, Deputy, FederalOrgans, RegionalOrgans, Committee, Stage, Instance};

class Parliament
{
    public $token;
    public $appToken;
    public $billService;

    public $topic;
    public $deputy;
    public $federalOrgans;
    public $regionalOrgans;
    public $committee;

    public function __construct()
    {
        $this->topic          = new Topic;
        $this->deputy         = new Deputy;
        $this->federalOrgans  = new FederalOrgans;
        $this->regionalOrgans = new RegionalOrgans;
        $this->committee      = new Committee;
        $this->stage          = new Stage;
        $this->instance       = new Instance;
    }

    public function setAccessTokens($token, $appToken): Parliament
    {
        $this->token    = $token;
        $this->appToken = $appToken;

        return $this;
    }

    public function getStages()
    {
        return $this->stage->getStages($this);
    }

    public function getInstances()
    {
        return $this->instance->getInstances($this);
    }

    public function getCommittees()
    {
        return $this->committee->getCommittees($this);
    }

    public function getDeputies()
    {
        return $this->deputy->getDeputies($this);
    }

    public function getTopics()
    {
        return $this->topic->getTopics($this);
    }

    public function getFederalOrgans()
    {
        return $this->federalOrgans->getFederalOrgans($this);
    }

    public function getRegionalOrgans()
    {
        return $this->regionalOrgans->getRegionalOrgans($this);
    }

    public function getBills($lawNumber = null, $searchMode, $stage, $status, $page = 1) {
        $url = $this->getRequestUrl($lawNumber, $searchMode, $stage, $status, $page);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    public function getBill($lawNumber)
    {
        $url = $this->getRequestUrl($lawNumber, 1, 1);
        $content = $this->getContents($url);

        return json_decode($content,true);
    }

    protected function getRequestUrl($lawNumber = null, $searchMode, $stage, $status = null, $page = 1)
    {
        return 'http://api.duma.gov.ru/api/' . $this->token
            . '/search.json?app_token=' . $this->appToken
            . (isset($lawNumber) ? "&number=" . $lawNumber : '')
            . (isset($status) ? "&status=" . $status : '')
            . '&search_mode=' . $searchMode
            . '&status=' . $status
            . '&stage=' . $stage
            . '&page=' . $page;
    }

    protected function getContents($url)
    {
        return file_get_contents($url);
    }
}
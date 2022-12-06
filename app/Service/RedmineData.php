<?php

namespace App\Service;

use Illuminate\Contracts\Config\Repository as ConfigContract;

class RedmineData
{
    private string $prefix;
    private string $key;

    /**
     * JavaGitUrl constructor.
     *
     * @param ConfigContract $conf
     */
    public function __construct(ConfigContract $conf)
    {
        $this->prefix = $conf->get('redmine.url');
        $this->key = $conf->get('redmine.key');
    }

    public function getPostUrl()
    {
        return $this->prefix;
    }

    public function getKey()
    {
        return $this->key;
    }
}

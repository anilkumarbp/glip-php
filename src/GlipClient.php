<?php

namespace Glip\SDK;


use Glip\SDK\Posts;
use Glip\SDK\Persons;
use Glip\SDK\Groups;
use RingCentral\SDK\SDK;


class GlipClient
{

    private $rc;
    private $_posts;
    private $_groups;
    private $_companies;
    private $_persons;

    public function __construct($options)
    {
        $this->rc = new SDK($options['appKey'], $options['appSecret'], $options['server'], $options['appName'] = 'My Glip PHP Client', $options['appVersion'] = '1.0.0');
        $this->_posts = new Posts($this->rc);
        $this->_groups = new Groups($this->rc);
        $this->_persons = new Persons($this->rc);
        $this->_companies = new Companies($this->rc);

    }


    /**
     * @param $options
     * @return \RingCentral\SDK\Http\ApiResponse
     */
    public function authorize($options)
    {
        return $this->rc->platform()->login($options['username'], $options['extension'], $options['password']);
    }

    /**
     * @return stdClass
     */
    public function getToken()
    {
        return $this->rc->platform()->auth()->data();
    }

    /**
     * @return Posts
     */
    public function posts()
    {
        return $this->_posts;
    }

    /**
     * @return Groups
     */
    public function groups()
    {
        return $this->_groups;
    }

    /**
     * @return Persons
     */
    public function persons()
    {
        return $this->_persons;
    }

    /**
     * @return Companies
     */
    public function companies()
    {
        return $this->_companies;
    }


}
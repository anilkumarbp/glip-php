<?php

namespace Glip\SDK;

class Persons
{

    private $rc;

    public function __construct($rc)
    {
        $this->rc = $rc;
    }

    /**
     * @param $options
     * @return mixed
     */
    public function get($options)
    {
        if($options && $options['personId'])
        {
            return $this->rc->platform()->get('/glip/persons/'.$options['personId']);
        }
        else
        {
            return null;
        }
    }

    // TODO : Implement Call-back for the subscription method (( Preferrably WEBHOOKS ))

}
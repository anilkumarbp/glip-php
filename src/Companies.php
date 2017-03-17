<?php

namespace Glip\SDK;

class Companies
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
        if($options && $options['companyId'])
        {
            return $this->rc->platform()->get('/glip/companies/'.$options['companyId']);
        }
        else
        {
            return null;
        }
    }

    // TODO : Implement Call-back for the subscription method (( Preferrably WEBHOOKS ))

}



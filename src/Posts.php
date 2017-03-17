<?php

namespace Glip\SDK;

use RingCentral\SDK\SDK;
use RingCentral\SDK\Platform\Platform;

class Posts
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
    public function post($options)
    {
        return $this->rc->platform()->post('/glip/posts', $options);
    }

    /**
     * @param $options
     * @return mixed
     */
    public function get($options)
    {
        if($options && $options['postId'])
        {
            return $this->rc->platform()->get('/glip/posts/'.$options['postId']);
        }
        else
        {
            return $this->rc->platform()->get('/glip/posts', $options);
        }
    }


    // TODO : Implement Call-back for the subscription method (( Preferrably WEBHOOKS ))

}
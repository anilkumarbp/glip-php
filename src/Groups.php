<?php

namespace Glip\SDK;

class Groups
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
        if($options && $options['postId'])
        {
            return $this->rc->platform()->get('/glip/groups/'.$options['groupId']);
        }
        else
        {
            return $this->rc->platform()->get('/glip/groups', $options);
        }
    }

    public function get1()
    {
        return $this->rc->platform()->get('/glip/posts');
    }

    public function getGroupRC()
    {
        return $this->rc;
    }

    // TODO : Implement Call-back for the subscription method (( Preferrably WEBHOOKS ))

}



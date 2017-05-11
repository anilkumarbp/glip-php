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
    public function get($options=null)
    {
        if($options && $options['postId'])
        {
            return $this->rc->platform()->get('/glip/groups/'.$options['groupId']);
        }
        else
        {
            print 'the platform is logged in :' . PHP_EOL . print_r($this->rc->platform()->auth());
            return $this->rc->platform()->get('/glip/groups');
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



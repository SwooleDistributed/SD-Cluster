<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13
 * Time: 13:54
 */

namespace app\Controllers;


use Server\CoreBase\Controller;

class CEvent extends Controller
{
    /**
     * @throws \Exception
     */
    public function onConnect()
    {
        get_instance()->protect($this->fd);
        $this->bindUid(time());
        $this->send($this->uid);
    }
    public function onClose()
    {

    }

    /**
     * @throws \Server\CoreBase\SwooleException
     */
    public function http_sendToAll()
    {
        $this->sendToAll("sendToAll");
        $this->http_output->end("ok");
    }

    /**
     * @throws \Server\CoreBase\SwooleException
     */
    public function http_sendToUids()
    {
        $uids = $this->http_input->get("uids");
        $uids = explode(",",$uids);
        $this->sendToUids($uids,"sendToUids");
        $this->http_output->end("ok");
    }
}
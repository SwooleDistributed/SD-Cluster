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
        $this->bindUid($this->fd);
        $this->send($this->fd);
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
    }

    /**
     * @throws \Server\CoreBase\SwooleException
     */
    public function http_sendToUids()
    {
        $uids = $this->http_input->get("uids");
        $uids = explode(",",$uids);
        $this->sendToUids($uids,"sendToUids");
    }
}
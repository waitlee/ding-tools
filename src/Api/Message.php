<?php

/**
 * 钉钉 消息接口
 */

namespace WaitLee\DingTools\Api;

use WaitLee\DingTools\DingClient;

class Message
{
    public static function sendToConversation($accessToken, $opt)
    {

    }

    public static function send($accessToken, $opt)
    {
        $res = DingClient::getInstance()->post(
            'message/send', ['access_token' => $accessToken], $opt
        );

        return $res->getBody()->getContents();
    }
}
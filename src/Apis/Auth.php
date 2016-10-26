<?php
/**
 * 钉钉 Auth 接口
 */
namespace WaitLee\DingTools\Apis;

use WaitLee\DingTools\DingClient;

class Auth
{
    /**
     * get Access Token
     *
     * @return string json format
     */
    public static function getAccessToken($corpId, $corpSecret)
    {
        $response = DingClient::getInstance()->get('/gettoken', ['corpid' => $corpId, 'corpsecret' => $corpSecret]);

        return $response->getBody()->getContents();
    }

    public static function getTicket($accessToken)
    {

    }
}
<?php
/**
 * 钉钉 Auth 接口
 */
namespace WaitLee\DingTools\Api;

use WaitLee\DingTools\DingClient;

class Auth
{
    /**
     * get Access Token
     *
     * @param string $corpId
     * @param string $corpSecret
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
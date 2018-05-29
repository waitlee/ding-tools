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

    /**
     * 获取用户授权的持久授权码
     *
     * @param string $code
     * @param string $accessToken
     *
     * @return mixed
     */
    public function getPersistentCode($code, $accessToken)
    {
        $response = DingClient::getInstance()
            ->post('/get_persistent_code', ['access_token' => $accessToken], ['tmp_auth_code' => $code]);

        return $response->getBody()->getContents();
    }

    /**
     * 获取用户授权的SNS_TOKEN
     *
     * @param string $code
     * @param string $openId
     * @param string $accessToken
     *
     * @return mixed
     */
    public function getSnsToken($code, $openId, $accessToken)
    {
        $response = DingClient::getInstance()
            ->post('/get_sns_token',
                ['access_token' => $accessToken],
                ['openid' => $openId, 'persistent_code' => $code]
            );

        return $response->getBody()->getContents();
    }

    /**
     * 获取用户授权的个人信息
     *
     * @param string $snsToken
     */
    public function getSnsInfo($snsToken)
    {
        $response = DingClient::getInstance()
            ->post('/getuserinfo', ['sns_token' => $snsToken]);

        return $response->getBody()->getContents();
    }


    public static function getTicket($accessToken)
    {

    }
}
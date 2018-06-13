<?php
/**
 * Created by SnsAuth.php
 *
 * PHP Version 7.0
 *
 * @author    waitlee <liduabc2012@gmail.com>
 * @copyright 2018 LMT Team, all rights reserved
 * @link      http://www.lemaitong.com
 */
namespace WaitLee\DingTools\Api;

use WaitLee\DingTools\DingClient;

class SnsAuth
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
        $response = DingClient::getInstance()->get('sns/gettoken', ['corpid' => $corpId, 'corpsecret' => $corpSecret]);

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
    public static function getPersistentCode($code, $accessToken)
    {
        $response = DingClient::getInstance()->post('sns/get_persistent_code', ['access_token' => $accessToken], ['tmp_auth_code' => $code]);

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
    public static function getSnsToken($code, $openId, $accessToken)
    {
        $response = DingClient::getInstance()->post('sns/get_sns_token', ['access_token' => $accessToken], ['openid' => $openId, 'persistent_code' => $code]);

        return $response->getBody()->getContents();
    }

    /**
     * 获取用户授权的个人信息
     *
     * @param string $snsToken
     */
    public static function getSnsInfo($snsToken)
    {
        $response = DingClient::getInstance()->post('sns/getuserinfo', ['sns_token' => $snsToken]);

        return $response->getBody()->getContents();
    }


    public static function getTicket($accessToken)
    {

    }
}
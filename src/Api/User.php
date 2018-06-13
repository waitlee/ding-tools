<?php
/**
 * 钉钉 用户信息接口
 */
namespace WaitLee\DingTools\Api;

use WaitLee\DingTools\DingClient;

class User
{
    /**
     * 获取部门下的用户信息
     *
     * @param  string  $accessToken  Access Token
     * @param  integer $departmentId 部门ID
     * @param  array   $args         请求参数，例如：order、size、offset
     * @return [type]               [description]
     */
    public static function userList($accessToken, $departmentId, $args = [])
    {
        $queryArgs = [
            'access_token' => $accessToken,
            'department_id' => $departmentId,
        ];

        if ($args) {
            $queryArgs = array_merge($queryArgs, $args);
        }

        $res = DingClient::getInstance()->get(
            '/user/list', $queryArgs
        );

        return $res->getBody()->getContents();
    }

    /**
     * get user id by union id
     *
     * @param  string $accessToken access Token
     * @param  string $unionId     ding ding uer union id
     *
     * @return string              json format string
     */
    public static function getUseridByUnionid($accessToken, $unionId)
    {
        $res = DingClient::getInstance()->get(
            'user/getUseridByUnionid',
            ['access_token' => $accessToken, 'unionid' => $unionId]
        );

        return $res->getBody()->getContents();
    }

    /**
     * get user info
     *
     * @param  string $accessToken access Token
     * @param  string $userId      ding ding user id
     *
     * @return string              json format string
     */
    public static function fetchOne($accessToken, $userId)
    {
        $res = DingClient::getInstance()->get(
            'user/get',
            ['access_token' => $accessToken, 'userid' => $userId]
        );

        return $res->getBody()->getContents();
    }
}
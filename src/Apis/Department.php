<?php
/**
 * 钉钉 部门信息接口
 */
namespace WaitLee\DingTools\Apis;

use WaitLee\DingTools\DingClient;

class Department
{
    public static function create($accessToken, $dept)
    {

    }

    /**
     * department list
     *
     * @param  string $accessToken access token
     *
     * @return string              json format string
     */
    public static function departmentList($accessToken)
    {
        $res = DingClient::getInstance()->get('department/list', ['access_token' => $accessToken]);

        return $res->getBody()->getContents();
    }

    /**
     * department info
     *
     * @param  string  $accessToken access Token
     * @param  integer $id          depeartment id
     *
     * @return string               json format string
     */
    public static function fetchOne($accessToken, $id)
    {
        $res = DingClient::getInstance()->get('department/get', ['access_token' => $accessToken, 'id' => $id]);

        return $res->getBody()->getContents();
    }
}
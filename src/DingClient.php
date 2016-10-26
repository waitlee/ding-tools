<?php
namespace WaitLee\DingTools;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Waitlee\DingTools\Exceptions\ResponseException;

/**
 * ding ding client
 *
 * @author waitlee <liduabc2012@gmail.com>
 * @version dev-master
 * @package  Waitlee\DingTools
 */
class DingClient
{
    /**
     * client
     *
     * @var GunzzleHttp\Client
     */
    private $_client;

    /**
     * base uri
     *
     * @var string
     */
    private $_baseUri;

    /**
     * construct
     *
     * @param string $corpId     corp id
     * @param string $corpSecret corp secret
     */
    private function __construct()
    {
        $this->_client = new Client();
        $this->_baseUri = 'https://oapi.dingtalk.com/';
    }

    public static function getInstance()
    {
        static $instance = null;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * http get request
     *
     * @param  string $path        request path
     * @param  array  $queryArgs request query args
     * @param  array  $args        request data
     *
     * @return string              response format json
     */
    public function get($path, $queryArgs, $args = [])
    {
        $url = $this->buildUrl($path, $queryArgs);

        return $this->send('get', $url, $args);
    }

    /**
     * http post request
     *
     * @param  string $path      request path
     * @param  array  $queryArgs request args
     * @param  array  $args      [description]
     *
     * @return string              response format json
     */
    public function post($path, $queryArgs, $args = [])
    {
        $url = $this->buildUrl($path, $queryArgs);

        return $this->send('post', $url, $args);
    }

    protected function buildUrl($path, $queryArgs)
    {
        $query = $this->buildQuery($queryArgs);

        $uri = $this->_baseUri . $path;
        if ($query) {
            $uri .= '?' . $query;
        }

        return $uri;
    }

    /**
     * build quire by args
     * @param  array  $args query args
     * @return string
     */
    protected function buildQuery($args)
    {
        if (count($args) === 0) {
            return null;
        }

        $query = '';
        foreach ($args as $key => $value) {
            $query .= '&' . $key . '=' . $value;
        }

        return trim($query, '&');
    }

    /**
     * 重新组合请求数据(组合成符合 GUZZLE 的格式)
     *
     * @param  array $data request data
     * @return array       data after build
     */
    protected function buildRequestData($data)
    {
        if ($data) {
            return [
                'headers' => ['content-type' => 'application/json'],
                'json' => $data
            ];
        }

        return [];
    }

    /**
     * send request
     *
     * @param  string $method request method
     * @param  string $url    request url
     * @param  array  $data   request headers and request data
     *
     * @return response
     */
    protected function send($method, $url, $data = [])
    {
        if ($data) {
            $data = $this->buildRequestData($data);
        }

        $response = $this->_client->request(strtolower($method), $url, $data);

        return $response;
    }
}
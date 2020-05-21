<?php

namespace Phpcast\TuyaCloudSdk\Kernel;

use Phpcast\TuyaCloudSdk\Contracts\AccessTokenInterface;
use Phpcast\TuyaCloudSdk\Kernel\Exceptions\ConfigException;
use Phpcast\TuyaCloudSdk\Traits\HasHttpRequest;

class BaseClient
{
    use HasHttpRequest;

    /**
     * @var
     */
    protected $baseUri = 'https://openapi.tuyacn.com';

    /**
     * @var \EasyWeChat\Kernel\ServiceContainer
     */
    protected $app;

    /**
     * @var \EasyWeChat\Kernel\Contracts\AccessTokenInterface
     */
    protected $accessToken;

    /**
     * BaseClient constructor.
     *
     * @param \Phpcast\TuyaCloudSdk\Kernel\ServiceContainer             $app
     * @param \Phpcast\TuyaCloudSdk\Contracts\AccessTokenInterface|null $accessToken
     */
    public function __construct(ServiceContainer $app, AccessTokenInterface $accessToken = null)
    {
        $this->app = $app;
        $this->accessToken = $accessToken ?? $this->app['access_token'];
    }

    public function getTimeout()
    {
        return $this->app['config']->get('http_timeout') ?: 5.0;
    }

    /**
     * @return mixed
     *
     * @throws ConfigException
     */
    protected function getVersion()
    {
        $version = $this->app['config']->get('version');
        if (!$version) {
            throw new ConfigException('Tuya api version need.');
        }

        return $version;
    }

    /**
     * @param $uri
     *
     * @return string
     *
     * @throws ConfigException
     */
    protected function getRequestPath($uri)
    {
        return $this->baseUri.'/'.$this->getVersion().'/'.$uri;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        $t = get_total_millisecond();
        $sign = $this->app['sign']->generateProfessionSign($this->app['config'], $this->accessToken->getToken()['access_token'], $t);

        return [
            'client_id' => $this->app['config']['client_id'],
            'access_token' => $this->accessToken->getToken()['access_token'],
            'sign' => $sign,
            't' => $t,
            'sign_method' => 'HMAC-SHA256',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @param $uri
     * @param $parmas
     *
     * @return array
     */
    public function httpGet($uri, $parmas = [])
    {
        $response = $this->get($this->getRequestPath($uri), arrayFilter($parmas), $this->getHeaders());
        if(!$response['success'] && $response['code'] == '1010'){
            $this->accessToken->refresh();
            $response = $this->get($this->getRequestPath($uri), arrayFilter($parmas), $this->getHeaders());
        }

        return $response;
    }

    /**
     * @param $uri
     * @param $parmas
     *
     * @return array
     */
    public function httpPostJson($uri, $parmas)
    {
        $response = $this->postJson($this->getRequestPath($uri), arrayFilter($parmas), $this->getHeaders());
        if(!$response['success'] && $response['code'] == '1010'){
            $this->accessToken->refresh();
            $response = $this->postJson($this->getRequestPath($uri), arrayFilter($parmas), $this->getHeaders());
        }

        return $response;
    }

    /**
     * @param $uri
     * @param $parmas
     *
     * @return array
     */
    public function httpPost($uri, $parmas)
    {
        $response = $this->post($this->getRequestPath($uri), arrayFilter($parmas), $this->getHeaders());
        if(!$response['success'] && $response['code'] == '1010'){
            $this->accessToken->refresh();
            $response = $this->post($this->getRequestPath($uri), arrayFilter($parmas), $this->getHeaders());
        }

        return $response;
    }

    public function httpPut($uri, $query = [], $params = [])
    {
        $response = $this->request('put', $this->getRequestPath($uri), [
            'headers' => $this->getHeaders(),
            'query' => arrayFilter($query),
            'params' => arrayFilter($params),
        ]);
        if(!$response['success'] && $response['code'] == '1010'){
            $this->accessToken->refresh();
            $response = $this->request('put', $this->getRequestPath($uri), [
                'headers' => $this->getHeaders(),
                'query' => arrayFilter($query),
                'params' => arrayFilter($params),
            ]);
        }

        return $response;
    }

    public function httpDelete($uri, $query = [])
    {
        $response = $this->request('delete', $this->getRequestPath($uri), [
            'headers' => $this->getHeaders(),
            'query' => arrayFilter($query),
        ]);
        if(!$response['success'] && $response['code'] == '1010'){
            $this->accessToken->refresh();
            $response = $this->request('delete', $this->getRequestPath($uri), [
                'headers' => $this->getHeaders(),
                'query' => arrayFilter($query),
            ]);
        }

        return $response;
    }
}

<?php

namespace Phpcast\TuyaCloudSdk\Kernel;

use Phpcast\TuyaCloudSdk\Contracts\AccessTokenInterface;
use Phpcast\TuyaCloudSdk\Kernel\Exceptions\RuntimeException;
use Phpcast\TuyaCloudSdk\Kernel\Traits\InteractsWithCache;
use Phpcast\TuyaCloudSdk\Traits\HasHttpRequest;
use Pimple\Container;

abstract class AccessToken implements AccessTokenInterface
{
    use HasHttpRequest;
    use InteractsWithCache;

    /**
     * @var string
     */
    protected $tokenKey = 'access_token';

    /**
     * @var string
     */
    protected $cachePrefix = 'tuya.kernel.access_token.';

    /**
     * @var \Psr\SimpleCache\CacheInterface
     */
    protected $cache;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var \Pimple\Container
     */
    protected $app;

    /**
     * @var int
     */
    protected $safeSeconds = 500;

    /**
     * AccessToken constructor.
     *
     * @param \Pimple\Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function getToken(bool $refresh = false): array
    {
        $cacheKey = $this->getCacheKey();
        $cache = $this->getCache();

        if (!$refresh && $cache->has($cacheKey)) {
            return $cache->get($cacheKey);
        }

        $token = $this->requestToken($this->getCredentials(), $this->getHeaders());
        $this->setToken($token[$this->tokenKey], $token['expires_in'] ?? 7200);

        return $token;
    }

    public function refresh(): AccessTokenInterface
    {

    }

    /**
     * @return string
     */
    protected function getCacheKey()
    {
        return $this->cachePrefix.md5(json_encode($this->getCredentials()));
    }

    public function getCache()
    {
        if ($this->cache) {
            return $this->cache;
        }

        if (property_exists($this, 'app') && $this->app instanceof ServiceContainer && isset($this->app['cache'])) {
            $this->setCache($this->app['cache']);

            return $this->cache;
        }

        return $this->cache = $this->createDefaultCache();
    }

    public function requestToken(array $credentials,$header=[])
    {
        $reponse = $this->sendRequest($credentials,$header);
        if($reponse['success'] === true){
            return $reponse['result'];
        }

        throw new RuntimeException(json_encode($this->getHeaders()).json_encode($reponse));
//        throw new RuntimeException($reponse['msg']);
    }

    protected function sendRequest(array $credentials,$header)
    {
        $query = $credentials;

        return $this->get($this->getEndpoint('token'),$query,$header);
    }

    protected function getEndpoint($uri)
    {
        return $this->endpoint.'/'. $this->app['config']['version'].'/'.$uri;
    }

    /**
     * @param string $token
     * @param int    $lifetime
     *
     * @return \Phpcast\TuyaCloudSdk\Kernel\Contracts\AccessTokenInterface
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Phpcast\TuyaCloudSdk\Kernel\Exceptions\RuntimeException
     */
    public function setToken(string $token, int $lifetime = 7200): \Phpcast\TuyaCloudSdk\Contracts\AccessTokenInterface
    {
        $this->getCache()->set($this->getCacheKey(), [
            $this->tokenKey => $token,
            'expires_in' => $lifetime,
        ], $lifetime - $this->safeSeconds);

        if (!$this->getCache()->has($this->getCacheKey())) {
            throw new RuntimeException('Failed to cache access token.');
        }

        return $this;
    }

    /**
     * Credential for get token.
     *
     * @return array
     */
    abstract protected function getCredentials(): array;

    abstract protected function getHeaders(): array;
}
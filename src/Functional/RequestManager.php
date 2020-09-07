<?php


namespace MockingMagician\CoinbaseProSdk\Functional;


use GuzzleHttp\ClientInterface;
use MockingMagician\CoinbaseProSdk\Contracts\ApiParamsInterface;
use MockingMagician\CoinbaseProSdk\Contracts\Connectivity\TimeInterface;
use MockingMagician\CoinbaseProSdk\Contracts\ApiConnectivityInterface;
use MockingMagician\CoinbaseProSdk\Contracts\RequestInterface;
use MockingMagician\CoinbaseProSdk\Contracts\RequestManagerInterface;
use MockingMagician\CoinbaseProSdk\Functional\Build\Pagination;

class RequestManager implements RequestManagerInterface
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var ApiParamsInterface
     */
    private $apiParams;
    /**
     * @var TimeInterface|null
     */
    private $time;

    public function __construct(ClientInterface $client, ApiParamsInterface $apiParams)
    {
        $this->client = $client;
        $this->apiParams = $apiParams;
    }

    public function setTimeInterface(TimeInterface $time) {
        $this->time = $time;
    }

    public function prepareRequest(string $method, string $routePath, ?string $body = null, ?Pagination $pagination = null): RequestInterface
    {
        return new Request($method, $routePath, $body, $pagination, $this->client, $this->apiParams, $this->time);
    }
}

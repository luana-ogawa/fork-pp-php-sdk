<?php

namespace MercadoPago\PP\Sdk\HttpClient;

use Exception;
use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Interface HttpClientInterface
 *
 * @package MercadoPago\PP\Sdk\HttpClient
 */
interface HttpClientInterface
{
    /**
     * Sends a GET request.
     *
     * @param string $uri
     *
     * @throws Exception
     */
    public function get($uri, array $headers = []): Response;

    /**
     * Sends a PUT request.
     *
     * @param string                     $uri
     * @param string|AbstractEntity|null $body
     *
     * @throws Exception
     */
    public function put($uri, array $headers = [], $body = null): Response;

    /**
     * Sends a POST request.
     *
     * @param string                     $uri
     * @param string|AbstractEntity|null $body
     *
     * @throws Exception
     */
    public function post($uri, array $headers = [], $body = null): Response;

    /**
     * Sends a request with any HTTP method.
     *
     * @param string                     $method HTTP method to use
     * @param string                     $uri
     * @param string|AbstractEntity|null $body
     *
     * @throws Exception
     */
    public function send(string $method, $uri, array $headers = [], $body = null): Response;
}

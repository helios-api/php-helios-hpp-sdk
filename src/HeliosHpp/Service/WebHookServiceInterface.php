<?php

namespace HeliosHpp\Service;

interface WebHookServiceInterface
{
    public function handleRequest($body, array $headers, $method);
}
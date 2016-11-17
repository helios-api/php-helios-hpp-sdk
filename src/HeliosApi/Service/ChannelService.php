<?php


namespace HeliosApi\Service;

use HeliosApi\Component\Request;

/**
 * Class ChannelService
 *
 * @package HeliosApi\Service
 */
class ChannelService extends AbstractApiService
{
    /**
     * @return \HeliosApi\Model\Channel[]
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function getList()
    {
        $request = new Request($this->url);
        $request
            ->setMethod('GET')
            ->setEndpoint('/channels')
            ->setAuthorizationToken($this->getAuthorizationToken());

        $response = $request->send();
        $body = $this->checkResponse($response);
        return $this->serializer->deserialize($body, "ArrayCollection<HeliosApi\\Model\\Channel>");
    }
}

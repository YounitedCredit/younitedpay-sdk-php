<?php

use YounitedPaySDK\Client;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Response\ErrorResponse;

abstract class AbstractClientApiService
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var bool
     */
    protected $enableTest = false;

    /**
     * @param Client $client
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return $this
     */
    public function enableTest()
    {
        $this->enableTest = true;
        return $this;
    }

    /**
     * @param AbstractModel $body
     * @param AbstractRequest $request
     *
     * @return \Psr\Http\Message\ResponseInterface|ErrorResponse
     */
    protected function call(AbstractModel $body, AbstractRequest $request)
    {
        try {
            $request = $request->setModel($body);
            if ($this->enableTest) {
                $request = $request->enableSandbox();
            }
            $response = $this->client->sendRequest($request);
        } catch (\Exception $e) {
            $message = $e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString();
            $response = (new ErrorResponse(400, [], null, '1.1', $message));
        }

        return $response;
    }
}

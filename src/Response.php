<?php

namespace Clue\React\Soap;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Response {

    private $result;

    private $request;

    private $response;

    public function __construct($result, RequestInterface $request, ResponseInterface $response) {
        $this->result = $result;
        $this->request = $request;
        $this->response = $response;
    }

    public function getResult() {
        return $this->result;
    }

    public function getRequest() {
        return $this->request;
    }

    public function getResponse() {
        return $this->response;
    }
}
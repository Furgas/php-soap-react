<?php

namespace Clue\React\Soap;

use Psr\Http\Message\RequestInterface;

class RequestException extends \RuntimeException {

    private $request;

    public function __construct(RequestInterface $request, \Exception $exception) {
        parent::__construct($exception->getMessage(), $exception->getCode(), $exception);

        $this->request = $request;
    }

    public function getRequest() {
        return $this->request;
    }
}
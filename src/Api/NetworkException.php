<?php

namespace OpneMind\Skyroom\Api;


class NetworkException extends \Exception
{
    public function __toString() {
        return __CLASS__ . ": {$this->message}\n";
    }
}

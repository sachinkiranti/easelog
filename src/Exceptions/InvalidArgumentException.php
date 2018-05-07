<?php

namespace SachinKiranti\Easelog\Exceptions;

class InvalidArgumentException extends \Exception
{
    const EXCEPTION_MESSAGE = 'Parameter of function %s must be an array.';

    public function __construct($message = '')
    {
        $message = sprintf(self::EXCEPTION_MESSAGE, $message);
        parent::__construct($message);
    }
}

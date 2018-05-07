<?php

namespace SachinKiranti\Easelog\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException as Exception;
use Throwable;

/**
 * Class ModelNotFoundException.
 */
class ModelNotFoundException extends Exception
{
    const EXCEPTION_MESSAGE = '%s model not found. Check model and namespace of %s in easelog.php config file.';

    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        $message = sprintf(self::EXCEPTION_MESSAGE, $message, $message);
        parent::__construct($message, $code, $previous);
    }
}

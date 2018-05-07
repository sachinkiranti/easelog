<?php

namespace SachinKiranti\Easelog;

use Illuminate\Support\Facades\Facade;

/**
 * Class EaselogFacade.
 */
class EaselogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'easelog';
    }
}

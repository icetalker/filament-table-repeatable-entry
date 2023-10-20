<?php

namespace Icetalker\FilamentTableRepeatableEntry\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Icetalker\FilamentTableRepeatableEntry\FilamentTableRepeatableEntry
 */
class FilamentTableRepeatableEntry extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Icetalker\FilamentTableRepeatableEntry\Components\FilamentTableRepeatableEntry::class;
    }
}

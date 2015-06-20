<?php

namespace Gmlo\CMS\Facades;

use Illuminate\Support\Facades\Facade;


class FieldBuilder extends Facade {
    protected static function getFacadeAccessor() { return 'field'; }
}
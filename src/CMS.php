<?php

namespace Gmlo\CMS;


class CMS {

    public function __construct()
    {

    }


    public function assetPath($file_name = '')
    {
        return asset('vendor/gmlo/cms/' . $file_name);
    }

}
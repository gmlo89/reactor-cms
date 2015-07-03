<?php

namespace Gmlo\CMS\Modules\Assets;

use Gmlo\CMS\Modules\Lib\BaseRepo;

class AssetsRepo extends BaseRepo
{
    protected $image_extensions = [
        'jpg',
        'png',
        'gif',
        'jpeg'
    ];

    public function getModel()
    {
        return new Asset;
    }

    public function isImage($extension)
    {
        return in_array($extension, $this->image_extensions);
    }

    public function finder($text)
    {
        return $this->model->where('name', 'like', '%' . $text . '%')->get();
    }

}
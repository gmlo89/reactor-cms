<?php

namespace Gmlo\CMS\Modules\Articles;

use Gmlo\CMS\Modules\Lib\BaseRepo;


class ArticlesRepo extends BaseRepo
{

    public function getModel()
    {
        return new Article;
    }

    public function prepareData($data = [])
    {
        $data['created_by'] = \Auth::user()->id;
        return $data;
    }

}
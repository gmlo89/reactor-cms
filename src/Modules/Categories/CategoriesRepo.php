<?php

namespace Gmlo\CMS\Modules\Categories;

use Gmlo\CMS\Modules\Lib\BaseRepo;

class CategoriesRepo extends BaseRepo
{

    public function getModel()
    {
        return new Category;
    }

}
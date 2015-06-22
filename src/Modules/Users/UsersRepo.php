<?php

namespace Gmlo\CMS\Modules\Users;

use Gmlo\CMS\Modules\Lib\BaseRepo;

class UsersRepo extends BaseRepo
{

    public function getModel()
    {
        return new User;
    }
}
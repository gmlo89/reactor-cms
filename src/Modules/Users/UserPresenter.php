<?php

namespace Gmlo\CMS\Modules\Users;

use Gmlo\CMS\Modules\Lib\Presenter;

class UserPresenter extends Presenter
{
    public function typeTitle()
    {
        if (\Lang::has('CMS::users.user_types.' . $this->type))
        {

            return trans('CMS::users.user_types.' . $this->type);
        }
        return ucwords($this->type);
    }
}
<?php

namespace Gmlo\CMS\Modules\Articles;

use Gmlo\CMS\Modules\Lib\Presenter;

class ArticlePresenter extends Presenter
{
    public function isPublish()
    {
        return $this->published_at != null;
    }

}
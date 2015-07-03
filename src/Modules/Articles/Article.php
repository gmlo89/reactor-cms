<?php

namespace Gmlo\CMS\Modules\Articles;

use Illuminate\Database\Eloquent\Model;
use Gmlo\CMS\Modules\Lib\PresentableTrait;
use Gmlo\CMS\Modules\Articles\ArticlePresenter;

class Article extends Model
{
    use PresentableTrait;

    protected $presenter = ArticlePresenter::class;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'sumary', 'body', 'slug_url', 'primary_img', 'title_seo', 'meta_keywords', 'meta_description', 'category_id', 'created_by', 'published_at', 'section_id'];

    public function category()
    {
        return $this->belongsTo('Gmlo\CMS\Modules\Categories\Category');
    }

    public function image()
    {
        return $this->belongsTo('Gmlo\CMS\Modules\Assets\Asset', 'primary_img');
    }

}

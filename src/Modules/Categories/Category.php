<?php

namespace Gmlo\CMS\Modules\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

}

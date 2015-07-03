<?php

namespace Gmlo\CMS\Modules\Assets;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_assets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'tags', 'extension', 'is_image'];

}

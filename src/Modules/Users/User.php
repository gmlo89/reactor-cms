<?php

namespace Gmlo\CMS\Modules\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Gmlo\CMS\Modules\Lib\PresentableTrait;
use Gmlo\CMS\Modules\Users\UserPresenter;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, PresentableTrait;

    protected $presenter = UserPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'type', 'avatar', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function isBlocked()
    {
        return $this->blocked_at != null;
    }

}

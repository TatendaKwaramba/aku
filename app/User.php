<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'password_updated'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'deleted_at',
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = Str::title($value);
    }

    public function getNameAttribute($value){
        return Str::title($value);
    }

    public  static function boot()
    {
        parent::boot();

        static::updating(function ($user){
            //before changing the password save old to old passwords
            if(OldPassword::whereEmail($user->email)->wherePassword($user->password)->first() == null) {

                OldPassword::create(array(
                    'email' => $user->email,
                    'password' => $user->password
                ));

                //Keep only five previous passwords for a user
                if (OldPassword::whereEmail($user->email)->count() >= 6) {
                    OldPassword::whereEmail($user->email)->first()->delete();
                }
            }

        });
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

/**
 * @property int id
 * @property string name
 * @property string email
 */
class User extends Authenticatable
{

    use Notifiable;
    /*
     * Adding the searchable trait which provided
     * by Laravel Scout
     */
    use Searchable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'github_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at', 'github_id',
    ];
    protected $touches = ['profile'];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'users';
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        $this->profile;

        return $this->toArray();
    }

    /**
     * Return the user profile info
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}

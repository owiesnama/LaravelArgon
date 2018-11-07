<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

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
        'name', 'email', 'password', 'avatar', 'github_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at','github_id',
    ];

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
     * Return the user profile info
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * initiate the user profile
     *
     * @param null $user
     * @return Profile
     */
    public function initializeProfile($providerUser = null)
    {
        $profile = new Profile();
        $profile->user_id = $this->id;

        if ($providerUser) {
            $profile->bio = $providerUser->user['bio'];
            $profile->avatar = $providerUser->avatar;
        }

        $profile->save();

        return $profile;
    }
}

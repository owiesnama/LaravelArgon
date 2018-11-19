<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @property int user_id
 * @property string avatar
 */
class Profile extends Model
{
    protected $guarded = ['id'];
    /*
     * Adding the searchable trait which provided
     * by Laravel Scout
     */
    use Searchable;
    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'profiles';
    }
    /**
     * return the owner of the profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

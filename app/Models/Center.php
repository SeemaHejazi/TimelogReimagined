<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Center
 *
 * @property-read Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static Builder|\App\Models\Center newModelQuery()
 * @method static Builder|\App\Models\Center newQuery()
 * @method static Builder|\App\Models\Center query()
 * @mixin \Eloquent
 */
class Center extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'centers';

    /**
     * No timestamp attributes.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'center_name', 'location'
    ];

//    /**
//     * Center is associated with
//     *
//     * @return BelongsTo|UserCenter
//     */
//    public function user_center() {
//        return $this->belongsTo('App\Models\UserCenter');
//    }

    /**
     * Get the users associated with a centers
     *
     * @return HasManyThrough|User[]
     */
    public function users() {
        return $this->hasManyThrough('App\Models\User', 'App\Models\UserCenter',
            'center_id',
            'id',
            'id',
            'user_id');
    }
}


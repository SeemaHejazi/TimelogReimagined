<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;


/**
 * App\Models\UserCenter
 *
 * @property int $user_id
 * @property int $center_id
 * @property-read \App\Models\Center $center
 * @property-read \App\Models\User $user
 * @method static Builder|\App\Models\UserCenter newModelQuery()
 * @method static Builder|\App\Models\UserCenter newQuery()
 * @method static Builder|\App\Models\UserCenter query()
 * @method static Builder|\App\Models\UserCenter whereCenterId($value)
 * @method static Builder|\App\Models\UserCenter whereUserId($value)
 * @mixin \Eloquent
 */
class UserCenter extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_centers';

    /**
     * No timestamp attributes.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Join table using two foreign keys as primary set incrementing id to false.
     *
     * @return bool
     */
    public $incrementing = false;

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['user_id', 'center_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'center_id',
    ];

    /**
     *  A dealership_session is associated with a rep
     *
     * @return BelongsTo|User
     */
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     *  A dealer_rep_dealerships is associated with a dealership
     *
     * @return BelongsTo|Center
     */
    public function center() {
        return $this->belongsTo('App\Models\Center', 'center_id');
    }
}

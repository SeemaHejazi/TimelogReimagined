<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;


/**
 * App\Models\UserCentre
 *
 * @property int $user_id
 * @property int $centre_id
 * @property-read \App\Models\Centre $centre
 * @property-read \App\Models\User $user
 * @method static Builder|\App\Models\UserCentre newModelQuery()
 * @method static Builder|\App\Models\UserCentre newQuery()
 * @method static Builder|\App\Models\UserCentre query()
 * @method static Builder|\App\Models\UserCentre whereCenterId($value)
 * @method static Builder|\App\Models\UserCentre whereUserId($value)
 * @mixin \Eloquent
 */
class UserCentre extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_centres';

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
    protected $primaryKey = ['user_id', 'centre_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'centre_id',
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
     * @return BelongsTo|Centre
     */
    public function centre() {
        return $this->belongsTo('App\Models\Centre', 'centre_id');
    }
}

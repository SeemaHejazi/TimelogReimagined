<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;


/**
 * App\Models\Centre
 *
 * @property int $id
 * @property string $centre_name
 * @property string $location
 * @property string $timezone
 * @property-read Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static Builder|\App\Models\Centre newModelQuery()
 * @method static Builder|\App\Models\Centre newQuery()
 * @method static Builder|\App\Models\Centre query()
 * @method static Builder|\App\Models\Centre whereCentreName($value)
 * @method static Builder|\App\Models\Centre whereId($value)
 * @method static Builder|\App\Models\Centre whereLocation($value)
 * @method static Builder|\App\Models\Centre whereTimezone($value)
 * @mixin \Eloquent
 */
class Centre extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'centres';

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
        'centre_name', 'location'
    ];

    /**
     * Centre is associated with
     *
     * @return BelongsTo|UserCentre
     */
    public function user_centre() {
        return $this->belongsTo('App\Models\UserCentre');
    }

    /**
     * Get the users associated with a centres
     *
     * @return HasManyThrough|User[]
     */
    public function users() {
        return $this->hasManyThrough('App\Models\User', 'App\Models\UserCentre',
            'centre_id',
            'id',
            'id',
            'user_id');
    }
}


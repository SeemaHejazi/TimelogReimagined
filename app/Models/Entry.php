<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

/**
 * App\Models\Entry
 *
 * @property int $id
 * @property int $user_id
 * @property int $centre_id
 * @property int $in_time
 * @property int|null $out_time
 * @property int|null $total
 * @property-read \App\Models\Centre $centre
 * @property-read \App\Models\User $user
 * @method static Builder|\App\Models\Entry newModelQuery()
 * @method static Builder|\App\Models\Entry newQuery()
 * @method static Builder|\App\Models\Entry query()
 * @method static Builder|\App\Models\Entry whereCentreId($value)
 * @method static Builder|\App\Models\Entry whereId($value)
 * @method static Builder|\App\Models\Entry whereInTime($value)
 * @method static Builder|\App\Models\Entry whereOutTime($value)
 * @method static Builder|\App\Models\Entry whereTotal($value)
 * @method static Builder|\App\Models\Entry whereUserId($value)
 * @mixin \Eloquent
 */
class Entry extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entries';

    /**
     * No timestamp attributes.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Always eager load these relations
     *
     * @var array
     */
    protected $with = ['user', 'centre'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'in_time',
        'out_time',
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'centre_id', 'in_time', 'out_time', 'total'
    ];

    /**
     * Entry is associated with a user
     *
     * @return BelongsTo|User
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Entry is associated with a centre
     *
     * @return BelongsTo|Centre
     */
    public function centre() {
        return $this->belongsTo('App\Models\Centre');
    }

    public function getTotalHoursAttribute() {
        return $this->total / 3600;
    }

    public function getInTimeAttribute($utc) {
        $timezone =$this->centre->timezone;

        return Carbon::createFromTimestamp($utc, $timezone)->format('M d, y h:i A');
    }

    public function getOutTimeAttribute($utc) {
        if ($utc == null) {
            return $utc;
        }

        $timezone =$this->centre->timezone;

        return Carbon::createFromTimestamp($utc, $timezone)->format('M d, y h:i A');
    }
}

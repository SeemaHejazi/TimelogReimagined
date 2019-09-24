<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}

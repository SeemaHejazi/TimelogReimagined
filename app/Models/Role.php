<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static Builder|\App\Models\Role newModelQuery()
 * @method static Builder|\App\Models\Role newQuery()
 * @method static Builder|\App\Models\Role query()
 * @method static Builder|\App\Models\Role whereId($value)
 * @method static Builder|\App\Models\Role whereName($value)
 * @mixin \Eloquent
 */
class Role extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * No timestamp attributes.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Role is associated with multiple users
     *
     * @return BelongsToMany|User[]
     */
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}

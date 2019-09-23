<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int $role_id
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection|\App\Models\Centre[] $centres
 * @property-read int|null $centres_count
 * @property-read string $name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role $role
 * @method static Builder|\App\Models\User newModelQuery()
 * @method static Builder|\App\Models\User newQuery()
 * @method static Builder|\App\Models\User query()
 * @method static Builder|\App\Models\User whereCreatedAt($value)
 * @method static Builder|\App\Models\User whereEmail($value)
 * @method static Builder|\App\Models\User whereFirstName($value)
 * @method static Builder|\App\Models\User whereId($value)
 * @method static Builder|\App\Models\User whereLastName($value)
 * @method static Builder|\App\Models\User wherePassword($value)
 * @method static Builder|\App\Models\User whereRememberToken($value)
 * @method static Builder|\App\Models\User whereRoleId($value)
 * @method static Builder|\App\Models\User whereUpdatedAt($value)
 * @method static Builder|\App\Models\User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable {
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Magic method to retrieve the full name of a user
     *
     * @return string
     */
    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Each user has a role
     *
     * @return BelongsTo|Role
     */
    public function role() {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    /**
     * Each user belongs to a user_centre association
     *
     * @return BelongsTo|UserCentre
     */
    public function user_centre() {
        return $this->belongsTo('App\Models\UserCentre');
    }

    /**
     * Get the centres with this user through the user_centre association
     *
     * @return HasManyThrough|Centre[]
     */
    public function centres() {
        return $this->hasManyThrough('App\Models\Centre', 'App\Models\UserCentre',
            'user_id',
            'id',
            'id',
            'centre_id');
    }

    /**
     * Check if current user is super-admin or admin
     *
     * @return bool
     */
    public function isAdmin() {
        return null !== $this->role()->where('name', 'admin')->orWhere('name', 'super-admin')->first();
    }
}

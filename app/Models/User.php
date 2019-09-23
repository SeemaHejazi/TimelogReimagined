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
 * @property-read Collection|\App\Models\Center[] $centers
 * @property-read int|null $centers_count
 * @property-read string $name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role $role
 * @method static Builder|\App\Models\User newModelQuery()
 * @method static Builder|\App\Models\User newQuery()
 * @method static Builder|\App\Models\User query()
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

//    /**
//     * Each user belongs to a user_center association
//     *
//     * @return BelongsTo|UserCenter
//     */
//    public function user_center() {
//        return $this->belongsTo('App\Models\UserCenter');
//    }

    /**
     * Get the centers with this user through the user_center association
     *
     * @return HasManyThrough|Center[]
     */
    public function centers() {
        return $this->hasManyThrough('App\Models\Center', 'App\Models\UserCenter',
            'user_id',
            'id',
            'id',
            'center_id');
    }

    /**
     * Check if current user is super-admin or admin
     *
     * @return bool
     */
    public function isAdmin() {
        return null !== $this->role()->whereName('admin')->orWhereName('super-admin')->first();
    }
}

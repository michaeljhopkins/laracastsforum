<?php

namespace Forum;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Forum\User.
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 *                $notifications
 * @mixin \Eloquent
 * @property int
 *               $id
 * @property string
 *               $name
 * @property string
 *               $email
 * @property string
 *               $password
 * @property string
 *               $remember_token
 * @property \Carbon\Carbon
 *               $created_at
 * @property \Carbon\Carbon
 *               $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Forum\User whereCreatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\User whereEmail( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\User whereId( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\User whereName( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\User wherePassword( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\User whereRememberToken( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\User whereUpdatedAt( $value )
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

	public function activity() {
    	return $this->hasMany( Activity::class);
	}
}

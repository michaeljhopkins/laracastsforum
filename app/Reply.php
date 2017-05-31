<?php

namespace Forum;

use Forum\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Model;

/**
 * Forum\Reply.
 *
 * @mixin \Eloquent
 * @property int              $id
 * @property int              $thread_id
 * @property int              $user_id
 * @property string           $body
 * @property \Carbon\Carbon   $created_at
 * @property \Carbon\Carbon   $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Forum\Reply whereBody( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Reply whereCreatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Reply whereId( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Reply whereThreadId( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Reply whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Reply whereUserId( $value )
 * @property-read \Forum\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Forum\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Forum\Favorite[] $favorites
 * @property-read mixed $favorites_count
 * @property-read \Forum\Thread $thread
 */
class Reply extends Model
{
    use Favoritable, RecordsActivity;

    protected $guarded = [];

    protected $with = ['owner', 'favorites'];

	protected static function boot()
	{
		parent::boot();
		static::created(function ($r) {
			$r->thread->increment('replies_count');
		});
		static::deleted(function ($r) {
			$r->thread->decrement('replies_count');
		});
	}


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
    	return $this->belongsTo( Thread::class);
    }
}

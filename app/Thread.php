<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

/**
 * Forum\Thread
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereUserId($value)
 * @property-read \Forum\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\Forum\Reply[] $replies
 */
class Thread extends Model {

	protected $guarded = [];

	/**
	 * @return string
	 */
	public function path() {
		return '/threads/' . $this->id;
	}

	public function replies()
	{
		return $this->hasMany( Reply::class);
    }

    public function creator()
    {
    	return $this->belongsTo( User::class,'user_id');
    }

    public function addReply($reply)
    {
    	$this->replies()->create($reply);
    }
}

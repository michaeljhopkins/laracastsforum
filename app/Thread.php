<?php

namespace Forum;

use Forum\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Model;

/**
 * Forum\Thread.
 *
 * @mixin \Eloquent
 * @property int                                                          $id
 * @property int                                                          $user_id
 * @property string                                                       $title
 * @property string                                                       $body
 * @property \Carbon\Carbon                                               $created_at
 * @property \Carbon\Carbon                                               $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereBody( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereCreatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereId( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereTitle( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereUserId( $value )
 * @property-read \Forum\User                                             $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\Forum\Reply[] $replies
 * @property int                                                          $channel_id
 * @property-read \Forum\Channel                                          $channel
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread whereChannelId( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Thread filter( $filters )
 * @property-read \Illuminate\Database\Eloquent\Collection|\Forum\Activity[] $activity
 * @property-read mixed $reply_count
 */
class Thread extends Model
{
	use RecordsActivity;
    protected $guarded = [];
    protected $with = ['creator', 'channel'];
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($t) {
            $t->replies->each->delete();
        });
    }

	/**
     * @return string
     */
    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function getReplyCountAttribute()
    {
        return $this->replies()->count();
    }

}

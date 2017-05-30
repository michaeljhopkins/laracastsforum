<?php

namespace Forum;

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
 */
class Reply extends Model
{
    use Favoritable;

    protected $guarded = [];

    protected $with = ['owner', 'favorites'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

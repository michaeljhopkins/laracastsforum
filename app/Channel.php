<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

/**
 * Forum\Channel.
 *
 * @property int                                                           $id
 * @property string                                                        $name
 * @property string                                                        $slug
 * @property \Carbon\Carbon                                                $created_at
 * @property \Carbon\Carbon                                                $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Forum\Thread[] $threads
 * @method static \Illuminate\Database\Query\Builder|\Forum\Channel whereCreatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Channel whereId( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Channel whereName( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Channel whereSlug( $value )
 * @method static \Illuminate\Database\Query\Builder|\Forum\Channel whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class Channel extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}

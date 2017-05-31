<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

/**
 * Forum\Favorite
 *
 * @property int $id
 * @property int $user_id
 * @property int $favorited_id
 * @property string $favorited_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Forum\Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Favorite whereFavoritedId($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Favorite whereFavoritedType($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Favorite whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Favorite whereUserId($value)
 * @mixin \Eloquent
 */
class Favorite extends Model
{
    protected $guarded = ['id'];
}

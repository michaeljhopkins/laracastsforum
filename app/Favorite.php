<?php

namespace Forum;

use Forum\Traits\RecordsActivity;
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Forum\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $favorited
 */
class Favorite extends Model
{
	use RecordsActivity;

    protected $guarded = ['id'];

    public function favorited()
    {
    	return $this->morphTo();
    }
}

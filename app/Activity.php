<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

/**
 * Forum\Activity
 *
 * @property int $id
 * @property int $user_id
 * @property int $subject_id
 * @property string $subject_type
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $subject
 * @method static \Illuminate\Database\Query\Builder|\Forum\Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Activity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Activity whereSubjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Activity whereSubjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Activity whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Forum\Activity whereUserId($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{
	protected $guarded = [];

	public static function feed( $user,$take = 50 ) {
		return static::where('user_id',$user->id)
		             ->latest()
		             ->with( 'subject' )
		             ->take($take)
		             ->get()
		             ->groupBy( function ( $a ) {
		             	return $a->created_at->format( 'Y-m-d' );
		             });
	}

	public function subject()
	{
		return $this->morphTo();
	}
}

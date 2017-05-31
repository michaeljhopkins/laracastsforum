<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

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

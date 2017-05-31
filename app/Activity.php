<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $guarded = [];

	public static function feed( $user ) {
		return $user->activity()->latest()->with( 'subject' )->get()->groupBy( function ( $a ) {
			return $a->created_at->format( 'Y-m-d' );
		} );
	}

	public function subject()
	{
		return $this->morphTo();
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: michaelhopkins
 * Date: 5/29/17
 * Time: 7:16 AM
 */

namespace Forum\Filters;

use Forum\User;

class ThreadFilters extends Filters {

	protected $filters = ['by'];

	/**
	 * Filters the query by the given username
	 * @param $username
	 *
	 * @return mixed
	 */
	public function by( $username ) {
		$user = User::whereName( $username )->firstOrFail();

		return $this->builder->where( 'user_id', $user->id );
	}
}
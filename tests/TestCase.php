<?php

namespace Tests;

use Forum\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

	use CreatesApplication, DatabaseMigrations;

	public function signIn( $user = null ) {
		$user = $user ?: create( User::class );
		$this->actingAs( $user );

		return $this;
	}
}

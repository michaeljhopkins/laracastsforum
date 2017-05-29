<?php

namespace Tests;

use Exception;
use Forum\Exceptions\Handler;
use Forum\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

	use CreatesApplication, DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();
		$this->disableExceptionHandling();
	}

	public function signIn( $user = null ) {
		$user = $user ?: create( User::class );
		$this->actingAs( $user );

		return $this;
	}

	protected function disableExceptionHandling()
	{
		$this->oldExceptionHandler = $this->app->make( ExceptionHandler::class);

		$this->app->instance( ExceptionHandler::class, new class extends Handler {
			public function __construct() {}
			public function report(Exception $e) {}
			public function render($request, Exception $e){
				throw $e;
			}
		});
	}

	protected function withExceptionHandling()
	{
		$this->app->instance( ExceptionHandler::class, $this->oldExceptionHandler);
		return $this;
	}
}

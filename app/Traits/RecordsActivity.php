<?php

namespace Forum\Traits;

use Forum\Activity;
use Forum\Thread;
use ReflectionClass;

trait RecordsActivity
{
	protected static function bootRecordsActivity()
	{
		if(auth()->guest()) return;

		foreach(static::getActivitiesToRecord() as $event) {
			static::$event(function($model) use ($event){
				$model->recordActivity($event);
			} );
		}
	}

	protected static function getActivitiesToRecord()
	{
		return ['created','deleted','updated'];
	}

	protected function recordActivity( $eventType ) {
		$this->activity()->create([
			'type'         => $this->getActivityType( $eventType ),
			'user_id'      => auth()->id()
		]);
	}

	public function activity()
	{
		return $this->morphMany(Activity::class, 'subject');
	}

	/**
	 * @param $event
	 * @return string
	 * @internal param $eventType
	 *
	 */
	protected function getActivityType( $event ): string {
		$type = strtolower( ( new ReflectionClass( $this ) )->getShortName() );
		return "{$event}_{$type}";
	}
}
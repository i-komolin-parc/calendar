<?php

class EventType
{
	/**
	 * List of types event
	 */
	protected $types = array(
		'Деловое',
		'Личное',
		'Прочее',
	);
	
	/**
	 * @return arr All event types
	 */
	public function getAllTypes() {
		return $this->types;
	}
}